@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    
                    @foreach ($applications as $application)
                    
                    @if(Auth::user()->odata_id == $application->user_id)
                    <h2>{{$application->training->title}}</h2>
                    <h5>{{$application->user->email}}</h5>
                    <p>{{$application->status}}</p>
                    
                    
                    
                    
                    
                    @endif
                   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
