<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h2 style="color :rgb(11, 62, 173); ">YOUR PAY SLIP IS HERE </H2>
           
        <form class ="row g-3" action="{{url('/')}}/payroll_details" method="POST">
            {{ csrf_field() }}
            {{-- @foreach($users as $key => $data) --}}
            @php
            echo "Hi ";
            @endphp
            <b>{{$users->email}}</b>
            {{-- HR --}}
            @if (($users->team) == 'HR' && $users->designation == 'Manager')
            <br>
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>7000</td>
            <td>1000</td>
            <td>6000</td>  
            </tr> 
           </table>
                
            @elseif (($users->team) == 'HR' && $users->designation == 'IC3')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>5000</td>
            <td>1000</td>
            <td>4000</td>  
            </tr> 
           </table> 
        
           

            @elseif (($users->team) == 'HR' && $users->designation == 'IC2')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>4000</td>
            <td>1000</td>
            <td>3000</td>  
            </tr> 
           </table>
        
            
           @elseif (($users->team) == 'HR' && $users->designation == 'IC1')
            
           <table border = "1">
           <tr>
           <td>GROSS SALARY</td>
           <td>PF DEDUCTION</td>
           <td>IN HAND</td>
           
           </tr>

           <tr>
           <td>3000</td>
           <td>1000</td>
           <td>2000</td>  
           </tr> 
          </table>
            

            @elseif (($users->team) == 'Software Development' && $users->designation == 'Manager')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>9000</td>
            <td>1000</td>
            <td>8000</td>  
            </tr> 
           </table>

           @elseif (($users->team) == 'Software Development' && $users->designation == 'IC3')
            
           <table border = "1">
           <tr>
           <td>GROSS SALARY</td>
           <td>PF DEDUCTION</td>
           <td>IN HAND</td>
           
           </tr>

           <tr>
           <td>8000</td>
           <td>1000</td>
           <td>7000</td>  
           </tr> 
          </table>

          @elseif (($users->team) == 'Software Development' && $users->designation == 'IC2')
            
          <table border = "1">
          <tr>
          <td>GROSS SALARY</td>
          <td>PF DEDUCTION</td>
          <td>IN HAND</td>
          
          </tr>

          <tr>
          <td>7000</td>
          <td>1000</td>
          <td>6000</td>  
          </tr> 
         </table>

         @elseif (($users->team) == 'Software Development' && $users->designation == 'IC1')
            
         <table border = "1">
         <tr>
         <td>GROSS SALARY</td>
         <td>PF DEDUCTION</td>
         <td>IN HAND</td>
         
         </tr>

         <tr>
         <td>6000</td>
         <td>1000</td>
         <td>5000</td>  
         </tr> 
        </table>
        
        @elseif (($users->team) == 'Sales' && $users->designation == 'Manager')
            
        <table border = "1">
        <tr>
        <td>GROSS SALARY</td>
        <td>PF DEDUCTION</td>
        <td>IN HAND</td>
        
        </tr>

        <tr>
        <td>6000</td>
        <td>1000</td>
        <td>5000</td>  
        </tr> 
       </table>

            @elseif (($users->team) == 'Sales' && $users->designation == 'Manager')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>6000</td>
            <td>1000</td>
            <td>5000</td>  
            </tr> 
           </table>

           @elseif (($users->team) == 'Sales' && $users->designation == 'IC3')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>5000</td>
            <td>500</td>
            <td>4500</td>  
            </tr> 
           </table>

           @elseif (($users->team) == 'Sales' && $users->designation == 'IC2')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>5000</td>
            <td>1000</td>
            <td>4000</td>  
            </tr> 
           </table>

           @elseif (($users->team) == 'Sales' && $users->designation == 'IC1')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>4000</td>
            <td>1000</td>
            <td>3000</td>  
            </tr> 
           </table>
        

            @elseif (($users->team) == 'Consultancy' && $users->designation == 'Manager')
            
            <table border = "1">
            <tr>
            <td>GROSS SALARY</td>
            <td>PF DEDUCTION</td>
            <td>IN HAND</td>
            
            </tr>

            <tr>
            <td>6000</td>
            <td>1000</td>
            <td>5000</td>  
            </tr> 
            
           </table>

           @elseif (($users->team) == 'Consultancy' && $users->designation == 'IC3')
            
           <table border = "1">
           <tr>
           <td>GROSS SALARY</td>
           <td>PF DEDUCTION</td>
           <td>IN HAND</td>
           
           </tr>

           <tr>
           <td>5500</td>
           <td>1000</td>
           <td>4500</td>  
           </tr> 
           
          </table>

          @elseif (($users->team) == 'Consultancy' && $users->designation == 'IC2')
            
          <table border = "1">
          <tr>
          <td>GROSS SALARY</td>
          <td>PF DEDUCTION</td>
          <td>IN HAND</td>
          
          </tr>

          <tr>
          <td>5000</td>
          <td>1000</td>
          <td>4000</td>  
          </tr> 
         
        </table>
        
        @endif
            {{-- @endforeach --}}
            <img src="https://th.bing.com/th/id/R.3135edaf08e653b31a6afaf3883b1b64?rik=b80xpvyr14VY1A&riu=http%3a%2f%2fitsmyideas.com%2fwp-content%2fuploads%2f2013%2f05%2fbest-payroll-managment-system-in-world.jpg&ehk=7a6cTJ1AWIdUu2Xbjvh4dbcW5%2bGQk1OAwcBYgjACfG0%3d&risl=&pid=ImgRaw&r=0" alt=" "  width="1200" height="450">
</body>
</html>