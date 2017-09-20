<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Difficulty;
use App\User;
use App\Score;
use Log;
use Session;
use Auth;

class ScoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $difficulties = Difficulty::all();
        $difficultiesarray = array();
        
        foreach ($difficulties as $difficulty){
            $difficultiesarray[$difficulty->id]=$difficulty->name;
        }
        
        return view('score.create', ['difficulties' => $difficultiesarray]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $score = Score::create([
            'score'    => $request->input('score'),
            'user_id' => Auth::user()->id,
            'difficulty_id' => $request->input('difficulty')
        ]);
        Session::flash('success','The score was successfully created!');

        //redirect on complete
        return redirect()->route('score.show',$score->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = Score::find($id);
        return view('score.show', ['score' => $score]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!(auth()->user()->hasRole('administrator'))){
            Session::flash('Failed','Your not an admin');
            return redirect()->back();
        }
        
        $difficulties = Difficulty::all();
        $difficultiesarray = array();
        
        foreach ($difficulties as $difficulty){
            $difficultiesarray[$difficulty->id]=$difficulty->name;
        }
        
        $score = Score::find($id);
        return view('score.edit', ['score' => $score, 'difficulties' => $difficultiesarray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!(auth()->user()->hasRole('administrator'))){
            Session::flash('Failed','Your not an admin');
            return redirect()->back();
        }
        $score = Score::find($id);
        
        $score->difficulty_id = $request->input('difficulty');
        $score->score = $request->input('score');

        $score->save();
        Session::flash('success','The score changes were successfully saved!');

        //redirect on complete
        return redirect()->route('score.show',$score->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!(auth()->user()->hasRole('administrator'))){
            Session::flash('Failed','Your not an admin');
            return redirect()->back();
        }
        $score = Score::find($id);
        $score->delete();

        Session::flash('success','This blog post was successfully deleted');

        return redirect()->back();
    }
}
