<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Post::generateUniqueSlug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        $post->categories()->attach($request->categories);

        return new PostResource($post);
    }
}
