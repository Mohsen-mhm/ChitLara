<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => Role::GOD,
                'title' => Role::GOD
            ],
            [
                'name' => Role::USER,
                'title' => Role::USER
            ],
        ];

        foreach ($items as $item){
            $role = Role::query()->where('name', $item['name'])->first();

            if (!$role){
                Role::query()->create($item);
            }
        }
    }
}
