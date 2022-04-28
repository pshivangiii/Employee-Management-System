<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>USER DETAILS</title>
  </head>
  <body>
    <form class ="row g-3" action="{{url('/')}}/show" method="POST">
      {{ csrf_field() }}
        <div class="container">
          <h2 style="background-color:#b6d39b;">Your Team Details are here:</h2>
          <input style="background-color:#ddd8c2;" class="form-control" id="myInput" type="text" placeholder="Search..">
          <br>
          <table class="table table-bordered table-striped">
            <thead>
              <tr style="background-color:#aa9cdf;">
                  <th></th>
                  <th>ID</th>
                  <th>EMAIL</th>
                  <th>TEAM</th>
                  <th>DESIGNATION</th>
                  <th>DELETE</th>
                  <th>EDIT</th>
              </tr>
            </thead>
            <tbody id="myTable">
            @foreach ($users as $data)
              <tr>
                  <td></td>
                  <td>{{ $data->id}}</td>
                  <td>{{ $data->email}}</td>
                  <td>{{ $data->team }}</td>
                  <td>{{ $data->designation }}</td>
                  <td style="background-color:#e9b0b3;">
                  <form action="/show/{{ $data->id }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="hidden" name="id">
										<button button style="background-color:#f09797;" type="submit">Delete</button>
									</form></td>
                  <td style="background-color:#95d86f;">
                    <form action="/edit/{{ $data->email}}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      <input type="hidden" name="id">
                      <button button style="background-color:#95d86f;" type="submit">Edit</button>
                    </form></td>
              </tr>  
            @endforeach
            </tbody>
          </table>
        </div>
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
        </form>
  </body>
</html>