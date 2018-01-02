<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">History</div>

                <div class="panel-body">
                  @if(Session::has('message'))
                      <div class="alert alert-info">
                          {{ Session::get('message') }}
                      </div>
                  @endif

                  <div class="table-responsive">
                    <table class="table table-bordered table-stripped">
                        <tr>
                            <th>Conten</th>
                            <th>Workflow</th>
                            <th>State From</th>
                            <th>State To</th>
                            <th>Timestamp</th>
                            <th>User</th>
                        </tr>
                        @foreach($historys as $key => $history)
                              <tr>
                                  <td>{{ $history->getApiKeys->client }}</td>
                                  <td>{{ $history->getWorkflow->content_type }}</td>
                                  <td>{{ $history->getStateFrom->label }}</td>
                                  <td>{{ $history->getStateTo->label }}</td>
 +                                <td>{{ $dates[$key] }}</td>
 +                                <td>{{ $history->getUserName->name }}</td>
                              </tr>
                          @endforeach
                    </table>
                  </div>

                  {{ $historys->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
