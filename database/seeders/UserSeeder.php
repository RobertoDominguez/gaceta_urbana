<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name'=>'roberto',
            'email'=>'roberto@gmail.com',
            'password'=>Hash::make('123123123'),
            ],
            [
                'name'=>'Bruno',
                'email'=>'bruno.314c@gmail.com',
                'password'=>Hash::make('anticuchos75090622'),
                ],
        ]);
    }
}
