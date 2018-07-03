<?php

use App\Models\Specie;
use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    
    private $species = ['Lion', 'Gorilla', 'Bufalo'];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->species as $specie) {
            Specie::firstOrCreate(['name' => $specie]);
        }
    }
}
