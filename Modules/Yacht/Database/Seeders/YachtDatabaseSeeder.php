<?php

namespace Modules\Yacht\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Yacht\Database\Seeders\TimeSlotsTableSeeder;

class YachtDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(TimeSlotsTableSeeder::class);
    }
}
