<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($wpage) {
            $title = $this->faker->sentence(4);
            Translation::create(
                [
                    'translatable_id' => $wpage->id,
                    'translatable_type' => News::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'title' => $title,
                        'description' => 'This is the start of a big text body. It continues here. blah blah blah..'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
