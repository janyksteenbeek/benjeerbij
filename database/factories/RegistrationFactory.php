<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'event_id' => Event::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'is_attending' => $this->faker->boolean,
        ];
    }
}
