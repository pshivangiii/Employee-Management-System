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
          <p> Deleted Successfully </p>
        </div>
      @endif
    <form class ="row g-3" action="{{url('/')}}/show" method="POST">
        {{ csrf_field() }}
      <div class="container">
          <h2 style="background-color:#b891e5;">All Employees are:</h2>
          <input style="background-color:#ddd8c2;" class="form-control" id="myInput" type="text" placeholder="Search..">
          <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr style="background-color:#ccc91d;">
                    <td>ID</td>
                    <td>Email</td>
                    <td>Team</td>
                    <td>Designation</td>
                    <td>DELETE</td>
                    <td>EDIT</td>
                </tr>
              </thead>
              <tbody id="myTable">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->team}}</td>
                    <td>{{ $user->designation}}</td>
                    <td style="background-color:#e9b0b3;">
                      <form action="/show/{{ $user->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id">
                        <button button style="background-color:#f09797;" type="submit">Delete</button>
                      </form>
                    </td>
                    <td style="background-color:#95d86f;">
                        <form action="/edit/{{ $user->email}}" method="GET">
                          <button button style="background-color:#95d86f;" type="submit">Edit</button>
                        </form>
                    </td>
                </tr>  
                @endforeach
              </tbody>
        </table>
        <p>{{ $users->links() }}</p>
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