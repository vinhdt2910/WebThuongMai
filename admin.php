<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản trị</title>
</head>
<body>

    Đây là trang quản trị
    <?php
    session_start();
    if (isset($_SESSION['name'])) 
    echo $_SESSION['name'] ;
    ?>
                      
</body>
</html>