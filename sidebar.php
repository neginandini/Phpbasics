<?php

include("connection.php");


$s = $_SESSION['sid'];
$image = $_SESSION['image'];



?>

</style>
<div class="list-group">
  <p class="list-group-item list-group-item-action">
    <?php echo "<img src='uploads/$image' alt='image' height=200px width=200px style='border-radius: 100px;' >"; ?>
  </p>
  <a href="?con=edit" class="list-group-item list-group-item-action">Edit Profile</a>
  <a href="?con=category" class="list-group-item list-group-item-action">Category</a>
  <a href="?con=products" class="list-group-item list-group-item-action">Products</a>
  <a href="?con=order" class="list-group-item list-group-item-action">Order</a>

</div>