<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Group;
use App\User;

class CommentController extends Controller
{
    public function show()
    {
        return view('comment.show');    
    }
    
    public function create(Request $request)
    {
        //Varidation
        $this->validate($request, Comment::$rules);
        
        $sendComment = new Comment;
        
        $user = Auth::user();
        $form = $request->all();
        
        unset($form['_token']);
        
        // 中間テーブルへ保存
        
        
        // データベースに保存
        $sendComment->fill($form)->save();
        
      
        return redirect('comment/show');
    }
}
