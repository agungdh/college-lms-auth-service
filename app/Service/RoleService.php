<?php

namespace App\Service;

use App\Models\Role;
use Illuminate\Support\Collection;

class RoleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private function generateRole(string $roleName): Role
    {
        $role = new Role();

        $role->role = $roleName;

        $role->save();

        return $role;
    }

    public function prepareRoles(): void
    {
        $roles = ['admin', 'management', 'student'];

        foreach ($roles as $roleName) {
            $this->generateRole($roleName);
        }
    }

    public function getRoleByName(string $roleName): ?Role
    {
        return Role::where('role', $roleName)->first();
    }

    public function getRoleById(int $id): Role
    {
        $role = Role::find($id);

        if (!$role) {
            throw new \Exception("Role with ID {$id} not found.");
        }

        return $role;
    }

    public function getRoleAdmin(): Role
    {
        return $this->getRoleByName('admin');
    }

    public function getRoleManagement(): Role
    {
        return $this->getRoleByName('management');
    }

    public function getRoleStudent(): Role
    {
        return $this->getRoleByName('student');
    }

    public function getRoles(): Collection
    {
        return Role::all();
    }
}
