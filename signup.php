<?php
$user=0;
$s=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    
     $sql="select * from registration where username='$username'";
     $result=mysqli_query($con,$sql);
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          #  echo "Username already exists";
          $user=1;
          
        }else{
            $sql="insert into registration(username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
              $s=1;
               # header('Location:signup.php');
            }else{
                die(mysqli_error($result));
            }
        }
     }
    }


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Sign-up</title>
</head>

<body>
    <?php
if($user){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong>The username already exists!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}?>
<?php

if($s){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Congratulation!</strong>Sign-up Completed!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }


?>

    <h1 class="text-center my-5">Sign-Up</h1>
    <div class="container my-5">
        <form method="POST" action="signup.php">
            <div class="mb-3">
                <label class="form-label">UserName</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
   
</body>

</html>