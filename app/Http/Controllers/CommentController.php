<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Group;

class CommentController extends Controller
{
    //チャット投稿画面で投稿した内容を保存
    public function create(Request $request,$group_id)
    {
        //Varidation
        $this->validate($request, Comment::$rules);
        
        $sendComment = new Comment;
        $form = $request->all();
        
        \Debugbar::info($form);
        // データベースに保存
        unset($form['_token']);
        $sendComment->fill($form)->save();
        
        return redirect()->action('GroupController@show', ['id' => $group_id]);
        
    }
    
}


