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
    <form class ="row g-3" action="{{url('/')}}/showUsers" method="POST">
      {{ csrf_field() }}
        <div class="container">
            <h2 style="background-color:#b6d39b;">USER DETAILS ARE HERE:</h2>
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
                </tr>
             </thead>
             <tbody id="myTable">
             @foreach($data as $key => $data)
                <tr>
                  <td></td>
                  <td>{{ $data->id}}</td>
                  <td>{{ $data->email}}</td>
                  <td>{{ $data->team }}</td>
                  <td>{{ $data->designation }}</td>
                </tr>
             @endforeach
             </tbody>
            </table>
            <div>
               <p>      
            <a href = '/showUsers'>PREVIOUS</a>
            <a href = '/nextUsers/{{ $data->id }}'> NEXT</a>
            </div>
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