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
        {{-- {{$data}} --}}
    
        
        <table border = "1">
            <tr>
            <td>ID</td>
            <td>Email</td>
            <td>Team</td>
            <td>Designation</td>
            </tr>
             @foreach ($data as $data) 
             <tr>
            <td>{{$data['id']}}</td>
            <td>{{ $data['email']}}</td>
            <td>{{ $data['team']}}</td>
            <td>{{ $data ['designation']}}</td>
            </tr> 
            @endforeach 
        </table>
</form>

</body>
</html>