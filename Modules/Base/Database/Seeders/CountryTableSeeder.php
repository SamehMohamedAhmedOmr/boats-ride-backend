<?php

namespace Modules\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Entities\Country;

class CountryTableSeeder extends Seeder
{
    private $file_name = 'countries.json';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/". $this->file_name;
        $countries = json_decode(file_get_contents($path), true);


        foreach ($countries as $country) {
            $country_object =  Country::updateOrCreate([
                'country_code' => $country['code'],
            ], [
                'image' => $country['code']. '.png',
                'name' => ['en'=>$country['name']['en'] , 'ar'=>$country['name']['ar']],
                'description' => ['en'=>$country['name']['en'] . ' Country', 'ar'=>'دولة  ' . $country['name']['ar'] ]
            ]);

        }
    }
}
