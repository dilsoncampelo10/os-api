<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RequestUser $request)
    {
        $data = $request->all();

        $user = User::create($data);
        
        return response()->json($user, 201);
    }
}
