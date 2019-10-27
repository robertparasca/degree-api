<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = new User();
        $master->password = bcrypt('asd123');
        $master->email = 'parascarobert@gmail.com';
        $master->name = 'Master Account';
        $master->first_name = 'Account';
        $master->lasst_name = 'Master';
        $master->save();
    }
}
