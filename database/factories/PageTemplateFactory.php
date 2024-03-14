<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageTemplate>
 */
class PageTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word();
        return [
            'name' => $name,
            'template_file' => Str::lower($name),
            'fields' => json_encode([
                'title' => 'plaintext',
                'cover_image' => 'image',
                'body' => 'htmltext'
            ]),
            'created_by' => User::all()->random()->id
        ];
    }
}
