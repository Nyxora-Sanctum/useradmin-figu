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

    public function registerView(Request $request){
        return view('register');
    }

    public function login(Request $request)
    {
        $response = Http::post(env('VITE_DATABASE_ENDPOINT') . '/api/auth/login', $request->only('username', 'password'));

        if ($response->successful()) {
            $data = $response->json();

            // Store token in cookie (valid for 1 day)
            Cookie::queue('bearer_token', $data['token'], 60 * 24);

            // Fetch user role after login
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
                    return redirect()->route('admin-index')->with('success', 'Welcome, Admin!');
                } elseif ($role === 'user') {
                    return redirect()->route('user-index')->with('success', 'Welcome back!');
                }
            }

            // If no user data, redirect to login
            return redirect()->route('login')->withErrors(['login' => 'Authentication failed.']);
        }

        return redirect()->back()->withErrors(['login' => 'Invalid username or password']);
    }

    public function register(Request $request)
    {
        $response = Http::post(env('VITE_DATABASE_ENDPOINT') . '/api/auth/register', $request->only('username', 'email', 'password', 'password_confirmation'));

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->route('login')->with('success', 'Registered successfully');
        }

        return redirect()->route('login')->with('success', 'Registered successfully');

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
            return redirect()->route('login')->withErrors(['login' => 'Logout failed. Please try again.']);
        }

        return redirect()->route('login')->withErrors(['login' => 'Logout failed. Please try again.']);
    }
}

