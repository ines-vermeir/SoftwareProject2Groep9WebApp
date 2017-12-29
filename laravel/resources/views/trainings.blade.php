@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Trainings</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                   
                    {!! Form::open(['method'=>'GET','url'=>'trainings','role'=>'search']) !!}
                    <div class="form-group">
                        <label>Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search ....">
                        <br>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    {!! Form::close() !!}
                   
                    <form method="get" action="newTraining">
                       {{ csrf_field() }}
                        <div class="form-group">
                        <label>New training</label>
                        <input type="text" class="form-control" name="title" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Ask</button>
                       
                        
                    </div>
                    </form>
                    
                    
                    
                    @foreach ($trainings as $training)
                        
                    <form method="get" action="newApplication">
                        {{ csrf_field() }}
                        <input type="hidden" name="training_id" value="{{$training->id}}">
                        <input type="hidden" name="manager_id" value="{{ Auth::user()->manager_id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                        <!-- GET OUR BASIC BEAR INFORMATION -->
                        <h2>{{ $training->title }} <br><small>{{ $training->subject }} {{ $training->language }}</small></h2>

                        <h4><i>Sessions</i></h4>
                        @foreach ($training->sessionss as $session)
                        <p>{{ $session->date }}, {{ $session->location->city }}</p>
                        @endforeach 
                        <button>Ask training</button>
                        <br>
                        <a href="training/{{$training->id}}">more info</a>
                    </form>
                    @endforeach
                    
                    {{ $trainings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
