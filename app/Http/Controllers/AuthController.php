<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'username' => ['alpha_num', 'required', 'min:3', 'max:25', 'unique:users,username'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('managu')->accessToken;

        return response()->json([
            'status' => 'OK',
            'code' => 201,
            'data' => ['user' => $user, 'token' => $token],
            'error' => null
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response(['error' => 'Unauthorised'], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('managu')->accessToken;

        return response()->json([
            'status' => 'OK',
            'code' => 201,
            'data' => ['user' => $user, 'token' => $token],
            'error' => null
        ]);
    }
}
