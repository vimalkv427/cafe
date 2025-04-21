<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
            ['name' => 'User'],
        ]);
    }
}
