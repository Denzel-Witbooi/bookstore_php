<?php 

// ADMIN
function admin_login()
{
   global $conn;
   global $message;
   if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
 
    $select_admins = mysqli_query($conn, "SELECT * FROM `tbladmin` WHERE admin_email = '$email' AND admin_password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_admins) > 0){
 
       $row = mysqli_fetch_assoc($select_admins);
 
       if($row['admin_role'] == 'admin'){
 
          $_SESSION['admin_username'] = $row['username'];
          $_SESSION['admin_email'] = $row['admin_email'];
          $_SESSION['admin_id'] = $row['admin_id'];
          header('location: admin_page.php');
 
       }elseif($row['admin_role'] == 'pending'){
 
         $message[] = 'user does not exist or is yet to be verified!';
       }
 
    }else{
       $message[] = 'incorrect email or password!';
    }
 
 }
}

function admin_register()
{
   global $conn;
   global $message;
   if(isset($_POST['submit'])){

       $admin_username = mysqli_real_escape_string($conn, $_POST['name']);
       $admin_email = mysqli_real_escape_string($conn, $_POST['email']);
       $admin_password = mysqli_real_escape_string($conn, md5($_POST['password']));
       $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
       $user_type = $_POST['user_type'];
       $select_admins = mysqli_query($conn, "SELECT * FROM `tbladmin` WHERE admin_email = '$admin_email' AND admin_password = '$admin_password'") or die('query failed');
    
       if(mysqli_num_rows($select_admins) > 0){
          $message[] = 'user already exist!';
       }else{
          if($admin_password != $cpass){
             $message[] = 'confirm password not matched!';
          }else{
             mysqli_query($conn, "INSERT INTO `tbladmin`(username, admin_email, admin_password, admin_role) VALUES('$admin_username', '$admin_email', '$cpass', '$user_type')") or die('query failed2');
             $message[] = 'registered successfully!';
          }
       }
    
    }
}

?>