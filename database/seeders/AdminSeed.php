<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'password'=>Hash::make('asbi2408'),
            'name' => 'Asbu',
            'username' => 'asbi',
            'email' => 'admin@email.com',
            'is_admin' => true,
        ]);
    }
}
