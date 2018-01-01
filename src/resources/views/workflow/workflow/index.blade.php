<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Workflow list
                  <a class="tambah pull-right btn btn-primary btn-xs" href="{{ route('workflowFormCreate') }}">Add</a>
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
                            <th>Content Type</th>
                            <th>Action</th>
                        </tr>
                        @foreach($workflows as $workflow)
                            <tr>
                                <td>{{ $workflow->name }}</td>
                                <td>{{ $workflow->label }}</td>
                                <td>{{ $workflow->content_type }}</td>
                                <td><a class="edit" href="{{ route('workflowFormEdit',$workflow->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                  </div>

                  {{ $workflows->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
