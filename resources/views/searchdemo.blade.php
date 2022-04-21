<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <form class ="row g-3" action="{{url('/')}}/search" method="GET">
        {{ csrf_field() }}
    
    <br>
    {{-- <p>Type something to search the table for team, designation or emails:</p>   --}}
            <input  style="background-color:#e9e8d4;" class="form-control" id="search" type="text" placeholder="Search..">
            <button id="go">ok  GO</button>
            <br>
    <table class="table table-bordered table-striped">
        <thead>
          <tr style="background-color:#aa9cdf;">
            <td></td>
<td>ID</td>
<td>Email</td>
<td>Team</td>
<td>Designation</td>

<td>Edit</td>
</tr>
</thead>
<tbody id="myTable">
<tr>
    <td></td>
<td>abc@gmail.com</td>
<td>b</td>
<td>c</td>
<td>d</td>

<td>e</td>
</tr>
<tr>
    <td></td>
    <td>z</td>
    <td>y</td>
    <td>xyz@gmail.com</td>
    <td>w</td>
    
    <td>v</td>
    </tr>        

</tbody>
</table>
{{-- <p>{{ $users->links() }}</p> --}}

  <style>
      tr:hover {background-color: #cfb5b7;
    </style>
</body>
</html>