<?php

$sid = $_SESSION['sid'];
$sel = mysqli_query($conn, "select * from users where email = '$sid' ");
$arr = mysqli_fetch_assoc($sel);

 if(isset($_POST['sub']))
 {
     $email = $_POST['email'];
     $uname = $_POST['uname'];
     $age = $_POST['age'];
     $city = $_POST['city'];
     $gender = @$_POST['gender'];
     $tmp = $_FILES['image']['tmp_name'];
     $fname = $_FILES['image']['name'];
     $fn = $fname ;

    // if(mysqli_query($conn,"update users set email='$email', uname='$uname',age='$age',city='$city',gender='$gender',image='$fn' where email='$sid' "))
    // {
    //     // header("location:dashboard.php");
    //     echo "Updated!";
    // }
    // else
    // {
    //     echo "Updating error!";
    // }

//     echo $sid."<br>"; 
//    echo $uname."<br>";
//    echo $age."<br>";
//    echo $gender."<br>";
//    echo $city."<br>";
//    echo $fn."<br>";
   $a= $arr['id'];
//    echo $a."<br>";


    if(mysqli_query($conn,"Update users set  uname='$uname', age='$age' , city='$city' , image='$fn' , gender='$gender'  where id='$a' "))
    {
        //  echo "updated";
        $ext = pathinfo($fname, PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {

            if (move_uploaded_file($tmp, "uploads/$fn")) {
              header("location:dashboard.php");
              
           } 
        } else {
          $errormsg = "Only jpg and png and jpeg image supported";
        }
        
        $_SESSION['image'] = $fn;
    }
    else
    {
        echo "Updating error!";
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

    <title>Add Employee</title>
</head>

<body>
    <br>
    <br>

    <div class="container">
        <h1>Edit Deatils</h1>
        <br>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $arr['email']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="uname" value="<?php echo $arr['uname']; ?>" >
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter Age" name="age" value="<?php echo $arr['age']; ?>">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $arr['city']; ?>">
            </div>

            <div class="form-group">

                <label>Gender</label>&nbsp; &nbsp;
                <input type="radio" name="gender" value="male" <?php if($arr['gender']=="male"){ echo "checked";}?>/> Male 
                &nbsp; 
                <input type="radio" name="gender" value="female" <?php if($arr['gender']=="female"){ echo "checked";}?>/> Female

            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image" value="<?php echo $arr['image']; ?>" >

            </div>



            <button type="submit" class="btn btn-primary" name="sub">Update </button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
