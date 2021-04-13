<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return PostResource::collection(

            Post::
            // with(['user'])
            where('title', 'like', "%$request->search%")
            ->orWhere('body', 'like', "%$request->search%")
            ->orWhereHas('user', function($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)

        );
    }
}
