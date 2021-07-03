<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Entities\Permission;
use Illuminate\Database\Eloquent\Model;

class PermissionSeedTableSeeder extends Seeder
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
        foreach($this->getPreDefinedPermissions() as $permission){
            Permission::updateOrCreate(['key'=>$permission['key']],$permission);
        }
    }


    public function getPreDefinedPermissions(){
        return [
            [
                'name'=>['en'=>'manage yacht','ar'=>'ادارة الياخت'],
                'key'=>'MANAGE_YACHT',
            ],
            [
                'name'=>['en'=>'delete yacht', 'ar'=>'حذف الياخت'],
                'key'=>'DELETE_YACHT',
            ],
            [
                'name'=>['en'=>'manage yacht reservation','ar'=>'ادارة حجز الياخت'],
                'key'=>'MANAGE_YACHT_RESERVATION',
            ],
            [
                'name'=>['en'=>'delete yacht reservation','ar'=>'حذف حجز الياخت'],
                'key'=>'DELETE_YACHT_RESERVATION',
            ],
            [
                'name'=>['en'=>'Manage Watersport', 'ar'=>'ادارة العاب المياه'],
                'key'=>'MANAGE_WATERSPORT',
            ],
            [
                'name'=>['en'=>'delete watersport','ar'=>'حذف العاب المياه'],
                'key'=>'DELETE_WATERSPORT',
            ],
            [
                'name'=>['en'=>'manage watersport reservation','ar'=>'ادارة حجز العاب المياه'],
                'key'=>'MANAGE_WATERSPORT_RESERVATION',
            ],
            [
                'name'=>['en'=>'delete watersport reservation','ar'=>'حذف حجز العاب المياه'],
                'key'=>'DELETE_WATERSPORT_RESERVATION',
            ],
            [
                'name'=>['en'=>'manage service','ar'=>'ادارة الخدمة'],
                'key'=>'MANAGE_SERVICES',
            ],
            [
                'name'=>['en'=>'delete service','ar'=>'حذف الخدمة'],
                'key'=>'DELETE_SERVICES',
            ],
            [
                'name'=>['en'=>'manage blog','ar'=>'ادارة المقالة'],
                'key'=>'MANAGE_BLOGS',
            ],
            [
                'name'=>['en'=>'delete blog','ar'=>'حذف المقالة'],
                'key'=>'DELETE_BLOGS'
            ],
            [

                'name'=>['en'=>'manage offer','ar'=>'ادارة العرض'],
                'key'=>'MANAGE_OFFERS',
            ],
            [
                'name'=>['en'=>'delete offer','ar'=>'حذف العرض'],
                'key'=>'DELETE_OFFERS',
            ],
            [
                'name'=>['en'=>'manage seo','ar'=>'ادارة السيو'],
                'key'=>'MANAGE-SEO',
            ],
            [
                'name'=>['en'=>'delete seo','ar'=>'حذف السيو'],
                'key'=>'DELETE_SEO',
            ],
            [
                'name'=>['en'=>'manage admin','ar'=>'ادارة الادمن'],
                'key'=>'MANAGE_ADMINS',
            ],
            [
                'name'=>['en'=>'delete admin','ar'=>'حذف ادمن'],
                'key'=>'DELETE_ADMINS',
            ],
            
            
        ];
    }
}
