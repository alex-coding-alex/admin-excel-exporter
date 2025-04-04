<?php

namespace Database\Factories;

use App\Models\diet_form;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class diet_formFactory extends Factory
{
    protected $model = diet_form::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'food_preference' => $this->faker->word(),
            'allergies' => $this->faker->boolean(),
            'diet' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
