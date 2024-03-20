<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
        return $this->afterCreating(function ($d) {
            Translation::create(
                [
                    'translatable_id' => $d->id,
                    'translatable_type' => Doctor::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'name' =>  $this->faker->name(),
                        'designation' => 'MBBS MD',
                        'department' => 'Some Dept.',
                        'qualification' => 'ABC, DEF, GHI, JKLM, OPQR',
                        'specialisations' => 'ZYX, WVUT, SRQ',
                        'experience_summary' => 'This is the start of a big text. It continues here. blah blah blah..'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
