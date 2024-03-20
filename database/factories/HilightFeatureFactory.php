<?php

namespace Database\Factories;

use App\Models\HilightFeature;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HilightFeature>
 */
class HilightFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'display_location' => 'L00'
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($wpage) {
            $title = $this->faker->sentence(4);
            Translation::create(
                [
                    'translatable_id' => $wpage->id,
                    'translatable_type' => HilightFeature::class,
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
