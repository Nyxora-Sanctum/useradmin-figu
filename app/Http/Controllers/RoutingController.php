<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
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