<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define permissions based on database tables
        $tables = ['users', 'addresses', 'admins','businesses','cities','contacts','countries','pages','partners','products','promotional_emails','services','settings','sliders','users','permissions'];

        foreach ($tables as $table) {
            // Check if permission already exists
            if (Permission::where('name', "add_$table")->where('guard_name', 'admin')->exists()) {
                continue;
            }

            // Create permissions
            $addPermission = Permission::create(['name' => "add_$table",'guard_name'=>'admin']);
            $editPermission = Permission::create(['name' => "edit_$table",'guard_name'=>'admin']);
            $showPermission = Permission::create(['name' => "show_$table",'guard_name'=>'admin']);
            $deletePermission = Permission::create(['name' => "delete_$table",'guard_name'=>'admin']);

            // Assign permissions to admin role
            $adminRole = Role::where('name', 'admin')->first();
            if ($adminRole) {
                $adminRole->givePermissionTo([$addPermission, $editPermission, $showPermission, $deletePermission]);
            }
        }
    }
}
