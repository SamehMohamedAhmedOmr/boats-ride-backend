<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Entities\UserTypes;
use Modules\Users\Facades\UsersTypesHelper;

class SeedUserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersTypes = collect([
            UsersTypesHelper::admin(),
            UsersTypesHelper::clients(),
        ]);

        foreach ($usersTypes as $type){
            UserTypes::updateOrCreate([
                'name' => $type,
                'key' => strtoupper($type)
            ]);
        }
    }
}
