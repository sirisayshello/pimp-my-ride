<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout_user()
    {
        $user = new User();
        $user->name = 'Mr Mtv';
        $user->email = 'fan@mtv.com';
        $user->password = Hash::make('123');
        $user->save();

        $this->actingAs($user);

        $response = $this->get('logout');

        $response->assertRedirect('/');
    }
}
