<?php
namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        $currentPath = $request->path();

        // Prevent redirection loop by allowing access to login page
        if ($currentPath === 'login' || $currentPath === 'register') {
            return $next($request);
        }

        // Enforce "admin" role if route contains "admin-pages"
        if (str_contains($currentPath, 'admin-pages')) {
            $role = 'admin';
        }

        // Get API endpoint from environment
        $apiEndpoint = env('VITE_DATABASE_ENDPOINT') . '/api/auth/check';

        // Retrieve Bearer token from HttpOnly cookie
        $token = $request->cookie('bearer_token');

        if (empty($token)) {
            Log::warning('Unauthorized access attempt. No token provided.');
            return redirect()->route('login'); // ✅ Redirect using named route
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
                return redirect()->route('login'); // ✅ Redirect using named route
            }

            if (!isset($data['user'])) {
                Log::warning('No user data found in response.');
                return redirect()->route('login'); // ✅ Redirect using named route
            }

            $request->merge(['authUser' => $data['user']]);

            if ($role && $role !== 'guest' && $data['user']['role'] !== $role) {
                Log::warning("User does not have required role: {$role}");
                return redirect()->route('login'); // ✅ Redirect using named route
            }
        } catch (\Exception $e) {
            Log::error('Error in CheckRole middleware: ' . $e->getMessage());
            return redirect()->route('login'); // ✅ Redirect using named route
        }

        return $next($request);
    }
}
