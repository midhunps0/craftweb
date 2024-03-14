<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PageTemplate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SystemPermissionsSeeder::class);
        $this->call(SystemRolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PageTemplatesSeeder::class);
        $this->call(WebPagesSeeder::class);
    }
}
