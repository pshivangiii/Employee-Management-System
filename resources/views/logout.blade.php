<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGOUT</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <form class ="row g-3" action="{{url('/')}}/logout" method="POST">
            {{ csrf_field() }}
            <H3>ARE YOU SURE YOU WANT TO LOGOUT?</H3>
            <button type="submit"> LOGOUT </button>
        </form>
    </body>
</html> 
