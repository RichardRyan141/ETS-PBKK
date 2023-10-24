<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quality')->insert([
            'name' => 'baik',
        ]);
        DB::table('quality')->insert([
            'name' => 'layak',
        ]);
        DB::table('quality')->insert([
            'name' => 'rusak',
        ]);
        
    }
}
