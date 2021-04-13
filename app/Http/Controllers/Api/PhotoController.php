<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PhotoResource;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        return PhotoResource::collection(
            
            Photo::
            where('title', 'like', "%$request->search%")
            ->orWhereHas('album', function($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
        
        );
    }
}
