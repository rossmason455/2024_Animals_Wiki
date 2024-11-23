<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habitats')->insert([
            [
                'habitat_name' => 'Savannah',
                'description' => 'A grassland ecosystem characterized by trees being sufficiently small or sparse to maintain an open canopy.',
                'climate' => 'Tropical',
            ],
            [
                'habitat_name' => 'Forest',
                'description' => 'A large area covered chiefly with trees and undergrowth.',
                'climate' => 'Temperate',
            ],
            [
                'habitat_name' => 'Desert',
                'description' => 'A barren area of landscape where little precipitation occurs.',
                'climate' => 'Arid',
            ],
        ]);
    }
}
