<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        return TodoResource::collection(
            
            Todo::
            where('title', 'like', "%$request->search%")
            ->orWhereHas('user', function($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id','desc')
            ->paginate(10)
        
        );
    }
}
