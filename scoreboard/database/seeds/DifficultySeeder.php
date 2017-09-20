<?php

use Illuminate\Database\Seeder;
use App\Difficulty;

class DifficultySeeder extends Seeder{

    public function run(){
        DB::table('difficulties')->delete();

        Difficulty::create([
            'name'   => 'Easy'
        ]);

        Difficulty::create([
            'name'   => 'Normal'
        ]);
        
        Difficulty::create([
            'name'   => 'Hard'
        ]);
        
        Difficulty::create([
            'name'   => 'Nightmare'
        ]);
    }
}
