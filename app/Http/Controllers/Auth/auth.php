<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class auth extends Controller
{

    public function login(Request $request)
    {
        $token = $request->bearerToken();
        if ($token == '123456') {
            return response()->json(['message' => 'Authorized']);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }

    public function authCheck(Request $request)
    {
        $token = $request->bearerToken();
        if ($token == '123456') {
            return response()->json(['message' => 'Authorized']);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
    }

    public function register(Request $request)
    {
        $token = $request->bearerToken();
    }
}
