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
        if ($currentPath === 'login') {
            return $next($request);
        }

        // Enforce "admin" role if route contains "admin-pages"
        if (str_contains($currentPath, 'admin-pages')) {
            $role = 'admin';
        }

        // Get API endpoint from environment
        $apiEndpoint = env('VITE_DATABASE_ENDPOINT') . '/api/auth/check';

        // Retrieve Bearer token from HttpOnly cookie
        $token = $request->cookie('token');

        if (empty($token)) {
            Log::warning('Unauthorized access attempt. No token provided.');
            return Redirect::to('/login');
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
                return Redirect::to('/login');
            }

            if (!isset($data['user'])) {
                Log::warning('No user data found in response.');
                return Redirect::to('/login');
            }

            $request->merge(['authUser' => $data['user']]);

            if ($role && $role !== 'guest' && $data['user']['role'] !== $role) {
                Log::warning("User does not have required role: {$role}");
                return Redirect::to('/login');
            }
        } catch (\Exception $e) {
            Log::error('Error in CheckRole middleware: ' . $e->getMessage());
            return Redirect::to('/login');
        }

        return $next($request);
    }

}
