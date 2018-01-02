<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Workflow
                  <a href="{{ route('workflow') }}"  class="pull-right btn btn-danger btn-xs">Back</a>
                </div>

                <div class="panel-body">
								  {!! Form::open(array('route' => 'workflowStore', 'method' => 'POST')) !!}
								    {!! Form::label('label','Label : ') !!}
								    {!! Form::text('label') !!}
										<br>
										{!! Form::label('content_type','Content Type : ') !!}
										<select name="content_type" id="content_type">
											<option value="">-Select-</option>
											@foreach($models as $model)
												<option value="{{ $model }}">{{ $model }}</option>
											@endforeach
										</select>
										<br>
								    {!! Form::submit() !!}
								  {!! Form::close() !!}
							</form>
						</div>
				</div>
		</div>
</div>
</div>
