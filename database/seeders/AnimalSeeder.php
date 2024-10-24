<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use Carbon\Carbon;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        Animal::insert([
            [
                'animal_name' => 'Lion',
                'scientific_name' => 'Panthera leo',
                'description' => 'Lions (Panthera leo) are large, social carnivorous mammals known for their majestic appearance, particularly the males\' impressive manes, which can vary in color from blond to black. Weighing between 330 to 550 pounds (150 to 250 kg), they inhabit sub-Saharan Africa and the Gir Forest in India, primarily residing in savannas and grasslands. Lions live in groups called prides, typically consisting of related females, their cubs, and a few males, allowing them to hunt cooperatively and protect their young. They primarily prey on large herbivores like wildebeest and zebras, using teamwork to bring down their quarry. Classified as vulnerable, lions face declining populations due to habitat loss, human-wildlife conflict, and poaching.',
                'behavioral_notes' => 'Lions (Panthera leo) are unique among big cats due to their social structure, living in groups called prides, which typically consist of several related females, their offspring, and one or two dominant males. They are cooperative hunters, often working together to take down large prey, with females usually doing most of the hunting using stealth and teamwork. Male lions are territorial and defend their pride’s territory from rivals through roaring and scent marking. Communication is vital, with vocalizations like roars, grunts, and growls serving to establish dominance and location. Female lions play a crucial role in raising cubs, nursing and protecting them, while the pride may assist in caring for the young. Social interactions, including grooming, strengthen bonds and reduce tension, while playful interactions among cubs help develop their hunting skills. Known for their lazy behavior, lions can rest for up to 20 hours a day, conserving energy for effective hunting during cooler times. Although primarily found in savannas and grasslands, they can adapt to various environments as long as prey is available.',
                'lifespan' => '10-14 years in the wild, up to 20 years in captivity',
                'diet' => 'Carnivore',
                'social_structure' => 'Prides, consisting of related females, their cubs, and a few males',
                'threats' => 'Habitat loss, human-wildlife conflict, poaching',
                'primary_predator' => 'Humans',
                'image_url' => 'images/Lion.jpg', // Placeholder URL
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'animal_name' => 'Elephant',
                'scientific_name' => 'Loxodonta africana',
                'description' => 'The African elephant (Loxodonta africana) is the largest land mammal, known for its massive body, large ears that help regulate temperature, and long trunk used for feeding, drinking, and social interactions. They are highly intelligent and social animals that live in herds led by a matriarch. African elephants are primarily found in sub-Saharan Africa, inhabiting various ecosystems, including savannas, forests, and deserts. They are herbivores, primarily feeding on grasses, leaves, and fruits, and play a crucial role in maintaining the ecosystems they inhabit.',
                'behavioral_notes' => 'African elephants are known for their complex social structures, often forming tight-knit family groups. They communicate using a variety of vocalizations and body language. Elephants exhibit behaviors such as cooperation in foraging, caring for young, and mourning their dead. They are also known for their problem-solving abilities and can use tools, such as sticks, to help reach food or scratch themselves. Their strong memory helps them navigate their environments and remember the locations of water sources.',
                'lifespan' => '60-70 years',
                'diet' => 'Herbivore',
                'social_structure' => 'Herds, led by a matriarch',
                'threats' => 'Poaching, habitat loss, human-wildlife conflict',
                'primary_predator' => 'Humans',
                'image_url' => 'images/elephant.jpg', // Placeholder URL
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'animal_name' => 'Giraffe',
                'scientific_name' => 'Giraffa camelopardalis',
                'description' => 'The giraffe (Giraffa camelopardalis) is the tallest land animal, characterized by its long neck, which allows it to reach high branches and foliage. They are native to Africa and are known for their distinctive spotted coat, which provides camouflage in the wild. Giraffes are social animals that typically live in loose herds, with no strong social bonds. They primarily feed on leaves, fruits, and flowers from trees, using their long tongues to grasp foliage. Giraffes are essential for their ecosystems, helping to shape the vegetation structure.',
                'behavioral_notes' => 'Giraffes communicate through a variety of sounds, including grunts and moans. They are generally calm and non-aggressive animals but may exhibit playful behaviors, especially among young individuals. Giraffes can run at speeds of up to 37 miles per hour over short distances. They have a unique method of drinking, spreading their legs to reach water while bending down, making them vulnerable to predators during this time.',
                'lifespan' => '25 years in the wild, up to 30 years in captivity',
                'diet' => 'Herbivore',
                'social_structure' => 'Loose herds with no strong bonds',
                'threats' => 'Habitat loss, poaching, human-wildlife conflict',
                'primary_predator' => 'Humans, lions',
                'image_url' => 'images/giraffe.jpg', // Placeholder URL
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'animal_name' => 'Zebra',
                'scientific_name' => 'Equus quagga',
                'description' => 'Zebras (Equus quagga) are distinctive black-and-white striped herbivores native to Africa. Their unique patterns provide camouflage and help deter predators. Zebras are social animals that live in herds, often consisting of family groups. They primarily graze on grasses and are known for their agility and speed, which help them escape from predators. Zebras play a significant role in their ecosystems, contributing to vegetation control.',
                'behavioral_notes' => 'Zebras are known for their strong social bonds, often forming close relationships within their herds. They communicate using vocalizations, body language, and facial expressions. Zebras exhibit playful behaviors, especially among young individuals, which helps strengthen social ties. When threatened, zebras may run in a zigzag pattern to confuse predators, making it more challenging for them to target an individual.',
                'lifespan' => '25 years in the wild, up to 40 years in captivity',
                'diet' => 'Herbivore',
                'social_structure' => 'Herds, often consisting of family groups',
                'threats' => 'Habitat loss, poaching, competition with livestock',
                'primary_predator' => 'Lions, hyenas',
                'image_url' => 'https://example.com/zebra.jpg', // Placeholder URL
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'animal_name' => 'Cheetah',
                'scientific_name' => 'Acinonyx jubatus',
                'description' => 'The cheetah (Acinonyx jubatus) is the fastest land animal, capable of reaching speeds up to 75 miles per hour (120 km/h) in short bursts covering distances up to 1,500 feet (460 meters). They have a slender body, long legs, and a distinctive black "tear mark" running from the eyes to the mouth. Cheetahs primarily inhabit open grasslands and savannas in Africa, where they rely on their speed and agility to hunt small to medium-sized ungulates.',
                'behavioral_notes' => 'Cheetahs are solitary or live in small family groups, usually consisting of a mother and her cubs. They are known for their unique hunting strategy, which involves stalking their prey closely before initiating a high-speed chase. Cheetahs communicate through various vocalizations, including purring, growling, and chirping. Unlike other big cats, they cannot roar, and their vocalizations are more varied. Cheetah cubs are vulnerable and rely heavily on their mothers for protection and learning hunting skills.',
                'lifespan' => '10-12 years in the wild, up to 20 years in captivity',
                'diet' => 'Carnivore',
                'social_structure' => 'Solitary or small family groups',
                'threats' => 'Habitat loss, human-wildlife conflict, poaching',
                'primary_predator' => 'Humans, lions',
                'image_url' => 'images/cheetah.jpg', // Placeholder URL
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}