<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class DeleteFeatureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Feature $feature)
    {
        $feature->delete();
        return back();
    }
}
