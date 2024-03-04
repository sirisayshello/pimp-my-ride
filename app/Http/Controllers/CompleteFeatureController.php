<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class CompleteFeatureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Feature $feature)
    {
        $feature->completed = true;
        $feature->save();

        return back();
    }
}
