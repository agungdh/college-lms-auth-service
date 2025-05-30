<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Service\RoleService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(RoleService $roleService): void
    {
        $roleService->prepareRoles();

        $roleService->getRoles()->each(function ($role) {
            User::factory(10)->create([
                'role_id' => $role->id,
            ]);
        });
    }
}
