<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name','Super Admin')->firstOrFail();
        User::create([
            'name' => 'Super Admin users',
            'email' => 'super.admin@admin.com',
            'password' => Hash::make('admin123'),
            'role_id' => $role->id
        ]);
    }
}
