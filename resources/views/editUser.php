<!DOCTYPE html>
<html>
 <head>
 <title>Student Management | Edit</title>
 </head>
 <body>
    <form action = "/edit/<?php echo $data[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table>
            <tr>
                <td>Email</td>
                <td>
                <input type = 'text' name = 'first_name'
                value = '<?php echo$data[0]->email; ?>'/> </td>
            </tr>
            <tr>
                <td>Team</td>
                <td>
                <input type = 'text' name = 'last_name'
                value = '<?php echo$data[0]->teams; ?>'/>
                </td>
            </tr>
            <tr>
                <td>Designation</td>
                <td>
                <input type = 'text' name = 'city_name'
                value = '<?php echo$data[0]->designation; ?>'/>
                </td>
            </tr>
            <tr>
                <td colspan = '2'>
                <input type = 'submit' value = "Update student" />
                </td>
            </tr>
        </table>
    </form>
 </body>
</html>