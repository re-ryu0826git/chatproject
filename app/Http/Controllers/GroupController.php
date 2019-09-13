<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Comment;


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
    
    return redirect('groups/create');
  }
  

  public function show(Request $request, $id)
  {   
      \Debugbar::info($request);
      $receiveComments = Comment::all();
      $user = Auth::user()->name;
      
      return view('group.show', ['receiveComments' => $receiveComments, 'user' => $user] );    
  }


}

