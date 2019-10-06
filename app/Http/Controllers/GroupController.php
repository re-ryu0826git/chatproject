<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Comment;
use App\User;

class GroupController extends Controller
{
  //トップページ アプリ説明
  public function top()
  {
    return view('group.top');
  }
  
  // グループ一覧
  public function index()
  {
    $groups = Group::all();
    
    // return view('group.index', ['groups' => $groups] );
    return view('group.index', compact('groups'));
  }
  
  //グループ新規追加  
  public function add()
  {
    return view('group.create');
  }

  //グループ新規作成して保存
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
  
  // チャット詳細画面
  public function show(Request $request, $id)
  {   
      $group = Group::find($id);
      $user = Auth::id();
      
      // 中間テーブルに重複されているレコードが保存されているかチェックする変数check
      $check = $group->users()->where('user_id',$user)->first();
      
      if (empty($check)) {
        // 中間テーブルへ保存 users() 必ずusersの後に()をつける
        // レコードがない場合のみ保存
        $group->users()->attach($user);
      }
      
      return view('group.show', ['group' => $group] );    
  }
  
  //グループチャットからExit
  public function delete(Request $request, $id)
  {
      $group = Group::find($id);
      $user = Auth::id();
      
      // 中間テーブルに重複されているレコードが保存されているかチェックする変数check
      $check = $group->users()->where('user_id',$user)->first();
      
      if (empty($check) != true) {
        // 中間テーブルへ保存 users() 必ずusersの後に()をつける
        // レコードがある場合のみ削除
        $group->users()->detach($user);
      }
      
      return redirect('/');
  }
  
}

