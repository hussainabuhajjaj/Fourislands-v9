<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);

        // Define permissions based on database tables
        $tables = ['admins', 'addresses', 'businesses', 'categories', 'cities', 'contacts', 'countries', 'faqs', 'pages', 'partners', 'posts', 'products', 'promotional-emails', 'quote-requests', 'services', 'settings', 'sliders', 'subscribers', 'testimonials', 'users'];

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
            $adminRole->givePermissionTo([$addPermission, $editPermission, $showPermission, $deletePermission]);
        }

        // Create custom permissions not following the standard prefix pattern
        $customPermissions = ['manage_pages', 'manage_faqs', 'add_roles'];
        foreach ($customPermissions as $name) {
            if (!Permission::where('name', $name)->where('guard_name', 'admin')->exists()) {
                $adminRole->givePermissionTo(Permission::create(['name' => $name, 'guard_name' => 'admin']));
            }
        }
    }
}
