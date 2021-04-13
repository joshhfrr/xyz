<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return UserResource::collection(
            
            User::
            where('name', 'like', "%$request->search%")
            ->orWhere('username', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%")
            ->orWhere('phone', 'like', "%$request->search%")
            ->orWhere('website', 'like', "%$request->search%")
            ->orderBy('id', 'desc')
            ->paginate(5)
            
        );
    }
}
