<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Group;
use App\User;

class CommentController extends Controller
{
    //それぞれのチャット投稿画面 $group_idはURから抽出
    public function index($group_id)
    {
        $group = Group::find($group_id);
        
        $user = Auth::user();
        
        $receiveComments = $group->comments()->get();
           
        return view('comment.index', ['receiveComments' => $receiveComments, 'user' => $user->id, 'group_id' => $group_id] );    
        
    }
  
    //チャット投稿画面で投稿した内容を保存
    public function create(Request $request,$group_id)
    {
        //Varidation
        $this->validate($request, Comment::$rules);
        
        $sendComment = new Comment;
        $user = Auth::user()->id;
        $form = $request->all();
        
        Group::find($group_id)->users()->attach($user);
        
        // データベースに保存
        unset($form['_token']);
        $sendComment->fill($form)->save();
        
        return redirect()->action('CommentController@index', ['id' => $group_id]);
        
    }
    
}


