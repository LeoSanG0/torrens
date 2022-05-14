<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Role;


class SeederTableRoles extends Seeder
{
    public function run()
    {
        Role::create([
            'name'=>'Super-admin',
            'guard_name'=>'web',
        ]);
    }
}
