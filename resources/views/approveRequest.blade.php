<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Team Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    @if (session('status'))
     <div class="alert alert-success" role="alert">
      <p> Attendance Updated Successfully </p>
     </div>
    @endif
    <h2 style="background-color:#aee5a0;"><u>Attendance Requests</u></h2>
    <input style="background-color:#e5eed8;" class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background-color:#aa9cdf;">
          <td>ID</td>
          <td>Email</td>
          <td>Team</td>
          <td>Attendance Requests</td>
          <td>Approve</td>
        </tr>
      </thead>
      <tbody id="myTable">
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->team}}</td>
          <td>{{ $user->pending_requests}}</td>
          <td><button id="btn"><a href = '/approve_attendance/{{ $user->email }}'>View Requests</a></button></td>
        </tr>
      @endforeach
      </tbody>
    </table>
   <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
   </script>
  </body>
</html> 
