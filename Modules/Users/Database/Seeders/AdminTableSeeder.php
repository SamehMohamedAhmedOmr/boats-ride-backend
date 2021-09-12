<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ACL\Entities\Role;
use Modules\Users\Entities\User;
use Modules\Users\Entities\UserTypes;
use Modules\Users\Facades\UsersTypesHelper;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type = UserTypes::where('key', strtoupper(UsersTypesHelper::admin()))->first();

        $user = User::updateOrCreate([
            'email' => config('users.admin_email'),
        ], [
            'name' => 'Admin',
            'password' => bcrypt(config('users.admin_password')),
            'user_type' => $user_type->id
        ]);

        $role = Role::where('key', 'SUPER_ROLE')->first();
        if ($role){
            $user->roles()->detach();
            $user->roles()->attach($role->id);
        }
    }
}
