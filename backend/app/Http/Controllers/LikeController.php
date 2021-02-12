<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $user_id = Auth::id();

        $like = new Like();
        $like->user_id = $user_id;
        $like->post_id = $post->id;
        $like->save();

        return redirect()->back();
    }

    public function destroy(Like $like)
    {
        $like->delete();
        return redirect()->back();
    }
}
