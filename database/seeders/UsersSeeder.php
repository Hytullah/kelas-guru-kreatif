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
<<<<<<< HEAD
                'nama' => 'Marini muthalib',
                'email' => 'GK3202983',
                'password' =>  bcrypt('sulnana993'),
                'phoneNumber' => '82345124508',
                'role' => 'user'
            ]
=======
                'nama' => 'usertes',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
                'phoneNumber' => '081234567890',
                'role' => 'user'
            ],
            [
                'nama' => 'userdua',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('user2'),
                'phoneNumber' => '08123456830',
                'role' => 'user'
            ],
     
>>>>>>> 0a87008b2f527ae8c14dadab901bd7a6f95e2cfe

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