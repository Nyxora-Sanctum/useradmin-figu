<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Client;

class RoutingController extends Controller
{
    public function landing(Request $request){
        return view('landing');
    }
    public function index(Request $request)
    {
        return view('user-pages.shop');
    }

    public function indexAdmin(Request $request)
    {
        return view('admin-pages.index');
    }

    public function editor(Request $request, $id)
    {
        // Retrieve the Bearer Token from cookies (if needed for any further processing)
        $token = Cookie::get('bearer_token');
        Log::info("Bearer Token: " . $token);  // Log the token for debugging purposes

        // Create a Guzzle HTTP client
        $client = new Client();

        // Fetch template metadata from the backend with Bearer token for authentication
        try {
            $templateMetaResponse = $client->get(env('VITE_DATABASE_ENDPOINT') . "/api/templates/get/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token, // Include the Bearer token in the request header
                ]
            ]);

            // Convert response to JSON
            $templateMeta = json_decode($templateMetaResponse->getBody()->getContents(), true);

            Log::info("Template Metadata: ", $templateMeta); // For logging response data

            // Check if the metadata is available
            if (!$templateMeta) {
                abort(404, 'Template metadata not found');
            }

            // Get the template link
            $templateLink = $templateMeta['template-link'] ?? null;

            // If the template link is missing, abort with a 404 error
            if (!$templateLink) {
                abort(404, 'Template link not found');
            }

            // Fetch the template HTML content from the URL with Bearer token for authentication
            $htmlResponse = $client->get(env('VITE_DATABASE_ENDPOINT') . '/' . $templateLink, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token, // Include the Bearer token in the request header
                ]
            ]);

            // Get the raw HTML content of the template
            $templateHtml = $htmlResponse->getBody()->getContents();

            // Pass the data to the Blade view
            return view('user-pages.editor', [
                'id' => $id,
                'templateHtml' => $templateHtml, // Pass the template HTML as a variable
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching template: ' . $e->getMessage());
            abort(500, 'Failed to fetch template data');
        }
    }
    public function login(AuthController $authController, Request $request)
    {
        return $authController->loginView($request);
    }

    public function register(AuthController $authController, Request $request)
    {
        return $authController->registerView($request);
    }

    private function getView($path, $data = [])
    {
        return View::exists($path) ? view($path, $data) : view('404');
    }

    public function root(Request $request, $first)
    {
        return $this->getView('user-pages.' . $first);
    }

    public function secondLevel(Request $request, $first, $second)
    {
        return $this->getView('user-pages.' . $first . '.' . $second);
    }

    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return $this->getView('user-pages.' . $first . '.' . $second . '.' . $third);
    }

    public function fourthLevel(Request $request, $first, $second, $third, $id)
    {
        return $this->getView('user-pages.' . $first . '.' . $second . '.' . $third, ['id' => $id]);
    }

    public function rootAdmin(Request $request, $first)
    {
        return $this->getView('admin-pages.' . $first);
    }

    public function secondLevelAdmin(Request $request, $first, $second)
    {
        return $this->getView('admin-pages.' . $first . '.' . $second);
    }

    public function thirdLevelAdmin(Request $request, $first, $second, $third)
    {
        return $this->getView('admin-pages.' . $first . '.' . $second . '.' . $third);
    }

    public function fourthLevelAdmin(Request $request, $first, $second, $third, $id)
    {
        return $this->getView('admin-pages.' . $first . '.' . $second . '.' . $third, ['id' => $id]);
    }
}