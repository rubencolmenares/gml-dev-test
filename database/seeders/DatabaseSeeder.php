<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use CategoriesSeeder;
use UserAdmirSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Insert categories on categories table
        DB::table('categories')->insert([
            'id' => '1',
            'category' => 'Cliente',
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'category' => 'Proveedor',
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'category' => 'Funcionario Interno',
        ]);

        DB::table('categories')->insert([
            'id' => '4',
            'category' => 'Administrador',
        ]);

        //Insert admin user
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
