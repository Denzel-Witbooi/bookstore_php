<?php

include 'DBConn.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>

</div>

<section class="about">

   <div class="flex">

      <div class="image">
      <img src="images/choice.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Bookhub is a player in the school book industry, providing 
            textbooks and other learner support materials to schools in 
            large quantities as well as to students directly through our 
            network of bookshops.</p>
         <p>Not only do we provide textboooks for students,hand picked from
            other students,we also allow students to sell old textbooks. 
            This can help students get rid of unneccesary textbooks whilst
            and earn a small source of income</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>