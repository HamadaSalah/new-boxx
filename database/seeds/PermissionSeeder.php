<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'Read Collection', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Add Collection', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Delete Collection', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Read Products', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Add Products', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Delete Products', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Read Box', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Add Box', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Delete Box', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Category', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Brand', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Read User', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Add User', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Delete User', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Read Role', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Add Role', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Delete Role', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Super', 'guard_name'=>'admin']);
        $permission = Permission::create(['name' => 'Supply', 'guard_name'=>'admin']);
    }
}
