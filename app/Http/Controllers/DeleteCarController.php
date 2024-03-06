<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DeleteCarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Car $car)
    {
        $car->delete();
        return back();
    }
}
