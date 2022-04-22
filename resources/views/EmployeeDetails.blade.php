<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER DETAILS</title>
</head>
<body>
    <form class ="row g-3" action="{{url('/')}}/employee_details" method="POST">
        {{ csrf_field() }}

    <h1>USER DETAILS</H1>
        
    <tr>
      <td><a href = '/employee_details'>SHOW</a></td>
      <br>     
    </tr>
</form>
</body>
</html>