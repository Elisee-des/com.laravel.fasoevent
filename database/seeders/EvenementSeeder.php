<?php

namespace Database\Seeders;

use App\Models\Evenement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evenement::create(
            [
                'nom' => 'Concert du siècle a koudougou',
                'description' => "Concert Organisé par les FasoConcerts pour l'ouverture des vacances.",
                'datedebut' => '2024-03-24 18:33:18',
                'datefin' => '2024-04-24 00:00:00',
                'lieu' => 'Koudougou',
                'photo' => null,
                'isActive' => false,
                'activite_id' => 1,
                'promoteur_id' => 1,
            ]
        );

        Evenement::create(
            [
                'nom' => 'Concert du siècle a Dedougou',
                'description' => "Concert Organisé par les FasoConcerts pour l'ouverture des vacances.",
                'datedebut' => '2024-03-24 18:33:18',
                'datefin' => '2024-04-24 00:00:00',
                'lieu' => 'Dedougou',
                'photo' => null,
                'isActive' => false,
                'activite_id' => 1,
                'promoteur_id' => 1,
            ]
        );
    }
}
