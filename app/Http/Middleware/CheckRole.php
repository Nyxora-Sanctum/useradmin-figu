<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        $currentPath = $request->path();

        // Allow unrestricted access to guest pages
        if (in_array($currentPath, ['/', 'login', 'register'])) {
            return $next($request);
        }

        Log::info('Current path: ' . $currentPath);

        // Determine required role based on URL
        if (str_starts_with($currentPath, 'admin-pages')) {
            $role = 'admin';
        } else {
            $role = 'user';
        }

        // API endpoint for authentication check
        $apiEndpoint = env('VITE_DATABASE_ENDPOINT') . '/api/auth/check';

        // Retrieve token from HttpOnly cookie
        $token = $request->cookie('bearer_token');

        if (empty($token)) {
            Log::warning('Unauthorized access attempt. No token provided.');
            return redirect()->route('login');
        }

        try {
            $client = new Client();
            $response = $client->request('GET', $apiEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token, 
                    'Accept' => 'application/json',
                ],
                'http_errors' => false,
            ]);

            $data = json_decode($response->getBody(), true);

            if ($response->getStatusCode() !== 200 || (isset($data['message']) && $data['message'] === 'Unauthenticated.')) {
                Log::warning('User is unauthenticated.');
                return redirect()->route('login');
            }

            if (!isset($data['user'])) {
                Log::warning('No user data found in response.');
                return redirect()->route('login');
            }

            $userRole = $data['user']['role'];
            $request->merge(['authUser' => $data['user']]);

            // Role-based redirection logic
            if ($role === 'admin' && $userRole !== 'admin') {
                Log::warning('User attempted to access an admin page without proper role.');
                return redirect()->route('user-index'); // Redirect user to their dashboard
            }

            if ($role === 'user' && $userRole !== 'user') {
                Log::warning('Admin attempted to access a user page.');
                return redirect()->route('admin-index'); // Redirect admin to their dashboard
            }
        } catch (\Exception $e) {
            Log::error('Error in CheckRole middleware: ' . $e->getMessage());
            return redirect()->route('login');
        }

        return $next($request);
    }
}
