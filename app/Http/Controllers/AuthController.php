<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json([
            'message' => 'Registro exitoso',
            'user' => $user,
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        try {
            $token = JWTAuth::attempt($credentials);

            if (!$token) {
                return response()->json([
                    'error' => 'Usuario o contraseña incorrectos',
                ], Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'No se pudo generar el token',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['token' => $token]);
    }
}
