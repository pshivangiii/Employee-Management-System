<!-- LOGIN PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    @push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endpush
</head>
<body style="text-align:center;">  
  {{-- background=
"https://th.bing.com/th/id/OIP.IhZPj3eMaK-OsCYcb8UTSgHaE7?w=284&h=189&c=7&r=0&o=5&dpr=1.5&pid=1.7"> --}}
    <h1> LOGIN </h1>
    <form class ="row g-3" action="{{url('/')}}/login" method="POST">
        {{ csrf_field() }}
       
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Username" name="uname" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
          <a href='/employee_details'><button type="submit">Login </button></a>
          {{-- <a href = '/employee_details/{{ }}'>LOGIN</a> --}}
         
          <!-- <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label> -->
        </div>
      
        {{-- <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="editbtn"><a href="edit.html">Change Password</a></button>
          <!-- <span class="psw">Forgot <a href="edit.html">password?</a></span> -->
        </div> --}}
        
       </form>
       
        <img src="https://i0.wp.com/ednep.com/wp-content/uploads/2020/06/Employee-Management-System.png?w=810&ssl=1" alt=" "  width="1000" height="400">
      
</body>
</html> 