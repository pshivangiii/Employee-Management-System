<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Results</title>
</head>
  <body>
    <form class ="row g-3" action="{{url('/')}}/search" method="POST">
     {{ csrf_field() }}
      <div class="container">
        <h3>Following Employee/s match your search</H3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr style="background-color:#aa9cdf;">
                <td>ID</td>
                <td>Email</td>
                <td>Team</td>
                <td>Designation</td>
            </tr>
            </thead>
             @foreach ($data as $data) 
             <tr>
                <td>{{$data['id']}}</td>
                <td>{{ $data['email']}}</td>
                <td>{{ $data['team']}}</td>
                <td>{{ $data ['designation']}}</td>
            </tr> 
            @endforeach 
        </table>
      </div>
    </form>
  </body>
</html>