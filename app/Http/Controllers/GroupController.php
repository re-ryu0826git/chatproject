<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{

  public function index()
  {
    $groups = Group::all();
    
    return view('group.index', ['groups' => $groups] );
  }
    
  public function add()
  {
    return view('group.create');
  }

  public function create(Request $request)
  {
    //Varidation
    $this->validate($request, Group::$rules);
    
    $group = new Group;
    $form = $request->all();
    
    unset($form['_token']);
    
    //データベースへ保存
    $group->fill($form)->save();
    
    return redirect('group/create');
  }
  


}

