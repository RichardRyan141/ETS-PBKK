<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            'name' => 'tipe 1',
        ]);
        DB::table('category')->insert([
            'name' => 'tipe 2',
        ]);
        DB::table('category')->insert([
            'name' => 'tipe 3',
        ]);
        
    }
}
