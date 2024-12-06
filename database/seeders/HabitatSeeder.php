<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
            [
                'habitat_name' => 'Grassland',
                'description' => 'A large open area of country covered with grass or grasslike vegetation.',
                'climate' => 'Semi-arid',
            ],
            [
                'habitat_name' => 'Tropical Rainforest',
                'description' => 'A dense forest found in tropical areas with consistently high rainfall.',
                'climate' => 'Tropical',
            ],
            [
                'habitat_name' => 'Woodlands',
                'description' => 'A habitat type dominated by trees but with a less dense canopy than forests.',
                'climate' => 'Temperate',
            ],
        ]);
    }
}

