@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create new score</h1>
        <hr>
        {!! Form::open(['route' => 'score.store']) !!}
            {{ Form::label('score', 'Score:') }}
			{{ Form::number('score', null) }}
            <br><br>
            {{ Form::label('Difficulty', 'Difficulty:') }}
            {{ Form::select('difficulty', $difficulties, 0) }}
            <br><br>
            <a href="{{ url()->previous() }}" class="btn btn-danger" >Cancel</a>
            {{ Form::submit('Create Score',array('class'=>'btn btn-success' )) }}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
