<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Student;

class StudentRegisterTest extends TestCase
{
   
    public function testRegistration()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/student');

        $response->assertStatus(200);

        $factory->define(App\Student::class, function (Faker\Generator $faker) use ($factory){
            return [
                'name' => $faker->name,
                'CPF' => $faker->randomNumber(),
                'RG' => $faker->randomNumber(),
                'address' => $faker->randomNumber(),
                'cellphone' => $faker->randomNumber(),
                'id_user' => $factory->create('(App\User')->id,
                
            ];
        });

        $student = factory(Student::class)->create();

        $response = $this->actingAs($student)->get('student.registration');

    }
    
}
