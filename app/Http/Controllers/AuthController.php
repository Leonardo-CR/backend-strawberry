<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $token = JWTAuth::fromUser($user);

    return response()->json([
        'message' => 'User registered successfully',
        'user' => $user,
        'token' => $token
    ], 201);
}

public function login(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string',
    ]);
    // Asignacion dentro de un if
    if (!$token = auth('api')->attempt($validated)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    return $this->respondWithToken($token);
}

protected function respondWithToken($token)
{
    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 600, 
        'user' => auth('api')->user(),
    ]);
}
public function logout()
{
    auth('api')->logout();
    return response()->json([
        'message' => 'Successfully logged out'
    ]);
}
public function refresh()
{
    return $this->respondWithToken(auth('api')->refresh());
}

public function me()
{
    $user = auth('api')->user();

    return response()->json([
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'created_at' => $user->created_at,
            // Inicial del nombre del usuario en mayusculas para usar en el front ;)
            'inicial_nombre' => Str::upper(Str::substr($user->name, 0, 1)),
        ]
    ]);
}
}
