<?php

include 'DBConn.php';
include 'functions/contact.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){
   send_admin_message($user_id);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

  

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- <div class="heading">
   <h3>contact us</h3>
   
</div> -->

<section class="contact">
   <div class="container">
      <span class="big-circle"></span>
      <div class="form">

         <div class="contact-info">
            <h3 class="title">Let's get in touch</h3>
            <p class="text" style="font-size: x-large">
            Have any questions or queries? We love chatting to our customers. 
            Complete the form on the right and we’ll get back to you.
            </p>

            <div class="info">
               <div class="information">
               <img src="img/location.png" class="icon" alt="" />
               <p>11 Riverview Park,
                  Janadel Avenue,
                  Midrand</p>
               </div>
               <div class="information">
               <img src="img/email.png" class="icon" alt="" />
               <p>+27 66 090 2357</p>
               </div>
               <div class="information">
               <img src="img/phone.png" class="icon" alt="" />
               <p>ksmith@college.co.za</p>
               </div>

            </div>
               
               

         </div>
         <div class="contact-form">
               <span class="circle one"></span>
               <span class="circle two"></span>

            <form action="" method="post">
                        <h3>say something!</h3>

                        <div class="input-container">
                        <input type="text" name="name" required placeholder="enter your name" class="box">
                        </div>

                        <div class="input-container">
                        <input type="email" name="email" required placeholder="enter your email" class="box">
                        </div>

                        <div class="input-container">
                        <input type="number" name="number" required placeholder="enter your number" class="box">
                        </div>

                        <div class="input-container">
                        <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                        <input type="submit" value="send message" name="send" class="btn">
                        </div>
                     </form>
         
         </div>
      </div>

   </div>
   
</section>



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>