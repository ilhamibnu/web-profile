<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function indexpostlanding()
    {
        $user = User::all();
        $posts = Post::with('user')->simplePaginate(5);
        return view(
            'landing.pages.blog',
            [
                'post' => $posts,
                'user' => $user

            ]
        );
    }

    public function detailpostlanding($id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        return view(
            'landing.pages.detail-blog',
            [
                'post' => $post
            ]
        );
    }
}
