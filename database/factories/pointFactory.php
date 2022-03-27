<?php

namespace Database\Factories;

use App\Models\point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\point>
 */
class pointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'point_id' => User::factory(),
            'date'  => now(),
            'forgot_password_points' =>$this->faker->randomDigit(),
            'login_points' => $this->faker->randomDigit(),
            'referal_points' => $this->faker->randomDigit()
        ];
    }
}
