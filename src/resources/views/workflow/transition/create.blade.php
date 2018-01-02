<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Transition
                  <a href="{{ route('transition') }}"  class="pull-right btn btn-danger btn-xs">Back</a>
                </div>

                <div class="panel-body">
								  {!! Form::open(array('route' => 'transitionCreate', 'method' => 'POST')) !!}

								    {!! Form::label('label','Label : ') !!}
								    {!! Form::text('label') !!}
										<br>
										{!! Form::label('from','From :') !!}<br>
										<select multiple="multiple" name="from[]" id="from">
											<option value="">-Select-</option>
											@foreach($states as $state)
												<option value="{{ $state->label }}">{{ $state->label }}</option>
											@endforeach
										</select>
										<br>
										{!! Form::label('to','To :') !!}<br>
										<select multiple="multiple" name="to[]" id="from">
											<option value="">-Select-</option>
											@foreach($states as $state)
												<option value="{{ $state->label }}">{{ $state->label }}</option>
											@endforeach
										</select>
										<br>
										{{ Form::textarea('message', null, ['size' => '30x5']) }}<br>
								    {!! Form::submit() !!}
								  {!! Form::close() !!}
							</form>
						</div>
				</div>
		</div>
</div>
</div>
