<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'role_id'   => '1',
          'name'      => 'Admin',
          'email'     => 'soha.mahmoud.hussien@gmail.com',
          'phoneNumber'     => '01111111',
          'password'  => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
          'role_id'   => '2',
          'name'      => 'Req',
          'email'     => 'requester@gmail.com',
          'phoneNumber'     => '01111111',
          'password'  => bcrypt('requester'),
        ]);

        DB::table('users')->insert([
          'role_id'   => '3',
          'name'      => 'Prov',
          'email'     => 'provider@gmail.com',
          'phoneNumber'     => '01111111',
          'password'  => bcrypt('provider'),
        ]);


    }
}
