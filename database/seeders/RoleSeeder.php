<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'pdg'
        ]);
        Role::create([
            'name'=>'utilisateur'
        ]);
        Permission::create([
            'name'=>'createUser'
        ]);
        $user=User::create([
            'email'=>'admin@admin.com',
            'name'=>'admin',
            'prenom'=>'admin',
            'password'=>bcrypt(1234),
            'statuts'=>'1'
        ]);
        $user->attachPermission('createUser');
        $user->attachRole('admin');
    }
}
