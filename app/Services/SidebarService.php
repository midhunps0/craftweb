<?php
namespace App\Services;

use Modules\Ynotz\EasyAdmin\Contracts\SidebarServiceInterface;

class SidebarService implements SidebarServiceInterface
{
    public function getSidebarData(): array
    {
        $user = auth()->user();
        return [
            [
                'type' => 'menu_item',
                'title' => 'Web Pages',
                'route' => 'webpages.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Web Page: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Articles',
                'route' => 'articles.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Article: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Reviews',
                'route' => 'reviews.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Review: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Video Testimonials',
                'route' => 'videotestimonials.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Video Testimonial: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Doctors',
                'route' => 'doctors.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Doctor: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'News And Achievements',
                'route' => 'news.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('News: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Hilight Features',
                'route' => 'hilightfeatures.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Hilight Feature: Edit')
            ],
            [
                'type' => 'menu_section',
                'title' => 'Settings',
                'icon' => 'easyadmin::icons.users',
                'show' => $user->hasPermissionTo('App Settings: Edit') || $user->hasPermissionTo('System Settings: Edit')
            ],
            [
                'type' => 'menu_item',
                'title' => 'Page Templates',
                'route' => 'pagetemplates.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $user->hasPermissionTo('Page Template: Edit')
            ],
            [

                'type' => 'menu_group',
                'title' => 'Access Control',
                'icon' => 'easyadmin::icons.users',
                'show' => $user->hasPermissionTo('User: Edit') || $user->hasPermissionTo('Role: Edit') || $user->hasPermissionTo('Permission: Edit'),
                'menu_items' => [
                    [
                        'type' => 'menu_item',
                        'title' => 'Users',
                        'route' => 'users.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $user->hasPermissionTo('User: Edit')
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Roles',
                        'route' => 'roles.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $user->hasPermissionTo('Role: Edit')
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Permissions',
                        'route' => 'permissions.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $user->hasPermissionTo('Permission: Edit')
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Role-wise Permissions',
                        'route' => 'roles.permissions',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $user->hasPermissionTo('User: Edit')
                    ],
                ]
            ],
            // [
            //     'type' => 'menu_item',
            //     'title' => 'Menu Item Two',
            //     'route' => 'home',
            //     'route_params' => [],
            //     'icon' => 'easyadmin::icons.plus',
            //     'show' => $this->showRoles()
            // ],
        ];
    }

    private function showArticles()
    {
        return auth()->check();
    }
    private function showRoles()
    {
        return auth()->check();
    }
    private function showPermissions()
    {
        return auth()->check();
    }
    private function showSettings()
    {
        return auth()->check();
    }
}
?>
