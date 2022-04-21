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
           
        <form class ="row g-3" action="<?php echo e(url('/')); ?>/search" method="POST">
            <?php echo e(csrf_field()); ?>

           
            <label for="search"><b>Search</b></label>
            <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Search" name="search" id="search" >
            <button type="submit" class="btn">GO</button>
</body>
</html>