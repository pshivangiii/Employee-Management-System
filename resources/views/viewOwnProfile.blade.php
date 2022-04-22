<!Doctype html>
<html>
  <head>
    <title>View Own Profile</title>
  </head>
  <body>
    <h1 style="color :rgb(103, 39, 146); "><u> Profile Details </u></h1>
    <table class="table table-bordered table-striped">
      @foreach($users as $users)
      <tr style="background-color:#d6e69d;">
        <td>Email</td>
        <td>{{ $users->email}}</td>
      </tr>
      <tr style="background-color:#aabcee;">
        <td>Team</td>
        <td>{{ $users->team }}</td>
      </tr>
      <tr style="background-color:#ca9497;">
        <td>Designation</td>
        <td>{{ $users->designation }}</td>
      </tr>
      <tr style="background-color:#9d8af1;">
        <td>EDIT</td>
        <td><a href = '/ownprofile/own/{{ $users->email}}'>Edit</a></td>
      </tr>
    </table>
      @endforeach
      <style>
      table
        {
         border-collapse: collapse;
         width: 60%;  
        }
</style>
</body>
</html>