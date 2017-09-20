@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Score - <a href="{{ route('home') }}/?sortscore=asc">Lowest</a> | <a href="{{ route('home') }}/?sortscore=dsc">Highest</a></th>
                            <th>Name</th>
                            <th>Difficulty</th>
                            <th ALIGN=RIGHT><a href="{{ URL::route('score.create') }}" class="btn btn-default">Add new score</a></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($scores as $score)
                          <tr>
                            <td>{{ $score->score }}</td>
                            <td>{{ $score->user->username  }}</td>
                            <td>{{ $score->difficulty->name  }}</td>
                            <td></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!!  $scores->links();   !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
