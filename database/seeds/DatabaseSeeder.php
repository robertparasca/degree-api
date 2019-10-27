<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        $master->last_name = 'Master';
        $master->save();
    }
}
