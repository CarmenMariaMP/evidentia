<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Validator::make($credentials, [
            'email' => 'required|string',
            'password' => 'required|string'
        ])->fails()) {
            return response()->json([
                'status' => false,
                'error' => 'Some fields are missing or invalid'
            ], 200);
        }

        $attemptedUser = User::where('email', '=', $credentials['email'])->first();

        if (!$attemptedUser || !Hash::check($credentials['password'], $attemptedUser->password)) {
            return response()->json([
                'status' => false,
                'error' => 'Invalid credentials',
            ]);
        }
        
        if (!$token = auth('api')->login($attemptedUser)) {
            return response()->json([
                'status' => false,
                'error' => 'Could not login. Please try later'
            ], 401);
        }

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        auth('api')->logout();
        return response()->json([
            'success' => true
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => auth("api")->user()
        ]);
    }

    public function refresh(Request $request)
    {
        return response()->json([
            'token' => auth('api')->refresh()
        ]);
    }
}
