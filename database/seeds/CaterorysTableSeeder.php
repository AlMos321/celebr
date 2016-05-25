<?php

use Illuminate\Database\Seeder;

class CaterorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
            'name' => "Фокусник",
        ]);
        DB::table('categorys')->insert([
            'name' => "Диджей",
        ]);
        DB::table('categorys')->insert([
            'name' => "Тамада",
        ]);
        DB::table('categorys')->insert([
            'name' => "Ведучий",
        ]);
        DB::table('categorys')->insert([
            'name' => "Клоун",
        ]);
    }
}
