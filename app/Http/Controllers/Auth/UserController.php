<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }


    public function register(Request $request)
    {
        // Validate Request
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'min:6', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);
        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);
        // Create User
        $user = User::create($formFields);
        // Creating Token
        auth()->login($user);

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
