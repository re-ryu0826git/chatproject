<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Group;
use App\User;

class CommentController extends Controller
{
    public function index($group)
    {
        \Debugbar::info("★:{$group}");
        
        $receiveComments = Comment::all();
        $user = Auth::user();
        Group::find($group)->users()->save($user);
        
        return view('comment.index', ['receiveComments' => $receiveComments, 'user' => $user->name, 'group' => $group] );    
        
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
        
      
        return redirect('groups/show');
    }
    
}