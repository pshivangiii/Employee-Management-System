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
    <form class ="row g-3" action="{{url('/')}}/team_details" method="POST">
      {{ csrf_field() }}
        <div class="container">
            <h2  style="background-color:#90ee7d;">Your Team Details are here:</h2>
            <p  style="background-color:#d3c5cf;">Type something to search the table for team, designation or emails:</p>  
            <input  style="background-color:#edeeec;" class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                <tr style="background-color:#aa9cdf;">
                  <th>EMAIL</th>
                  <th>TEAM</th>
                  <th>DESIGNATION</th>
                </tr>
              </thead>
              <tbody id="myTable">
                @foreach($users as $key => $data)
                <tr>
                  <td>{{ $data->email}}</td>
                  <td>{{ $data->team }}</td>
                  <td>{{ $data->designation }}</td>
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
          