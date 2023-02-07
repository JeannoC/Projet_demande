<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'valider'
        ]);
        $users=User::create([
            'email'=>'dg@admin.com',
            'name'=>'dg',
            'prenom'=>'dg',
            'password'=>bcrypt(1234),
            'statuts'=>'1'
        ]);
        $users->attachPermission('valider');
        $users->attachRole('admin');
    }
}
