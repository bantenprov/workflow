<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Transition
                  <a href="{{route('transitionFormCreate')}}" class="pull-right btn btn-primary btn-xs">Add</a>
                </div>

                <div class="panel-body">
                  @if(Session::has('message'))
                      <div class="alert alert-info">
                          {{ Session::get('message') }}
                      </div>
                  @endif

									<div class="table-responsive">
										<table class="table table-bordered table-stripped">
											<tr>
												<th>Name</th>
												<th>Label</th>
												<th>From</th>
												<th>To</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											@foreach($transitions as $transition)
												<tr>
													<td>{{ $transition->name }}</td>
													<td>{{ $transition->label }}</td>
													<td>{{ $transition->from }}</td>
													<td>{{ $transition->to }}</td>
													<td>{{ $transition->message }}</td>
														@if($transition->status == 0)
															<td bgcolor="red">Non Aktif</td>
														@elseif($transition->status == 1)
															<td bgcolor="green">Aktif</td>
														@endif
													<td>
													@if($transition->status == 0)
														<a class="view" href="{{route('transitionActive',$transition->id)}}
														">Aktif</a>
													@elseif($transition->status == 1)
														<a class="delete" href="{{route('transitionDeactive',$transition->id)}}">Non Aktif</a>
													@endif
													<a class="edit" href="{{route('transitionFormEdit',$transition->id)}}">Edit</a>
													</td>
												</tr>
											@endforeach
										</table>

									  {{ $transitions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
