<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Users\MisCursos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "jmaldonado",
            'slug' => "jmaldonado",
            'email' => "jmaldonado@ute.edu.ec",
            'password' => Hash::make('jmaldonado123'),

        ]);
        $user = User::create([
            'name' => "ebonifaz",
            'slug' => "ebonifaz",
            'email' => "ebonifaz@111.com.ec",
            'password' => Hash::make('enrique123'),

        ]);


        $rol = Role::create([
            'name' => 'administrador',
        ]);

        $rol->users()->save($user);

        // Permisos
        $permissions_view = Permission::create([
            'name'  => 'Permiso ver',
            'slug'  => 'permission-view'
        ]);
        $permissions_view->roles()->save($rol);

        $permissions_edit = Permission::create([
            'name'  => 'Permiso editar',
            'slug'  => 'permission-edit'
        ]);
        $permissions_edit->roles()->save($rol);

        $permissions_delete = Permission::create([
            'name'  => 'Permiso borrar',
            'slug'  => 'permission-delete'
        ]);
        $permissions_delete->roles()->save($rol);

        $permissions_create = Permission::create([
            'name'  => 'Permiso crear',
            'slug'  => 'permission-create'
        ]);
        $permissions_create->roles()->save($rol);


        // Roles
        $role_view = Permission::create([
            'name'  => 'Rol ver',
            'slug'  => 'role-view'
        ]);
        $role_view->roles()->save($rol);

        $role_edit = Permission::create([
            'name'  => 'Rol editar',
            'slug'  => 'role-edit'
        ]);
        $role_edit->roles()->save($rol);

        $role_delete = Permission::create([
            'name'  => 'Rol borrar',
            'slug'  => 'role-delete'
        ]);
        $role_delete->roles()->save($rol);

        $permissions_create = Permission::create([
            'name'  => 'Rol crear',
            'slug'  => 'role-create'
        ]);
        $permissions_create->roles()->save($rol);
    }
}
