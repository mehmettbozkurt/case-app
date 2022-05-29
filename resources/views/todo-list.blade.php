<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer Todo List</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>
  <body>
    <!--END HEAD-->
    <div class="" style="padding:35px;">
      <div class="row">
        <div class="col-sm-12"> @foreach($todoLists as $devName => $weeklyTasks) <div class="card border-info  text-center col-sm-2" style="margin:10px;width: 17.499999995%;
        flex: 0 0 17.499%;max-width: 17.499%;">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#collapseSECOND">
                <h3 class="card-title text-dark">{{ $devName }}</h3>
              </a>
            </div>
            <div id="collapseSECOND" class="collapse show" data-parent="#accordion">
              <div class="card-body"> @foreach($weeklyTasks as $week => $tasks) <h5 class="card-subtitle mb-2 text-muted">Week {{ $week }} | Total Work Hour: {{ $tasks['totalWorkingHour'] }}</h5>
                <table class="table table-hover group table-striped">
                  <table class="table table-hover group table-striped">
                    <tbody> @php unset($tasks['totalWorkingHour']) @endphp @foreach($tasks as $key => $task) <tr>
                        <td> {{ $task[0] }} </td>
                        <td> ({{ $task[1] }}) Hours </td>
                      </tr> @endforeach
                      <hr>
                    </tbody>
                  </table>
                </table> @endforeach
              </div>
            </div>
          </div> @endforeach </div>
      </div>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</html>
