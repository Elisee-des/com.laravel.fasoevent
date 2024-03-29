<?php

namespace Database\Seeders;

use App\Models\Activite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activite::create(
            [
                'nom' => 'Concert',
            ]
        );

        Activite::create(
            [
                'nom' => 'Cinema',
            ]
        );

        Activite::create(
            [
                'nom' => 'Foire',
            ]
        );
    }
}
