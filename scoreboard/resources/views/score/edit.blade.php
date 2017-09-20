@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
		{!! Form::model($score, ['route' => ['score.update', $score->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('score', 'Score:') }}
			{{ Form::number('score', $score->score) }}
            
            {{ Form::label('Difficulty', 'Difficulty:') }}
            {{ Form::select('difficulty', $difficulties, $score->difficulty->id) }}
            
		</div>
    <div class="col-md-4">
            <dl class="dl-horizontal">
                <dt>Created at:</dt>
                <dd>{{   date('g:i a j M o',strtotime($score->created_at))   }}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Last updated:</dt>
                <dd>{{   date('g:i a j M o',strtotime($score->updated_at))   }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ url()->previous() }}" class="btn btn-danger" >Cancel</a>
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes',['class'=>"btn btn-success btn-block"]) }}                
                </div>
            </div>
    </div>
</div>
</div>
@endsection
