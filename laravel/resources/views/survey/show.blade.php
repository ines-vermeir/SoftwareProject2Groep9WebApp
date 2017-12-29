@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Survey</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h2>{{ $survey->title }} </h2>

<!--
                    <form method="PUT" action="/survey/">
                        @foreach ($survey->questions as $question)
                        <p>{{ $question->question }}</p>
                        @foreach ($question->answers as $answer)
                        <div class="radio">
                            <label>
                            <input type="radio" name="{{ $answer->question_id }}">
                            {{ $answer->answer }} 
                            <input type="hidden" name="answerQ" value="{{ $answer->id }}">
                            </label>
                        </div>
                        @endforeach 
                        
                        @endforeach
                        
                        


                        <button>Fill in</button>
                    </form>
-->
                    
                    {!! Form::open(array('action'=>array('ResultController@store', 'method' => 'POST', $survey->id))) !!}
                      @foreach ($survey->questions as $key=>$question)
                        <p class="flow-text">{{ $question->question }}</p>
                            <input type="hidden" name="surveyid" value="{{$survey->id}}">
                              @foreach($question->answers as $key=>$value)
                               
                                <p style="margin:0px; padding:0px;">
                                  <input type="radio" name="answer[{{ $question->id }}]"  value="{{$value->answer}}" required/>
                                  <label for="{{ $value->answer }}">{{ $value->answer }}</label>
                                </p>
                                
                                
                              @endforeach
                     @endforeach
                    {{ Form::submit('Click Me!') }}
                    {!! Form::close() !!}
                    



                </div>
            </div>
        </div>
    </div>
   
</div>


@endsection
