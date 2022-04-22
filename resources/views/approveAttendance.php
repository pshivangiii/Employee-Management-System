<!DOCTYPE html>
<html>
    <head>
    <title>Approve Attendance</title>
    </head>
    <body>
      <form action = "/approve_attendance/<?php echo $users[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table>
            <tr style="background-color:rgb(207, 154, 138);">
              <td>Email</td>
              <td>
                <input type = 'text' name = 'email'
                value = '<?php echo$users[0]->email; ?>'/> </td>
            </tr>
            <tr style="background-color:rgb(157, 215, 248);">
              <td>Password</td>
              <td>
                <input type = 'password' name = 'psw'
                value = '<?php echo$users[0]->password; ?>'/> </td>
            </tr>
            <tr  style="background-color:rgb(167, 104, 226);">
              <td>Team</td>
              <td>
                <input type = 'text' name = 'team'
                value = '<?php echo$users[0]->team; ?>'/>
              </td>
            </tr>
            <tr style="background-color:rgb(221, 241, 103);">>
              <td>Designation</td>
              <td>
                <input type = 'text' name = 'designation'
                value = '<?php echo$users[0]->designation; ?>'/>
              </td>
            </tr>
            <tr>
            <tr style="background-color:rgb(202, 139, 139);">
              <td>Pending Attendance Requests</td>
              <td>
              <input type = 'text' name = 'attendance'
              value = '<?php echo$users[0]->pending_requests; ?>'/> </td>
            </tr>
            <tr style="background-color:#99d388;">
              <td>Attendance Requests To be Approved</td>
              <td>
              <input type = 'text' name = 'approved'
              value = '<?php echo$users[0]->approved_requests; ?>'/> </td>
            </tr>
            <tr>
              <td colspan = '2'><br>
              <input type = 'submit' value = "Update Details" />
              </td>
            </tr>
        </table>
      </form>
    </body>
</html>