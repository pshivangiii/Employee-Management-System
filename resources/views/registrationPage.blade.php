<!--REGISTRATION PAGE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
  </head>
  <body style="text-align:center;">  
    <h1> REGISTRATION FORM </h1>
    <form class ="row g-3" action="{{url('/')}}/r" method="POST">
       {{ csrf_field() }}
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text"  placeholder="Enter Email" name="email" id="email" >
         <div>
         @php
          foreach ($errors->get('email') as $message) {
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
           <option value="Admin">Admin</option>
           </select>
          <br><br>
         <div>
         @php
          foreach ($errors->get('psw') as $message) {
            echo $message;
           }
           @endphp
          </div>
          <label for="psw"><b>Password</b></label>
          {{-- <input type="password" placeholder="Enter Password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> --}}
          <input type="password" placeholder="Enter Password" name="psw" id="psw" >
          <div>
           
           @php
            foreach ($errors->get('password') as $message) {
              echo $message;
             }
             @endphp 
            </div>
            <br>
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" >
          <div>
           @php
            foreach ($errors->get('psw-repeat') as $message) {
              echo $message;
             }
             @endphp
            </div>
          <br>
          <button type="submit" class="registerbtn">REGISTER</button>
        </div>
    </form>
      <img src="https://th.bing.com/th/id/R.58d5d1ea372f46397041d43bfbc52d48?rik=d2AxDLCa8E945w&riu=http%3a%2f%2f4.bp.blogspot.com%2f-qhglf124V_8%2fUQpvkdxXNRI%2fAAAAAAAABXI%2f0JUyFAhi6kM%2fs1600%2femployee-Management-System.jpg&ehk=Mp%2bbF1NMC4UAc2o%2bBnzZSeVIDrUPjydLVubc5UPFw%2bQ%3d&risl=&pid=ImgRaw&r=0" alt=" "  width="1000" height="280">
</body>
</html>
