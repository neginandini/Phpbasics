<?php 

session_start();
$sid = $_SESSION['sid'];
$image = $_SESSION['image'];


if(empty($sid))
{
    header("location:login.php");
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

  <title>Dashboard</title>
</head>

<body>
  <?php include("nav.php") ?>
  <br>
  <div class="container-fluid">
    <h1>Welcome To Dashboard</h1>
    <section class="row ">
      <aside class="col-4"><?php include("sidebar.php")?> </aside>
      <aside class="col-8">


 <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Email</th>
                    <th scope="col">Uname</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">City</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>

            <?php
            $sel = mysqli_query($conn, "select * from users where email = '$sid' ");

           
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) {
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $arr['email'] ?></td>
                        <td><?php echo $arr['uname'] ?></td>
                        <td><?php echo $arr['age'] ?></td>
                        <td><?php echo $arr['gender'] ?></td>
                        <td><?php echo $arr['city'] ?></td>
                        <td><?php echo $arr['image'] ?></td>
                        

                    </tr>
                <?php
                    $sn++;
                }
             ?>


            

        </table>
        
        
        
        <?php

        switch(@$_GET['con'])
        {
          case 'edit' : include("edit.php");
          break; 
          case 'category' : include("category.php");
          break;
          case 'order' : include("order.php");
          break;
          case 'products' : include("products.php");
          break;
        }
         

        ?>

        
    </aside>
    </section>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>