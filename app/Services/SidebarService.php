<?php
namespace App\Services;

use Modules\Ynotz\EasyAdmin\Contracts\SidebarServiceInterface;

class SidebarService implements SidebarServiceInterface
{
    public function getSidebarData(): array
    {
        return [
            [
                'type' => 'menu_item',
                'title' => 'Web Pages',
                'route' => 'webpages.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'Articles',
                'route' => 'articles.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'Reviews',
                'route' => 'reviews.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'Video Testimonials',
                'route' => 'videotestimonials.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'Doctors',
                'route' => 'doctors.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'News And Achievements',
                'route' => 'news.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_item',
                'title' => 'Hilight Features',
                'route' => 'hilightfeatures.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [
                'type' => 'menu_section',
                'title' => 'Settings',
                'icon' => 'easyadmin::icons.users',
            ],
            [
                'type' => 'menu_item',
                'title' => 'Page Templates',
                'route' => 'pagetemplates.index',
                'route_params' => [],
                'icon' => 'easyadmin::icons.plus',
                'show' => $this->showSettings()
            ],
            [

                'type' => 'menu_group',
                'title' => 'Access Control',
                'icon' => 'easyadmin::icons.users',
                'show' => $this->showRoles(),
                'menu_items' => [
                    [
                        'type' => 'menu_item',
                        'title' => 'Users',
                        'route' => 'users.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $this->showRoles()
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Roles',
                        'route' => 'roles.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $this->showRoles()
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Permissions',
                        'route' => 'permissions.index',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $this->showPermissions()
                    ],
                    [
                        'type' => 'menu_item',
                        'title' => 'Role-wise Permissions',
                        'route' => 'roles.permissions',
                        'route_params' => [],
                        'icon' => 'easyadmin::icons.users',
                        'show' => $this->showPermissions()
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
