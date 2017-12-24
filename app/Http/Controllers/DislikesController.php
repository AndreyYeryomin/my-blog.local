<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Dislikes;

class DislikesController extends Controller
{  
    public function store(Post $post)
    {
    	$post->dislike();

    	return back();
    }
}
