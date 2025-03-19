<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginUser(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = auth()->user()->createToken('API TOKEN')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }
}