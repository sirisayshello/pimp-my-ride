<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateCarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'car_description' => 'required | string | min:5'
        ]);

        $car = new Car();
        $car->car_description = $request->car_description;
        $car->user_id = Auth::id();
        $car->save();

        return redirect('/dashboard');
    }
}
