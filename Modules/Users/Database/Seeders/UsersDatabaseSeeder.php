<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ACL\Database\Seeders\RolesTableSeeder;
use Modules\Users\Database\Seeders\PermissionSeedTableSeeder;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SeedUserTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(PermissionSeedTableSeeder::class);
    }
}
