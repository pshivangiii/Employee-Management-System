<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Filter</title>
  </head>
  <body>
    <form class ="row g-3" action="{{url('/')}}/search" method="POST">
      {{ csrf_field() }}
        <div class="container">
            <h2 style="background-color:#a2bce7;">USERS:</h2><br>
            <div>
                <label for="search"><b>Search</b></label>
                <input style="background-color:#ddd8c2;" type="text" placeholder="Enter Search" name="search" id="search" >
                <button id = "bt" type="submit" >SEARCH</button>
                </div><br>
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
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->team}}</td>
                    <td>{{ $user->designation}}</td>
                @endforeach
            </table>
            {{ $users->appends($_GET)->links() }} </p>   
        </div>
    </form>
  </body>
</html>