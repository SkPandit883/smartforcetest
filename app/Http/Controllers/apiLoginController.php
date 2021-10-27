<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiLoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response([
                   'status'=>404,
                   'error'=>'invalid login credentials'
            ],404);
        }

        $token=$user->createToken('smartforce')->plainTextToken;

        $response=[
               'status'=>201,
               'user'=>$user,
               'token'=>$token
        ];
        return response($response,201);
    }



    public function Logout(Request $request)
    {
        $user=User::findOrFail($request->id);
        $user->tokens()->delete();
        return response()->json([
            'status' => 'success',
        ]);

    }
}
