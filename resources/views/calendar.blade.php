<!Doctype html>
<html>
    <head>
        <title>Calendar</title>
    </head>
    <body style="text-align:center;">  
    <form class ="row g-3" action="{{url('/')}}/attendancePortal" method="POST">
        {{ csrf_field() }}
        <h2 style="background-color:#90ee7d;">MARK YOUR ATTENDANCE</h2>
        <p style="background-color:#dfc28c;"> Number of working days this month : 21 </p>
        <p style="background-color:#d674c9;">{{date("d-m-Y")}} </p>
        
<table border = "1" class = "center">
    <tr style="background-color:#aa9cdf;">
        <td>MON</td>
        <td>TUE</td>
        <td>WED</td>
        <td>THUR</td>
        <td>FRI</td>
        <td>SAT</td>
        <td>SUN</td>
    </tr>
    @foreach($users as $key => $data)
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href = '/final/{{ $data->id }}'>1</a></td>
        <td style="background-color:rgb(202, 139, 139);">2</td>
        <td style="background-color:rgb(202, 139, 139);">3</td>
    </tr>
    <tr>
        <td><a href = '/final/{{ $data->id }}'>4</a></td>
        <td><a href = '/final/{{ $data->id }}'>5</a></td>
        <td><a href = '/final/{{ $data->id }}'>6</a></td>
        <td><a href = '/final/{{ $data->id }}'>7</a></td>
        <td><a href = '/final/{{ $data->id }}'>8</a></td>
        <td style="background-color:rgb(202, 139, 139);">9</td>
        <td style="background-color:rgb(202, 139, 139);">10</td>
    </tr>
    <tr>
        <td><a href = '/final/{{ $data->id }}'>11</a></td>
        <td><a href = '/final/{{ $data->id }}'>12</a></td>
        <td><a href = '/final/{{ $data->id }}'>13</a></td>
        <td><a href = '/final/{{ $data->id }}'>14</a></td>
        <td><a href = '/final/{{ $data->id }}'>15</a></td>
        <td style="background-color:rgb(202, 139, 139);">16</td>
        <td style="background-color:rgb(202, 139, 139);">17</td>
    </tr>
    <tr>
        <td><a href = '/final/{{ $data->id }}'>18</a></td>
        <td><a href = '/final/{{ $data->id }}'>19</a></td>
        <td><a href = '/final/{{ $data->id }}'>20</a></td>
        <td><a href = '/final/{{ $data->id }}'>21</a></td>
        <td><a href = '/final/{{ $data->id }}'>22</a></td>
        <td style="background-color:rgb(202, 139, 139);">23</td>
        <td style="background-color:rgb(202, 139, 139);">24</td>
    </tr>
    <tr>
        <td><a href = '/final/{{ $data->id }}'>25</a></td>
        <td><a href = '/final/{{ $data->id }}'>26</a></td>
        <td><a href = '/final/{{ $data->id }}'>27</a></td>
        <td><a href = '/final/{{ $data->id }}'>28</a></td>
        <td><a href = '/final/{{ $data->id }}'>29</a></td>
        <td style="background-color:rgb(202, 139, 139);">30</td>
        <td style="background-color:rgb(202, 139, 139);"></td>
    </tr>
    <style>
    table
    {
      border-collapse: collapse;
      width: 60%;
    }

    th, td 
    {
     padding: 8px;
     text-align: left;
     border-bottom: 1px solid #DDD;
    }   
    tr:hover
    {
       background-color: #D6EEEE;
    }
    .center 
    {
      margin-left: auto;
      margin-right: auto;
    }
    </style>
@endforeach
</table>
</body>
</html>