<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show()
    {
        return view('comment.show');    
    }
}
