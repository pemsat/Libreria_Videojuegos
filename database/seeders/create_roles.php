<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class create_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        $admin = User::find(1);

        $admin->assignRole('Admin');

        User::where('id', '>', 1)->each(function ($user) {
            $user->assignRole('User');
        });

    }
}
