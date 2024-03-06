<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateFeatureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'description' => 'required | string | min:5'
        ]);

        $feature = new Feature();
        $feature->description = $request->description;
        $feature->car_id = $request->car_id;
        $feature->completed = false;
        $feature->save();

        return redirect('/dashboard');
    }
}
