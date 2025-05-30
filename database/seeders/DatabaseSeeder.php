<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = new Collection();

        $roles->push($this->generateRole('admin'));
        $roles->push($this->generateRole('management'));
        $roles->push($this->generateRole('student'));
    }

    private function generateRole(string $roleName): Role
    {
        $role = new Role();

        $role->role = $roleName;

        $role->save();

        return $role;
    }
}
