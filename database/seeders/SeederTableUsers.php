<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;


class SeederTableUsers extends Seeder
{
    public function run()
    {
        User::create([
            'fname'=>'Super',
            'lname'=>'administrador',
            'phone'=>'3195555555',
            'email'=>'admin@torrens.com',
            'status'=>'Active',
            'password'=> bcrypt('1234')
        ])->assignRole('Super-admin');
    }
}
