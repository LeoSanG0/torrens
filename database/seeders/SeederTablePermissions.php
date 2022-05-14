<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Add Spatie

use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    public function run()
    {
        $permissions = [

            //Roles
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            //Tasks
            'task_show',
            'task_create',
            'task_edit',
            'task_delete'
        ];
        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
