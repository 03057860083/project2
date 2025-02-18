<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OurController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $Auth = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($request->all());
        if ($validator->fails()) {
            $response['status'] = false;
            $response['error'] = $validator->messages();
        } else {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'email' => ['The provided credentials are incorrect.'],
                ], 401);
            }
            Auth::login($user);
            $response['status'] = true;
            $response['user'] = $user;
            $token = $user->createToken('wsh')->plainTextToken;
            $response['token'] = $token;
        }
        return response()->json($response, 201);
    }
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     // dd($credentials);


    //     if (Auth::attempt($credentials)) {
    //         $Auth = Auth::user();
    //         $token = $Auth->createToken('MyAppToken')->accessToken;

    //         return response()->json(['token' => $token], 200);
    //     }

    //     return response()->json(['error' => 'Unauthorized'], 401);
    // }
}


