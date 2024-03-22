<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => '',
                'title' => ''
            ],
        ];

        foreach ($items as $item){
            $permission = Permission::query()->where('name', $item['name'])->first();

            if (!$permission){
                Permission::query()->create($item);
            }
        }
    }
}
