<?php

namespace Modules\ACL\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ACL\Entities\Role;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_name = 'Super Role';
        $key = str_replace(' ', '_', strtoupper($role_name));

        Role::updateOrCreate([
            'name' => $role_name,
            'key' => $key,
        ]);
    }
}
