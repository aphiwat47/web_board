<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => '63160168@go.buu.ac.th',
                'is_admin' => '1',
                'password' => bcrypt('@dminBuu63'),
            ],
            [
                'name' => 'User',
                'email' => '63160136@go.buu.ac.th',
                'is_admin' => '0',
                'password' => bcrypt('UserBuu@63'),
            ]
            ];

            foreach ($user as $key => $value){
                User::create($value);
            }
    }
}
