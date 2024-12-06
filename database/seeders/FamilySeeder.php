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
 

        // Insert the new family data
        DB::table('families')->insert([
            [
                'family_name' => 'Felidae',
                'characteristics' => 'Carnivorous mammals known for retractable claws and sharp teeth. Includes lions, tigers, cheetahs, leopards, and more.',
                'evolutionary_origin' => 'Originated around 10-15 million years ago during the Miocene era.',
            ],
            [
                'family_name' => 'Canidae',
                'characteristics' => 'Carnivorous mammals, including dogs, wolves, and foxes, known for their social behavior and adaptability.',
                'evolutionary_origin' => 'Originated around 34 million years ago in the Late Eocene period.',
            ],
            [
                'family_name' => 'Hominidae',
                'characteristics' => 'Great apes including humans, orangutans, gorillas, and chimpanzees. Known for advanced cognitive abilities.',
                'evolutionary_origin' => 'Originated around 14 million years ago.',
            ],
            [
                'family_name' => 'Giraffidae',
                'characteristics' => 'Large herbivorous mammals with long necks and legs, native to Africa. Includes giraffes and okapis.',
                'evolutionary_origin' => 'Originated around 15 million years ago during the Miocene era.',
            ],
            [
                'family_name' => 'Equidae',
                'characteristics' => 'Herbivorous mammals with hooves and long legs. Includes zebras, horses, and donkeys.',
                'evolutionary_origin' => 'Originated around 55 million years ago in the Eocene period.',
            ],
            [
                'family_name' => 'Elephantidae',
                'characteristics' => 'Large herbivorous mammals with trunks and tusks, known for their strong social bonds.',
                'evolutionary_origin' => 'Originated around 6 million years ago.',
            ],
        ]);
    }
}
