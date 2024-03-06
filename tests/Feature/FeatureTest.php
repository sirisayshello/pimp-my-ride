<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_feature()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        $car = new Car();
        $car->car_description = 'Car to pimp';
        $car->user_id = $user->id;
        $car->save();

        $this
            ->actingAs($user)
            ->post('features', [
                'car_id' => $car->id,
                'description' => 'Finish writing this test'
            ]);

        $this->assertDatabaseHas('features', ['description' => 'Finish writing this test']);
    }

    public function test_complete_feature()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        $car = new Car();
        $car->car_description = 'Car to pimp';
        $car->user_id = $user->id;
        $car->save();

        $feature = new Feature();
        $feature->description = 'Feature to complete';
        $feature->car_id = $car->id;
        $feature->save();

        $this
            ->actingAs($user)
            ->patch("features/{$feature->id}/complete");

        $this->assertDatabaseHas(
            'features',
            [
                'description' => 'Feature to complete',
                'completed' => true
            ]
        );
    }

    public function test_delete_feature()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        $car = new Car();
        $car->car_description = 'Car to pimp';
        $car->user_id = $user->id;
        $car->save();

        $feature = new Feature();
        $feature->description = 'Feature to delete';
        $feature->car_id = $car->id;
        $feature->save();

        $this
            ->actingAs($user)
            ->delete("features/{$feature->id}/delete");

        $this->assertDatabaseMissing('features', ['description' => 'Feature to delete']);
    }
}
