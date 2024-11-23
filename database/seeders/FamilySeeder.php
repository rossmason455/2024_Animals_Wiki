<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->insert([
            [
                'family_name' => 'Felidae', 
                'characteristics' => 'Carnivorous mammals known for retractable claws and sharp teeth.', 
                'evolutionary_origin' => 'Originated around 10-15 million years ago during the Miocene era.'
            ],
            [
                'family_name' => 'Canidae', 
                'characteristics' => 'Carnivorous mammals, including dogs, wolves, and foxes, known for their social behavior and adaptability.',
                'evolutionary_origin' => 'Originated around 34 million years ago in the Late Eocene period.'
            ],
            [
                'family_name' => 'Hominidae', 
                'characteristics' => 'Great apes including humans, orangutans, gorillas, and chimpanzees. Known for advanced cognitive abilities.',
                'evolutionary_origin' => 'Originated around 14 million years ago.'
            ],
            // Add more families as needed
        ]);
    }
}
