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
                            <th>Score - <a href="{{ route('admin') }}/?sortscore=asc">Lowest</a> | <a href="{{ route('admin') }}/?sortscore=dsc">Highest</a></th>
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
                            <td ALIGN=RIGHT>
                              {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['score.destroy', $score->id]
                            ]) !!}
                            <a href="{{ URL::route('score.edit',$score->id) }}" class="btn btn-default">Edit</a>
                            <a href="" class="btn btn-success">Approve</a>
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                                </td>
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
