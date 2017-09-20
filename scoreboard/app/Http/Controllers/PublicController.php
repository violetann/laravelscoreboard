<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Difficulty;

class PublicController extends Controller
{
    public function home(Request $request)
    {
        $difficulties = Difficulty::all();
        $difficultiesarray = array();
        $difficultiesarray[0] = 'All';
        
        foreach ($difficulties as $difficulty){
            $difficultiesarray[$difficulty->id]=$difficulty->name;
        }
        
        $sortscore = $request->input('sortscore', 'dsc');
        
        $scores = Score::with('User','Difficulty')->orderBy('score', $sortscore)->paginate(10);
        
        return view('home', ['scores' => $scores, 'difficulties' => $difficultiesarray]);
    }
    
    public function homesearch(Request $request)
    {
        $difficulties = Difficulty::all();
        $difficultiesarray = array();
        $difficultiesarray[0] = 'All';
        
        foreach ($difficulties as $difficulty){
            $difficultiesarray[$difficulty->id]=$difficulty->name;
        }
        
        $sortscore = $request->input('sortscore', 'dsc');
        
        $scores = Score::with('User','Difficulty');
        
        if($request->input('difficulty')!=0){
        $scores = $scores->where('difficulty_id', $request->input('difficulty'));
        }
        
        
        if($request->input('username')!=''){
        $scores = $scores->join('users', 'scores.user_id', '=', 'users.id')->where('users.username', $request->input('username'))->select('scores.*', 'users.username');
        }
        
        $scores = $scores->orderBy('score', $sortscore)->paginate(10);
        
        return view('home', ['scores' => $scores, 'difficulties' => $difficultiesarray]);
    }
    
    
}
