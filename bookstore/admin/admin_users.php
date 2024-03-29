<?php

include '../DBConn.php';
include 'functions/admin.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `tbluser` WHERE user_id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

if(isset($_GET['deleteAdmin'])){
   $delete_id = $_GET['deleteAdmin'];
   mysqli_query($conn, "DELETE FROM `tbladmin` WHERE admin_id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

update_status();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `tbluser`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['studentnumber']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_role'] == 'student'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_role']; ?></span> </p>
         <p> status : <span><?php echo $fetch_users['user_status']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="user_id" value="<?php echo $fetch_users['user_id']; ?>">
            <select name="update_user">
               <option value="" selected disabled><?php echo $fetch_users['user_status']; ?></option>
               <option value="verified">verified</option>
               <option value="unverified">unverified</option>
            </select>
            <input type="submit" value="update" name="update_status" class="option-btn">
         <a href="admin_users.php?delete=<?php echo $fetch_users['user_id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
         </form>
      </div>
      <?php
         };
      ?>
   </div>
   <h1 class="title"> Admin accounts </h1>
   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `tbladmin`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['admin_id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['admin_email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['admin_role'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['admin_role']; ?></span> </p>
         <a href="admin_users.php?deleteAdmin=<?php echo $fetch_users['admin_id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>