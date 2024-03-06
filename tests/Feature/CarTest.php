<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_car()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        $this
            ->actingAs($user)
            ->post('cars', [
                'car_description' => 'Finish writing this test'
            ]);

        $this->assertDatabaseHas('cars', ['car_description' => 'Finish writing this test']);
    }

    public function test_delete_car()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        // Create a car
        $car = new Car();
        $car->car_description = 'Car to delete';
        $car->user_id = $user->id;
        $car->save();

        $this
            ->actingAs($user)
            ->delete("cars/{$car->id}/delete");

        $this->assertDatabaseMissing('cars', ['car_description' => 'Car to delete']);
    }
}
