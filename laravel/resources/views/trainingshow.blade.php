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

                   
                    <h2>{{ $training->title }} </h2>
                    
                    @foreach ($training->sessionss as $session)
                        <p>{{ $session->date }}</p>
                        <p><b>{{ $session->location->streetName }} </b>{{ $session->location->number }}</p>
                        <p>{{ $session->location->postalCode }}, <b>{{ $session->location->city }}</b></p>
                        <br>
                    @endforeach 
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
