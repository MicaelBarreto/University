<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegistration()
    {
        $this->visit('/register')
        ->type('Me', 'name')
        ->type('someone@outlook.com', 'email')
        ->type('secret', 'password')
        ->type('secret', 'password_confirmation')
        ->press('Register')
        ->see('register')
        ->seeInDatabase('users', ['email' => 'someone@outlook.com']);
    }
}
