<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Retrieve the currently authenticated user...
        $user = Auth::user();

        // Return a view and pass the name variable to it
        return view('dashboard', ['user' => $user]);
    }
}
