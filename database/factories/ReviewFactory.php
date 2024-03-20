<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stars' => rand(3, 5)
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($r) {
            Translation::create(
                [
                    'translatable_id' => $r->id,
                    'translatable_type' => Review::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'reviewer' =>  $this->faker->name(),
                        'review_text' => 'This is the start of a big text body. It continues here. blah blah blah..'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
