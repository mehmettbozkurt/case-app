<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enuygun ToDo</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid bg-dark">
    <div class="row">

        <div class="col-sm-12">
            <div class="alert alert-info  my-3" role="alert">
                Tüm çalışmalar {{ $deadline }} hafta içerisinde sona eriyor.
            </div>
            @foreach($todoLists as $devName => $weeklyTasks)
                <div class="card mb-1">
                    <div class="card-header">{{ $devName }}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($weeklyTasks as $week => $tasks)
                                <div class="card border-secondary m-1 col-md-12" style="max-width: 25rem;">
                                    <div class="card-header">Week {{ $week }}</div>
                                    <div class="card-body text-secondary">
                                        <h5>Total Work Hour: {{ $tasks['totalWorkingHour'] }}</h5>
                                        <hr>
                                        @php unset($tasks['totalWorkingHour']) @endphp
                                        @foreach($tasks as $key => $task)
                                            <p>{{ $task[0] }} ({{ $task[1] }} Hours)</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
