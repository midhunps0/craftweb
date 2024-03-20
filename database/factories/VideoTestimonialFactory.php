<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Translation;
use App\Models\User;
use App\Models\VideoTestimonial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideoTestimonial>
 */
class VideoTestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'link' => 'https://www.youtube.com/watch?v=0Pgrr23voYs'
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($vt) {
            Translation::create(
                [
                    'translatable_id' => $vt->id,
                    'translatable_type' => VideoTestimonial::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'reviewer' =>  $this->faker->name(),
                        'title' => 'This is the start a good title',
                        'story' => 'This is the start of a big text. It continues here. blah blah blah..'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
