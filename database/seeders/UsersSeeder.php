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
     

        ];

        foreach ($userData as $key => $val) {
            User::create($val);
            # code...
        }
    }
}
