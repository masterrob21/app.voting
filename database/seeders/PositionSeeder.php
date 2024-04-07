<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
           [
            'position' => 'President',
            'created_at' => now(),
            'updated_at' => now(),
           ], 

           [
            'position' => 'Vice President',
            'created_at' => now(),
            'updated_at' => now(),
           ],

           [
            'position' => 'Financial Secretary',
            'created_at' => now(),
            'updated_at' => now(),
           ],

           [
            'position' => 'Organising Secretary',
            'created_at' => now(),
            'updated_at' => now(),
           ],

           [
            'position' => 'Secretary',
            'created_at' => now(),
            'updated_at' => now(),
           ],
        ]);
    }
}