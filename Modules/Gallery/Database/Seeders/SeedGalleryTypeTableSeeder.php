<?php

namespace Modules\Gallery\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Gallery\Entities\GalleryType;

class SeedGalleryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect([
            ['name' => 'Profile', 'folder' => 'profile'],
            ['name' => 'Banners', 'folder' => 'banners'],
            ['name' => 'Services', 'folder' => 'services'],
        ]);

        foreach ($types as $type) {
            GalleryType::updateOrCreate([
                'name' => $type['name'],
                'key' => strtoupper($type['name']),
                'folder' => $type['folder'],
            ]);
        }
    }
}
