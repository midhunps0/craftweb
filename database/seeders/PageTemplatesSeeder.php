<?php

namespace Database\Seeders;

use App\Models\PageTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageTemplatesSeeder extends Seeder
{
    private $templates = [
        'article',
        'review',
        'vtestimonial',
        'doctor',
        'news',
        'hilight_feature',
        'page-sidebar-right',
        'page-full-width',
        'page-narrow-centered',
        'page-home',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->templates as $t) {
            PageTemplate::factory()->create([
                'name' => $t,
                'template_file' => $t
            ]);
        }
    }
}
