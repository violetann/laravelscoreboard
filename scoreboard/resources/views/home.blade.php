@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Score - <a href="{{ route('Scoreboard') }}/?sortscore=asc">Lowest</a> | <a href="{{ route('Scoreboard') }}/?sortscore=dsc">Highest</a></th>
                    <th>Name</th>
                    <th>Difficulty</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($scores as $score)
                  <tr>
                    <td>{{ $score->score }}</td>
                    <td>{{ $score->user->username  }}</td>
                    <td>{{ $score->difficulty->name  }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <center>{!!  $scores->links();   !!}</center>
                <div>
                    <h2>Search</h2>
                    {!! Form::model(['route' => [ 'Scoreboard' ], 'method' => 'PUT']) !!}
                    <div class="col-md-8">
                        <div class="col-md-6">
                        {{ Form::label('Difficulty', 'Difficulty:') }}
                        {{ Form::select('difficulty', $difficulties) }}
                        </div>
                        <div class="col-md-6">  
                        {{ Form::label('username', 'Username:') }}
                        {{ Form::text('username','') }}
                        </div>
                    </div>
                     {{ Form::submit('Search',['class'=>"btn btn-default"]) }}    
                </div>
        </div>
    </div>
</div>
@endsection
