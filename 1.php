<?php

include("connection.php");

if (isset($_POST['sub'])) {

  $email = $_POST['email'];
  $uname = $_POST['uname'];
  $password = $_POST['password'];
  $gender = @$_POST['gender'];
  $age = $_POST['age'];
  $city = $_POST['city'];
  $tmp = $_FILES['image']['tmp_name'];

session_start();
$_SESSION['sid']=$email;
$_SESSION['pass']=$password;
$_SESSION['uname']=$uname;


  if (!empty($email) && !empty($uname) && !empty($password) && !empty($gender) && !empty($age) && !empty($city) && !empty($tmp)) {

    $fname = $_FILES['image']['name'];
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $fn = $fname ;
    if(mysqli_query($conn,"insert into users(email,uname,password,age,gender,city,image) values('$email','$uname','$password','$age','$gender','$city','$fn')"))
    {
      

      $_SESSION['image'] = $fn;
      

      if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
        if (is_dir("uploads/" . $email)) {
          $errormsg = "User Already Exist!!";
        } else {
          mkdir("uploads/" . $email);
          if (move_uploaded_file($tmp, "uploads/$email/$fn")) {
            header("location:welcome.php?uid=$email");
            
          } else {
            rmdir("uploads/$email");
            $errormsg = "Uploading Error";
          }
        }
      } else {
        $errormsg = "Only jpg and png and jpeg image supported";
      }
    }else{
      $errormsg = "Database Upload Error!";
    }
     
  } else {
    $errormsg = "Please Fill All Fields";
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

  <title>Registration Page</title>
</head>

<body>
  <div class="jumbotron">
    <h1 style="text-align: center;">Registration</h1>

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
        <input type="email" class="form-control" placeholder="Enter email" name="email">
      </div>

      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="uname">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      
      <div class="form-group">
        <label>Gender</label> &nbsp;
        <input type="radio" name="gender" value="male"> Male &nbsp; &nbsp; <input type="radio" name="gender" value="female"> Female
      </div>

      <div class="form-group">
        <label>Age</label>
        <input type="text" class="form-control" placeholder="Enter Age" name="age">
      </div>

      <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" placeholder="Enter City" name="city">
      </div>

      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
        
      </div>

  
      <br>
      <button type="submit" class="btn btn-info btn-lg" name="sub">Register</button> &nbsp; &nbsp; <button class="btn btn-warning btn-lg"><a href="login.php">Login</a></button>
    </form>
    <br><br>
  </main>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>