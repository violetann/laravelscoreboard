<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function userhome(Request $request)
    {
        $sortscore = $request->input('sortscore', 'dsc');
        
        $scores = Score::with('User','Difficulty')->where('user_id', Auth::user()->id)->orderBy('score', $sortscore)->paginate(10);
        return view('userhome', ['scores' => $scores]);
    }
    public function adminhome(Request $request)
    {
        $sortscore = $request->input('sortscore', 'dsc');
        
        $scores = Score::with('User','Difficulty')->orderBy('score', $sortscore)->paginate(10);
        return view('adminhome', ['scores' => $scores]);
    }
}
