<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert(['name'=>'Admin',
            'slug'=>'admin',]); 

        DB::table('roles')->insert(['name'=>'Requester',
            'slug'=>'requester',]);

        DB::table('roles')->insert(['name'=>'Provider',
            'slug'=>'provider',]);

               
    }
}
