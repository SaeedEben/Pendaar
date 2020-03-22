<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 *
 * @mixin User
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user             = new App\Models\User\User();
        $user->first_name = 'saeed';
        $user->last_name  = 'eben';
        $user->email      = 'saeed@eben.com';
        $user->mobile     = '09372132220';
        $user->password   = '12345678';
        $user->save();

        factory(User::class, 19)->create();
    }
}
