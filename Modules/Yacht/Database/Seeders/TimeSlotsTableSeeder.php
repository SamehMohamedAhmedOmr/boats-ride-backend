<?php

namespace Modules\Yacht\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Yacht\Entities\TimeSlot;
use Illuminate\Database\Eloquent\Model;

class TimeSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $start_date = Carbon::parse('00:00');
        $end_date = Carbon::parse('23:30');

        while($start_date->lte($end_date))
        {
            TimeSlot::updateOrCreate(['time'=>$start_date->format('H:i')],[
                'label'=>$start_date->format('g:i A')
            ]);
            $start_date->addMinutes(30);
        }
    }
    
}
