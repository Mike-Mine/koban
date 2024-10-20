<?php

namespace Database\Seeders;

use App\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    private $permissions = [
        'view specialists',
        'update specialists',
        'delete specialists',
        'view clients',
        'update clients',
        'delete clients',
        'view tickets',
        'create tickets',
        'update tickets',
        'delete tickets',
        'create messages',
        'update messages',
        'delete messages',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => UserRoles::ADMIN]);
        $adminRole->givePermissionTo($this->permissions);

        $specialistRole = Role::create(['name' => UserRoles::SPECIALIST]);
        $specialistRole->givePermissionTo(collect($this->permissions)->filter(function ($permission) {
            return !Str::contains($permission, ['update', 'delete']);
        }));

        $clientRole = Role::create(['name' => UserRoles::CLIENT]);
        $clientRole->givePermissionTo('create tickets');
    }
}
