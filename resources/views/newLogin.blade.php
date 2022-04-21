<!-- LOGIN PAGE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
  </head>
  <body style="text-align:center;">
    <h1> LOGIN </h1>
    <form class ="row g-3" action="{{url('/')}}/newlogin" method="POST">
        {{ csrf_field() }}
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter email" name="email" required>
          <label for="password"><b>Password</b></label>
           <input type="password" placeholder="Enter Password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <div>
          <a href='/employee_details'><button type="submit">Login </button></a>
        </div>
    </form>
    <img src="https://i0.wp.com/ednep.com/wp-content/uploads/2020/06/Employee-Management-System.png?w=810&ssl=1" alt=" "  width="1000" height="400">   
  </body>
</html> 
