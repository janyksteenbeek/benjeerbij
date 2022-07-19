<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->firstName . "'s " .
            collect(['Crazy', 'Awesome', 'Fun'])->random() . ' ' .
            collect(['Party', 'Event', 'Conference', 'Birthday'])->random();

        $startTime = now()->addDays(rand(1, 10))
            ->setTime(rand(0, 23), 0, 0);

        return [
            'id' => fake()->uuid(),
            'user_id' => User::inRandomOrder()->first()->id,

            'title' => $title,
            'slug' => Event::slug($title),
            'description' => fake()->paragraph,
            'invitation_text' => fake()->paragraph,
            'location' => fake()->city,
            'start_time' => $startTime,
            'end_time' => $startTime->addHours(rand(1, 8)),
        ];
    }
}
