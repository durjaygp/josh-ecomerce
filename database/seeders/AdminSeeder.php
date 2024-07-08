<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
          'role-list',
          'role-create',
          'role-edit',
          'role-delete',

          'category-list',
          'category-create',
          'category-edit',
          'category-delete',

          'blog-list',
          'blog-create',
          'blog-edit',
          'blog-delete',

          'page-list',
          'page-create',
          'page-edit',
          'page-delete',

          'social-list',
          'social-create',

          'subscriber-list',
          'subscriber-create',

          'website-list',
          'website-create',
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'admin']);

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $adminUser = User::create([
            'name' => 'Partho Ghosh',
            'email' => 'partho@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $adminUser->assignRole([$role->id]);
    }
}
