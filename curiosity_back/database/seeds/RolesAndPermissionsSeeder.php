<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->createRoles();

        $user = \App\Models\User::first();

        $user->assignRole('Administrador');
    }

    protected function createRoles()
    {
        Role::create(['name' => 'Administrador']);

        Role::create(['name' => 'Moderador']);

        Role::create(['name' => 'Usuarios']);
    }
}
