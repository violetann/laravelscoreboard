<?php

use Illuminate\Database\Seeder;
use App\Difficulty;
use App\User;
use App\Score;

class ScoreSeeder extends Seeder{

    public function run(){
        DB::table('scores')->delete();

        $EasyDifficulty = Difficulty::whereName('Easy')->first();
        $NormalDifficulty = Difficulty::whereName('Normal')->first();
        $HardDifficulty = Difficulty::whereName('Hard')->first();
        $NightmareDifficulty = Difficulty::whereName('Normal')->first();

        $UserUser = User::whereUsername('user')->first();
        $AdminUser = User::whereUsername('admin')->first();
        
        /// ADMIN SCORES
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $NormalDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $HardDifficulty['id']
        ]);

        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $NightmareDifficulty['id']
        ]);
        
        /// USER SCORES
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $UserUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $AdminUser['id'],
            'difficulty_id' => $EasyDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $UserUser['id'],
            'difficulty_id' => $NormalDifficulty['id']
        ]);
        
        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $UserUser['id'],
            'difficulty_id' => $HardDifficulty['id']
        ]);

        $score = Score::create([
            'score'    => rand(0,100),
            'user_id' => $UserUser['id'],
            'difficulty_id' => $NightmareDifficulty['id']
        ]);
           
    }
}