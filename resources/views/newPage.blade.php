<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class ="row g-3" action="{{url('/')}}/team_deatils" method="POST">
        {{ csrf_field() }}
    <div class="container">
        @foreach ($users as $user)
            <h1>{{ $user->email }}</h1>
        @endforeach
    </div>
</form>
</body>
</html>