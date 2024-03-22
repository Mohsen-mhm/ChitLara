<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            'uuid' => Str::uuid(),
            'name' => 'mohsen',
            'username' => 'mohsen',
            'email' => 'mohsen.mhm23@gmail.com',
            'email_verified_at' => now(),
            'password' => '235711131719',
        ];

        $user = User::query()->where('email', $item['email'])->first();

        if (!$user) {
            $god = User::query()->create($item);
            $god->roles()->sync(Role::query()->where('name', Role::GOD)->first()->id);
        }
    }
}
