<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder{

    public function run(){
        DB::table('roles')->delete();
        DB::table('role_user')->delete();

        Role::create([
            'name'   => 'user'
        ]);

        Role::create([
            'name'   => 'administrator'
        ]);

    }
}
