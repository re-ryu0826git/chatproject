<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Group;
use App\User;
class CommentController extends Controller
{
    public function show(Request $request, $id)
    {   
        \Debugbar::info($request);
        $receiveComments = Comment::all();
        $user = Auth::user()->name;
        
        return view('comment.show', ['receiveComments' => $receiveComments, 'user' => $user] );    
    }
    
    public function create(Request $request)
    {
        //Varidation
        $this->validate($request, Comment::$rules);
        
        $sendComment = new Comment;
        
        $user = Auth::user();
        $form = $request->all();
        
        unset($form['_token']);
        
        
        
        // データベースに保存
        $sendComment->fill($form)->save();
        
      
        return redirect('comment/show');
    }
    
}