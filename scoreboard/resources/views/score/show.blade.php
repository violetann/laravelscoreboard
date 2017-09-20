@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h1>{{ $score->difficulty->name }}</h1>
        <h2>{{ $score->user->username  }}</h2>
        <h3>{{ $score->score }}</h3>
    </div>
</div> 
</div>
@endsection
