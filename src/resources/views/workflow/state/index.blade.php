<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">State
                  <a href="{{route('stateFormCreate')}}" class="pull-right btn btn-primary btn-xs">Add</a>
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
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      @foreach($states as $state)
                          <tr>
                              <td>{{ $state->name }}</td>
                              <td>{{ $state->label }}</td>
                                  @if($state->status == 0)
                                      <td bgcolor="red">Non Aktif</td>
                                  @elseif($state->status == 1)
                                      <td bgcolor="green">Aktif</td>
                                  @endif
                              <td>
                              @if($state->status == 0)
                                  <a class="view" href="{{ route('stateActive',$state->id) }}">Aktif</a> |
                              @elseif($state->status == 1)
                                  <a class="delete" href="{{ route('stateDeactive',$state->id) }}">Non Aktif</a> |
                              @endif
                              <a class="edit" href="{{ route('stateFormEdit',$state->id) }}">Edit</a>
                              </td>
                          </tr>
                      @endforeach
                  </table>

                  {{ $states->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
