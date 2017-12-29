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
                    
                    
                    <p>This page is for the manager only</p>
                    
                    @forelse ($applications as $application)
                    
                    @if(Auth::user()->odata_id == $application->manager_id || Auth::user()->manager_id == '')
                    <h1>Newly demanded applications</h1>
                    <h3>{{$application->training->title}}</h3>
                    <h5>Asked by: {{$application->user->email}}</h5>
                    <p>Status: {{$application->status}}</p>
                    
                    <form method="post" action="application/{{$application->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    <input type="hidden" name="post" value="allow">
                    <button>Accept</button>
                    </form>
                    <form method="post" action="application/{{$application->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    <input type="hidden" name="post" value="deny">
                    <button>Decline</button>
                    </form>
                     @endif
                    @empty
                    
                   No more applications
                    
                   
                   
                    
                   
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
