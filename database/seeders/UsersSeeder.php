<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    // {
    //     $user = new User;
    //     $user->username = "Approver";
    //     $user->password = bcrypt('12345678'); 
    //     $user->role_id = 1; 
    //     $user->save();
    // },
    // {
    //     $user = new User;
    //     $user->username = "Maker";
    //     $user->password = bcrypt('12345678'); 
    //     $user->role_id = 2; 
    //     $user->save();
    // }

    $user = [
        [
            'username' => 'Maker',
            'password' => bcrypt('12345678'),
            'role_id' => '1',
        ],
        [
            'username' => 'Approver',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
        ],
    ];
    \DB::table('users')->insert($user);
  }
}
