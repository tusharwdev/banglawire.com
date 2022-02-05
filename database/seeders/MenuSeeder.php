<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backendsidebar = Menu::updateOrCreate(
            [
                'name' => 'backend-sidebar',
                'description' => 'This is backend sidebar',
                'deletable' => false
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'divider',
                'order' => 1,
                'divider_title' => 'Menus'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 2,
                'title' => 'Dashboard',
                'icon_class' => 'metismenu-icon pe-7s-rocket',
                'url' => '/secure/dashboard'
            ]);

        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 3,
                'title' => 'Pages',
                'icon_class' => 'metismenu-icon pe-7s-news-paper',
                'url' => '/secure/pages'
            ]);

        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'divider',
                'order' => 4,
                'divider_title' => 'Access Control'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 5,
                'title' => 'Roles',
                'icon_class' => 'metismenu-icon pe-7s-check',
                'url' => '/secure/roles'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 6,
                'title' => 'Users',
                'icon_class' => 'metismenu-icon pe-7s-users',
                'url' => '/secure/users'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'divider',
                'order' => 7,
                'divider_title' => 'System'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 8,
                'title' => 'Menus',
                'icon_class' => 'metismenu-icon pe-7s-menu',
                'url' => '/secure/menus'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 9,
                'title' => 'Backups',
                'icon_class' => 'metismenu-icon pe-7s-cloud',
                'url' => '/secure/backups'
            ]);
        $backendsidebar->menuItems()->updateOrCreate(
            [
                'type' => 'item',
                'order' => 10,
                'title' => 'Settings',
                'icon_class' => 'metismenu-icon pe-7s-settings',
                'url' => '/secure/settings/general'
            ]);
    }
}
