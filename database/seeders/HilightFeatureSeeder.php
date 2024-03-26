<?php

namespace Database\Seeders;

use App\Models\HilightFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Highlighter;

class HilightFeatureSeeder extends Seeder
{
    private $locs = [
        'L00',
        'L01',
        'L10',
        'L11',
        'R00',
        'R01',
        'R10',
        'R11',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->locs as $l) {
            HilightFeature::factory()->create([
                'display_location' => $l
            ]);
        }
    }
}
