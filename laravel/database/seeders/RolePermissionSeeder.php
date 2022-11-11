<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $authorRole = Role::create(['name' => 'author']);

        $permisofiles1 = Permission::create(['name' => 'files.*']);
        $permisofiles2 = Permission::create(['name' => 'files.list']);
        $permisofiles3 = Permission::create(['name' => 'files.create']);
        $permisofiles4 = Permission::create(['name' => 'files.update']);
        $permisofiles5 = Permission::create(['name' => 'files.read']);
        $permisofiles6 = Permission::create(['name' => 'files.delete']);

        $permisoposts1 = Permission::create(['name' => 'posts.*']);
        $permisoposts2 = Permission::create(['name' => 'posts.list']);
        $permisoposts3 = Permission::create(['name' => 'posts.create']);
        $permisoposts4 = Permission::create(['name' => 'posts.update']);
        $permisoposts5 = Permission::create(['name' => 'posts.read']);
        $permisoposts6 = Permission::create(['name' => 'posts.delete']);

        $permisoplaces1 = Permission::create(['name' => 'places.*']);
        $permisoplaces2 = Permission::create(['name' => 'places.list']);
        $permisoplaces3 = Permission::create(['name' => 'places.create']);
        $permisoplaces4 = Permission::create(['name' => 'places.update']);
        $permisoplaces5 = Permission::create(['name' => 'places.read']);
        $permisoplaces6 = Permission::create(['name' => 'places.delete']);

        $adminRole->givePermissionTo([$permisofiles1, $permisoposts1, $permisoplaces1]);
        $editorRole->givePermissionTo([$permisofiles2, $permisofiles5, $permisoposts2, $permisoposts5, $permisoplaces2, $permisoplaces5]);
        $authorRole->givePermissionTo([$permisofiles1, $permisoposts1, $permisoplaces1]);

        $name  = config('admin.name');
        $admin = User::where('name', $name)->first();
        $admin->assignRole('admin');


        
    }
}
