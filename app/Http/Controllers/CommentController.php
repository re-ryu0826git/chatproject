<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
      
        return redirect('comment/show');
    }
}
