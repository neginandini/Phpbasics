<?php

include("connection.php");

if (isset($_POST['sub'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];


if (!empty($email) && !empty($pass)) {

    $sel = mysqli_query($conn,"select * from users where email = '$email' ");
    $arr = mysqli_fetch_assoc($sel);
 
    $password = $arr['password'];
    

      if($password == $pass) {

        session_start();
        $_SESSION['sid'] = $email;
        $_SESSION['pass'] = $pass;
        $_SESSION['image'] = $arr['image'];
        
        header("location:dashboard.php");

        

      } 
      else {
        $errormsg = "Wrong Password!";
      }
    } 
else {
      $errormsg = "Enter Email or Password!";
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>My Panel</title>


</head>

<body>
  <div class="jumbotron">
    <h1 style="text-align: center;">My Panel</h1>

  </div>
  <br>
  <main class="container" style="width: 70%;">
    <?php
    if (!empty($errormsg)) {
    ?>
      <div class="alert alert-danger"> <?php echo $errormsg; ?></div>
    <?php
    }
    ?>


    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" >
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" id="password">
      </div>
      <div class="form-group">
        <input type="checkbox" name="remember" id="check"> &nbsp; Remember me

      </div>


      <br>
      <button type="submit" class="btn btn-info btn-lg" name="sub">Login</button> &nbsp; &nbsp; <button class="btn btn-warning btn-lg"><a href="registeration.php">New User</a></button>
    </form>
  </main>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>