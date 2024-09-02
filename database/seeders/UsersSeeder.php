<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [

            [
                'nama' => 'User Test',
                'email' => 'user',
                'password' =>  bcrypt('user'),
                'phoneNumber' => '82345124519',
                'role' => 'user'
            ],
            [
                'nama' => 'Admin Test',
                'email' => 'admin',
                'password' =>  bcrypt('admin'),
                'phoneNumber' => '82345124518',
                'role' => 'admin'
            ]

        ];

        foreach ($userData as $key => $val) {
            User::create($val);
            # code...
        }
    }
}

// class UsersSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $startId = 809;
//         $endId = 863;
//         $passStart  = 806;
//         for ($userId = $startId; $userId <= $endId; $userId++) {
//             $user = User::find($userId);
//             if ($user) {
//                 $user->password ='sulnana'.$passStart;
//                 $user->save();
//                 $passStart++;
//             } else {

//             }
//         }
//     }
// }