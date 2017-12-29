@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Surveys</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach ($surveys as $survey)
                    <form method="get" action="surveys/{$survey->id} ">
                     <h2>{{ $survey->title }}</h2>
                     <a href="survey/{{$survey->id}}">Fill in</a>
                     </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
