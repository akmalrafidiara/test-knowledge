<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        (object) $user = Auth::user();
        (string) $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'message' => 'login successful',
            'token' => $token,
        ]);
    }
}
