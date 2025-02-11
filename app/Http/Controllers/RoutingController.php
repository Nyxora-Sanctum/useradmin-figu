<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function index(Request $request)
    {
        return redirect('admin-pages.index');
    }

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {
        return view($first);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        return view($first . '.' . $second);
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        return view($first . '.' . $second . '.' . $third);
    }

    /**
     * fourth level route
     */
    public function fourthLevel(Request $request, $first, $second, $third, $id)
    {
        // Use the $id parameter to perform operations on the table
        return view($first . '.' . $second . '.' . $third, ['id' => $id]);
    }
}
