<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            'name' => 'أولي ثانوي',
            'one_price' => 50,
        ]);
        DB::table('levels')->insert([
            'name' => 'ثانية ثانوي',
            'one_price' => 50,
        ]);
        DB::table('levels')->insert([
            'name' => 'تالته ثانوي',
            'one_price' => 50,
        ]);
    }
}