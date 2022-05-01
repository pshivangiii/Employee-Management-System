<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h2  style="background-color:#9ddb6a;"> EDIT RECORDS </h2>
    <br>
      <input  style="background-color:#e9e8d4;" class="form-control" id="myInput" type="text" placeholder="Search..">
      <br>
      <table class="table table-bordered table-striped">
        <thead>
          <tr style="background-color:#aa9cdf;">
              <td>ID</td>
              <td>Email</td>
              <td>Team</td>
              <td>Designation</td>
              <td>Edit</td>
          </tr>
        </thead>
        <tbody id="myTable">
        @foreach ($users as $user)
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->team}}</td>
              <td>{{ $user->designation}}</td>
              <td style="background-color:#b7c951;"><a href = 'edit/{{ $user->email }}'><b >Edit</b></a></td>
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
    <style>
      tr:hover {background-color: #cfb5b7;
    </style>
  </body>
</html>