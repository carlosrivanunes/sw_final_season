<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria permissões
        Permission::firstOrCreate(['name' => 'create']);
        Permission::firstOrCreate(['name' => 'edit']);
        Permission::firstOrCreate(['name' => 'delete']);

        // Cria papel admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(['create', 'edit', 'delete']);

        // Usuário admin
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');
        // Usuário normal

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => false,
            'password' => bcrypt('password123'),
        ]);
    }
}
