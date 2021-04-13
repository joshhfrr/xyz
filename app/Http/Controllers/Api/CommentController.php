<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        return CommentResource::collection(

            Comment::
            where('name', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%")
            ->orWhere('body', 'like', "%$request->search%")
            ->orWhereHas('post', function($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(20)
        );

    }
}
