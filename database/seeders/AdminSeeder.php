<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@fourislands.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'),
            ]
        );

        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);
        $admin->assignRole($role);

        $this->command->info('Super admin created: admin@fourislands.com / password');
    }
}
