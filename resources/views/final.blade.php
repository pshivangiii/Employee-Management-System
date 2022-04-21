<!DOCTYPE html>
<html>
 <head>
 <title>Employee Details | Edit</title>
 </head>
 <body>
   <form action = "/final/<?php echo $users[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <table>
        <tr style="background-color:#99d388;">
            <td>Email</td>
            <td>
            <input type = 'text' name = 'email'
            value = '<?php echo$users[0]->email; ?>'/> </td>
        </tr>
        <tr  style="background-color:rgb(167, 104, 226);">
            <td>Password</td>
            <td>
            <input type = 'password' name = 'psw'
            value = '<?php echo$users[0]->password; ?>'/> </td>
        </tr>
        <tr style="background-color:rgb(221, 241, 103);">>
            <td>Team</td>
            <td>
            <input type = 'text' name = 'team'
            value = '<?php echo$users[0]->team; ?>'/>
            </td>
        </tr>
        <tr style="background-color:rgb(202, 139, 139);">
            <td>Attendance</td>
            <td>
            <input type = 'text' name = 'attendance'
            value = '<?php echo$users[0]->attendance; ?>'/>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan = '2'>
            <input type = 'submit' value = "Mark Attendance" />
            </td>
        </tr>
    </table>
   </form>
 </body>
</html>