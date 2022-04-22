<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT DETAILS</title>
    <link rel = "stylesheet" href = "reg.css">
</head>
<body>
    <h1> EDIT DETAILS </h1>
    <form class ="row g-3" action="{{url('/')}}/click" method="POST">
      
      {{ csrf_field() }}
      
        <div class="container">
          
          <p>Create an account.</p>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Email" name="email" id="email" >
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
           </select>
          <br><br>
         
         <div>
         @php
          foreach ($errors->get('email') as $message) {
            echo $message;
           }
           @endphp
          </div>
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" >
          <div>
           @php
            foreach ($errors->get('psw') as $message) {
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
          @foreach($data as $key => $data)
          <tr>
          <th></th>
            <td><a href = '/after_click/{{ $data->id }}'>Save</a></td>
            <br>        
          </tr>
      @endforeach
        </div>

    
      </form>

</body>
</html>
