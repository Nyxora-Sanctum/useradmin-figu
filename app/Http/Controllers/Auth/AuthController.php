<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        return view('login');
    }

    public function registerView(Request $request)
    {
        return view('register');
    }

    public function login(Request $request)
    {
        // Perform login request
        $response = Http::post(env('VITE_DATABASE_ENDPOINT') . '/api/auth/login', $request->only('username', 'password'));

        if ($response->successful()) {
            $data = $response->json();
            log::info($data);

            // Check if 'access_token' exists in response
            if (!isset($data['token'])) {
                return redirect()->route('login')->withErrors(['login' => 'Authentication failed, no token received.']);
            }

            // Create an HTTP-only cookie for access token
            $cookie = cookie('bearer_token', $data['token'], 60, '/', '127.0.0.1', true, true);
            Cookie::queue($cookie);

            // Fetch user role after login using the access_token
            $userResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $data['token'],
                'Accept' => 'application/json',
            ])->get(env('VITE_DATABASE_ENDPOINT') . '/api/auth/check');

            if ($userResponse->successful()) {
                $userData = $userResponse->json();
                $role = $userData['user']['role'] ?? 'guest';

                log::info('User role: ' . $role);

                // Redirect based on role
                if ($role === 'admin') {
                    return response()->json([
                        'success' => true,
                        'bearer_token' => $data['token'],
                        'role' => $role
                    ]);
                } elseif ($role === 'user') {
                    return response()->json([
                        'success' => true,
                        'bearer_token' => $data['token'],
                        'role' => $role
                    ]);
                }
            }

            // If no user data, return an error response
            return response()->json([
                'success' => false,
                'error' => 'Authentication failed.'
            ]);
        }

        // If login fails, return with an error
        return response()->json([
            'success' => false,
            'error' => 'Invalid username or password'
        ]);
    }

    public function register(Request $request)
    {
        $response = Http::post(env('VITE_DATABASE_ENDPOINT') . '/api/auth/register', $request->only('username', 'email', 'password', 'password_confirmation'));

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->route('login')->with('success', 'Registered successfully');
        }

        return redirect()->route('login')->with('error', 'Registration failed.');
    }

    public function logout(Request $request)
    {
        $token = Cookie::get('bearer_token');

        if (!$token) {
            return redirect()->route('login')->withErrors(['login' => 'Not authenticated']);
        }

        $response = Http::withToken($token)->post(env('VITE_DATABASE_ENDPOINT') . '/api/auth/logout');

        if ($response->successful()) {
            Cookie::queue(Cookie::forget('bearer_token'));
            return redirect()->route('login')->with('success', 'Logged out successfully');
        }

        return redirect()->route('login')->withErrors(['login' => 'Logout failed. Please try again.']);
    }
}
