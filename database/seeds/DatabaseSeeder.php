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
//        foreach ($ticketsMethods as $index => $ticketsMethod) {
//            $ticketPermission = new Permission();
//            $ticketPermission->name = 'TicketController_' . $ticketsMethod;
//            $ticketPermission->save();
//        }

        $usersMethods = ['me', 'index', 'show', 'updatePermissions'];
//        foreach ($usersMethods as $index => $usersMethod) {
//            $usersPermissions = new Permission();
//            $usersPermissions->name = 'UserController_' . $usersMethod;
//            $usersPermissions->save();
//        }

        $permissionsMethods = ['index'];
//        foreach ($permissionsMethods as $permissionsMethod) {
//            $permissionsPermissions = new Permission();
//            $permissionsPermissions->name = 'PermissionController_' . $permissionsMethod;
//            $permissionsPermissions->save();
//        }


        $allMethods = array_merge($ticketsMethods, $usersMethods, $permissionsMethods);
        foreach ($allMethods as $index => $method) {
            DB::table('permission_user')->insert([
                'user_id' => 1,
                'permission_id' => $index + 8,
            ]);
        }
    }
}
