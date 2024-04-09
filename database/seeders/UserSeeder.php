<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SaveMessage;
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
        $godData = [
            'uuid' => Str::uuid(),
            'name' => 'mohsen',
            'username' => 'mohsen',
            'email' => 'mohsen.mhm23@gmail.com',
            'email_verified_at' => now(),
            'password' => '235711131719',
        ];

        $godUser = User::query()->where('email', $godData['email'])->first();

        if (!$godUser) {
            $god = User::query()->create($godData);
            $god->roles()->sync(Role::query()->where('name', Role::GOD)->first()->id);

            SaveMessage::query()->create([
                'uuid' => Str::uuid(),
                'user_id' => $god->id
            ]);
        }
        $adminData = [
            'uuid' => Str::uuid(),
            'name' => 'ali',
            'username' => 'ali',
            'email' => 'ali@gmail.com',
            'email_verified_at' => now(),
            'password' => '235711131719',
        ];

        $adminUser = User::query()->where('email', $adminData['email'])->first();

        if (!$adminUser) {
            $admin = User::query()->create($adminData);
            $admin->roles()->sync(Role::query()->where('name', Role::USER)->first()->id);

            SaveMessage::query()->create([
                'uuid' => Str::uuid(),
                'user_id' => $admin->id
            ]);
        }
    }
}
