<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Admin Dashboardbn']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'secure.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Role',
            'slug' => 'secure.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'secure.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'secure.roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'secure.roles.destroy'
        ]);

//        USER

        $moduleAppUser = Module::updateOrCreate(['name'=>'User Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'secure.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access User',
            'slug' => 'secure.users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create User',
            'slug' => 'secure.users.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit User',
            'slug' => 'secure.users.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete User',
            'slug' => 'secure.users.destroy'
        ]);

//        BACKUP

        $moduleAppBackups = Module::updateOrCreate(['name'=>'Backups']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Access Backup',
            'slug' => 'secure.backups.index'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Create Backup',
            'slug' => 'secure.backups.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Download Backups',
            'slug' => 'secure.backups.download'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Delete Backup',
            'slug' => 'secure.backups.destroy'
        ]);

//        Pages

        $moduleAppPage = Module::updateOrCreate(['name'=>'Page']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Access Page',
            'slug' => 'secure.pages.index'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Create Page ',
            'slug' => 'secure.pages.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Edit Page',
            'slug' => 'secure.pages.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Delete Page',
            'slug' => 'secure.pages.destroy'
        ]);

        //        Menus

        $moduleAppMenu = Module::updateOrCreate(['name'=>'Page']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access Menu',
            'slug' => 'secure.menus.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access Menu Builder',
            'slug' => 'secure.menus.builder'
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Create Menu ',
            'slug' => 'secure.menus.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Edit Menu',
            'slug' => 'secure.menus.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Delete Menu',
            'slug' => 'secure.menus.destroy'
        ]);
    }
}
