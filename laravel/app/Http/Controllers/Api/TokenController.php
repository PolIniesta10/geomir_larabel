<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function user(Request $request)
    {
       $user = User::where('email', $request->user()->email)->first();
      
       return response()->json([
           "success" => true,
           "user"    => $request->user(),
           "roles"   => $user->getRoleNames(),
       ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            // Get user
            $user = User::where([
                ["email", "=", $credentials["email"]]
            ])->firstOrFail();
            // Revoke all old tokens
            $user->tokens()->delete();
            // Generate new token
            $token = $user->createToken("authToken")->plainTextToken;
            // Token response
            return response()->json([
                "success"   => true,
                "authToken" => $token,
                "tokenType" => "Bearer"
            ], 200);
        }   else {
            return response()->json([
                "success" => false,
                "message" => "Invalid login credentials"
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $ok = $request->user()->currentAccessToken()->delete();
        if ($ok){
            return response()->json([
                'success' => true,
                'data'    => "Adéu!"
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message'    => "ERROR al tancar la sessió!"
            ], 404);
        }
        
    }
    public function register(Request $request)
    {
        $credentials = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $credentials = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $token = $user->createToken("authToken")->plainTextToken;
    }

}
