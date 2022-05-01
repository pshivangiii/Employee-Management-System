<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <form class ="row g-3" action="{{url('/')}}/employeeManagement" method="POST">
        {{ csrf_field() }} --}}
    
    <table class="table table-bordered table-striped">
        <thead>
         <tr style="background-color:#aa9cdf;">
            <th></th>
            <th>ID</th>
            <th>EMAIL</th>
            <th>TEAM</th>
            <th>DESIGNATION</th>
            <th>DELETE</th>
            
          </tr>
       </thead>
       <tbody id="myTable">
       @foreach($users as $key => $data)
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
    <br>
    <div>
    @foreach($users as $key => $data)
    {{-- <button><a href = '/employeeManagement/{{ $data->id }}'>NEXT</a></button> --}}
    <form action="/previous/{{ $data->id }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id">
        <button button style="background-color:#c8db5b;" type="submit">Previous</button>
    </form><br>
    <form action="/next/{{ $data->id }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id">
        <button button style="background-color:#f09797;" type="submit">NEXT</button>
    </form>
    @break
    @endforeach
</div>
    
</body>
</html>