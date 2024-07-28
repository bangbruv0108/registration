<?php
 session_start();

 if(!isset($_SESSION['USERNAME'])){
    header('Location:login.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Welcome <?php echo $_SESSION['USERNAME'];?></h1>
    
</body>
</html>