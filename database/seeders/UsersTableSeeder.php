<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'first_name' => 'Admin',
            'last_name' => 'User',
            'gender' => 'Male',
            'role_id' => $adminRole->id,
            'active' => true,
        ]);
    }
}
