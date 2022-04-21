<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER DETAILS</title>
</head>
<body>
    <form class ="row g-3" action="{{url('/')}}/search" method="POST">
        {{ csrf_field() }}

    <h3>SEARCH</H3>
        <div>
        <label for="search"><b>Search</b></label>
        <input type="text" placeholder="Enter Search" name="search" id="search" >
        <button id = "bt" type="submit" >SEARCH</button>
        </div>
{{-- 
     <br>
        <table border = "1">
        <tr>
        <td>ID</td>
        <td>Email</td>
        <td>Team</td>
        <td>Designation</td>
        </tr>
        @foreach ($users as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->team}}</td>
        <td>{{ $user->designation}}</td>
        
        {{-- <td><a href = 'edit/{{ $user->id }}'>Edit</a></td> --}}
        

    
</form>

</body>
</html>