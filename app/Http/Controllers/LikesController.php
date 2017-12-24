<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Likes;

class LikesController extends Controller
{

    public function store(Post $post)
    {
    	$post->like();

    	return back();
    }
}
