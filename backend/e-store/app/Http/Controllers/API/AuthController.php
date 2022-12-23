<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Base
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
//                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ]);
        if ($validator->fails()) {

            return Base::msg(0, $validator->getMessageBag()->first(), 422);
        }

        $data = $request->all();

        /** @var User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $request->phone,
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;

        return Base::msg(1, 'Register Successfully',
            200, [
                'user' => $user,
                'token' => $token,
            ]);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email|string|exists:users,email',
                'password' => [
                    'required',
                ],
                'remember' => 'boolean'
            ]);
        if ($validator->fails()) {
            return Base::msg(0, $validator->getMessageBag()->first(), 422);
        }
        $credentials = $request->all();

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return Base::msg(0, [
                'error' => 'Invalid Credentials'
            ], 422);
        } else {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
            return Base::msg(1, 'Login Successfully',
                200, [
                    'user' => $user,
                    'token' => $token,
                ]);
        }
    }

    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response([
            'success' => true
        ]);
    }
}
