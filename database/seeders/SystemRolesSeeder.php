<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Ynotz\AccessControl\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemRolesSeeder extends Seeder
{
    private $roles = [
        'System Admin' => [
            'System Settings Create',
            'System Settings View',
            'System Settings Edit',
            'System Settings Delete',
            'App Settings Create',
            'App Settings View',
            'App Settings Edit',
            'App Settings Delete',
            'Article Create',
            'Article View',
            'Article Edit',
            'Article Delete',
            'Doctor Create',
            'Doctor View',
            'Doctor Edit',
            'Doctor Delete',
            'Hilight Feature Create',
            'Hilight Feature View',
            'Hilight Feature Edit',
            'Hilight Feature Delete',
            'Metatags Create',
            'Metatags View',
            'Metatags Edit',
            'Metatags Delete',
            'News Create',
            'News View',
            'News Edit',
            'News Delete',
            'Page Template Create',
            'Page Template View',
            'Page Template Edit',
            'Page Template Delete',
            'Review Create',
            'Review View',
            'Review Edit',
            'Review Delete',
            'Translation Create',
            'Translation View',
            'Translation Edit',
            'Translation Delete',
            'Video Testimonial Create',
            'Video Testimonial View',
            'Video Testimonial Edit',
            'Video Testimonial Delete',
            'Web Page Create',
            'Web Page View',
            'Web Page Edit',
            'Web Page Delete',
        ],
        'Admin' => [
            'Article Create',
            'Article View',
            'Article Edit',
            'Article Delete',
            'Doctor Create',
            'Doctor View',
            'Doctor Edit',
            'Doctor Delete',
            'Hilight Feature Create',
            'Hilight Feature View',
            'Hilight Feature Edit',
            'Hilight Feature Delete',
            'Metatags Create',
            'Metatags View',
            'Metatags Edit',
            'Metatags Delete',
            'News Create',
            'News View',
            'News Edit',
            'News Delete',
            'Review Create',
            'Review View',
            'Review Edit',
            'Review Delete',
            'Translation Create',
            'Translation View',
            'Translation Edit',
            'Translation Delete',
            'Video Testimonial Create',
            'Video Testimonial View',
            'Video Testimonial Edit',
            'Video Testimonial Delete',
            'Web Page Create',
            'Web Page View',
            'Web Page Edit',
            'Web Page Delete',
        ],
        'Editor' => [
            'Article Create',
            'Article View',
            'Article Edit',
            'Doctor Create',
            'Doctor View',
            'Doctor Edit',
            'Metatags Create',
            'Metatags View',
            'Metatags Edit',
            'News Create',
            'News View',
            'News Edit',
            'Review Create',
            'Review View',
            'Review Edit',
            'Video Testimonial Create',
            'Video Testimonial View',
            'Video Testimonial Edit',
            'Web Page Create',
            'Web Page View',
            'Web Page Edit',
        ],
        'SEO Editor' => [
            'Article View',
            'Article Edit',
            'Doctor View',
            'Doctor Edit',
            'Metatags Create',
            'Metatags View',
            'Metatags Edit',
            'News View',
            'News Edit',
            'Review View',
            'Review Edit',
            'Video Testimonial View',
            'Video Testimonial Edit',
            'Web Page View',
            'Web Page Edit',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $r => $ps) {
            /**
             * @var Role
             */
            $r = Role::create(
                ['name' => $r]
            );
            $r->assignPermissions(
                ...$ps
            );
        }
    }
}
