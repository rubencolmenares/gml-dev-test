<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
    }
}
