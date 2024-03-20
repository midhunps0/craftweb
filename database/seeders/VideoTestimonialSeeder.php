<?php

namespace Database\Seeders;

use App\Models\VideoTestimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoTestimonial::factory(30)->create();
    }
}
