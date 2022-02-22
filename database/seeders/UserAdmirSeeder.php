<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdmirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' => 'GML',
            'cc_number' => '1234567890',
            'country' => 'Colombia',
            'email' => 'admin@gmail.com',
            'address' => '81943 Amber Route',
            'cellphone' => '3003003030',
            'password' => Hash::make('12345678'),
            'id_categories' => '4',
        ]);
    }
}
