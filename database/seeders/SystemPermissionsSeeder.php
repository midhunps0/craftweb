<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Ynotz\AccessControl\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemPermissionsSeeder extends Seeder
{
    private $items = [
        'System Settings',
        'App Settings',
        'Article',
        'Doctor',
        'Hilight Feature',
        'Metatags',
        'News',
        'Page Template',
        'Review',
        'Translation',
        'Video Testimonial',
        'Web Page',
        'User',
        'Role',
        'Permission',
    ];
    private $actions = [
        'Create',
        'View',
        'Edit',
        'Delete'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->items as $i) {
            foreach ($this->actions as $a) {
                Permission::create([
                    'name' => "$i: $a"
                ]);
            }
        }
    }
}
