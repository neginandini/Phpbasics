<?php


include("connection.php");


if (isset($_POST['sub'])) 
{
    session_start();
    $old = $_POST['old'];
    $new = $_POST['new'];
    $cnew = $_POST['cnew'];

    $sid = $_SESSION['sid'];

   
    $sel = mysqli_query($conn, "select * from users where email = '$sid' ");
    $arr = mysqli_fetch_assoc($sel);

    $password = $arr['password'];
    
if($password == $old) 
    {
        if($new == $cnew)
        {
           if(mysqli_query($conn,"update users set password='$new' where email = '$sid' "))
           {
            header("location:login.php");
            }
            else {
            echo "Updating error";
            }
        }
        else{
            $errormsg="Password Doesn't match";
        }
    }
else{
        $errormsg="Enter Correct Old Password";
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

    <title>Change Password</title>
</head>

<body>
    <br>
    <div class="container">
        <h1>Change Password</h1>
        <br>
        <?php
        if (!empty($errormsg)) {
        ?>
            <div class="alert alert-danger"> <?php echo $errormsg; ?></div>
        <?php
        }
        ?>

        <form method="POST">
            <div class="form-group">
                <label><b>Old Password</b></label>
                <input type="password" class="form-control" placeholder="Enter old password" name="old">
            </div>
            <div class="form-group">
                <label><b>New Password</b></label>
                <input type="password" class="form-control" placeholder="Enter new password" name="new">
            </div>
            <div class="form-group">
                <label><b>Confirm New Password</b></label>
                <input type="password" class="form-control" placeholder="Enter confirm password" name="cnew">
            </div>

            <button type="submit" class="btn btn-info" name="sub" >Submit</button>
        </form>

    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>