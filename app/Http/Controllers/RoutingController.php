<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

class RoutingController extends Controller
{
    public function index(Request $request)
    {
        return view('user-pages.index');
    }

    public function indexAdmin(Request $request)
    {
        return view('admin-pages.index');
    }

    public function login(AuthController $authController, Request $request)
    {
        return $authController->loginView($request);
    }

    public function register(AuthController $authController, Request $request)
    {
        return $authController->registerView($request);
    }

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {
        return view('user-pages.' . $first);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        return view('user-pages.' .$first . '.' . $second);
    }

    /**
     * third level route    
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return view('user-pages.' .$first . '.' . $second . '.' . $third);
    }

    /**
     * fourth level route
     */
    public function fourthLevel(Request $request, $first, $second, $third, $id)
    {
        // Use the $id parameter to perform operations on the table
        return view('user-pages.' .$first . '.' . $second . '.' . $third, $id);
    }

    public function rootAdmin(Request $request, $first)
    {
        return view('admin-pages.'.$first);
    }

    /**
     * second level route
     */
    public function secondLevelAdmin(Request $request, $first, $second)
    {
        return view('admin-pages.' . $first . '.' . $second);
    }

    /**
     * third level route
     */
    public function thirdLevelAdmin(Request $request, $first, $second, $third)
    {
        return view('admin-pages.' . $first . '.' . $second . '.' . $third);
    }

    /**
     * fourth level route
     */
    public function fourthLevelAdmin(Request $request, $first, $second, $third, $id)
    {
        // Use the $id parameter to perform operations on the table
        return view('admin-pages.' . $first . '.' . $second . '.' . $third, ['id' => $id]);
    }
}
