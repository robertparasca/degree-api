<?php

use App\Permission;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $master = new User();
//        $master->password = bcrypt('asd123');
//        $master->email = 'parascarobert@gmail.com';
//        $master->name = 'Master Account';
//        $master->first_name = 'Account';
//        $master->last_name = 'Master';
//        $master->save();

        $ticketsMethods = ['index', 'store', 'update', 'delete', 'validate'];
        foreach ($ticketsMethods as $index => $ticketsMethod) {
//            $ticketPermission = new Permission();
//            $ticketPermission->name = 'TicketController_' . $ticketsMethod;
//            $ticketPermission->save();
//            DB::table('permission_user')->insert([
//                'user_id' => 1,
//                'permission_id' => $index + 1,
//            ]);
            DB::table('permission_user')->insert([
                'user_id' => 2,
                'permission_id' => $index + 1,
            ]);
        }
    }
}
