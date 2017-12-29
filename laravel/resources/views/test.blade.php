{!! Form::open(array('action'=>array('TestController@store', 'method' => 'POST'))) !!}
                    <input type="text" name="textname">
                    <input type="text" name="textname2">
                    
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[1]" value="radio1">
                    <label for="radio1">radio1</label>
                    </p>
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[1]" value="radio2">
                    <label for="radio2">radio2</label>
                    </p>
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[1]" value="radio3">
                    <label for="radio3">radio3</label>
                    </p>
                    <br>
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[2]" value="radio1">
                    <label for="radio1">radio1</label>
                    </p>
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[2]" value="radio2">
                    <label for="radio2">radio2</label>
                    </p>
                    <p style="margin:0px; padding:0px;">
                    <input type="radio" name="radioSamen[2]" value="radio3">
                    <label for="radio3">radio3</label>
                    </p>
{{ Form::submit('Click Me!') }}
{!! Form::close() !!}