<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        return AlbumResource::collection(
            
            Album::
            where('title', 'like', "%$request->search%")
            ->orWhereHas('user', function($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
        
        );
    }
}
