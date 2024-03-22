<?php

namespace Database\Factories;

use App\Models\PageTemplate;
use App\Models\Translation;
use App\Models\User;
use App\Models\WebPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebPage>
 */
class WebPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $template = PageTemplate::where('name', 'page-sidebar-right')->get()->first();
        return [
            'template_id' => $template->id
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($wpage) {
            $title = $this->faker->sentence(4);
            $slug = Str::slug($title);
            Translation::create(
                [
                    'translatable_id' => $wpage->id,
                    'translatable_type' => WebPage::class,
                    'locale' =>  App::getLocale(),
                    'slug' =>  $slug,
                    'data' => [
                        'title' => $title,
                        'body' => 'This is the start of a big text body. It continues here. blah blah blah..'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
