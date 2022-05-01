<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD USER</title>
    <link rel = "stylesheet" href = "reg.css">
 </head>
 <body style="text-align:center;">  
  <style>
   body 
   {
    background-image: url('https://th.bing.com/th/id/OIP.q4Pqivgmmuh9iOaAkFqjpwHaEo?w=273&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
   }
  </style>
    <h3> ADD USER</h3>
    <form class ="row g-3" action="{{url('/')}}/userPortal" method="POST"> 
      {{ csrf_field() }}
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Email" name="email" id="email" required>
        <div>
        @php
          foreach ($errors->get('email') as $message) 
          {
            echo $message;
          }
        @endphp
        </div>
        <br>
          <label for=""><b>Team</b></label>
           <select name="team" id="team">
           <option value="Software Development">Software Development</option>
           <option value="HR">HR</option>
           <option value="Sales">Sales</option>
           <option value="Consultancy">Consultancy</option>
           </select>
          <br>
          <br>

          <label for=""><b>Designation</b></label>
          <select name="designation" id="designation">
          <option value="Manager">Manager</option>
          <option value="IC1">IC-1</option>
          <option value="IC2">IC-2</option>
          <option value="IC3">IC-3</option>
          </select>
          <br><br>
        <div>
        @php
          foreach ($errors->get('email') as $message) 
          {
            echo $message;
          }
        @endphp
        </div>
          <label for="password"><b>Dummy Password</b></label>
          <input type="password" placeholder="Enter Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <div>
        @php
          foreach ($errors->get('password') as $message) 
          {
              echo $message;
          }
        @endphp
        </div>
        <br>
          <label for="password-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Enter Password" id="password-repeat" name="password-repeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <div>
        @php
          foreach ($errors->get('password-repeat') as $message) 
          {
              echo $message;
          }
        @endphp
        </div>
        <br>
        <button type="submit" class="btn">ADD USER</button> 
        </div>
    </form>
 </body>
</html>
