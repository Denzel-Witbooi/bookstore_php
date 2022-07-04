<?php

include '../DBConn.php';
include 'functions/admin.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Dashboard_style.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>BookHub</h1>
        </div>
        <ul>
            <li><a href="admin_page.php"img src="images/dashboard (2).png" alt="">&nbsp; <span>Dashboard</span> </li>
            <li><a href="admin_products.php"img src="teacher2.png" alt="">&nbsp;<span>products</span> </li>
            <li><a href="admin_users.php"img src="school.png" alt="">&nbsp;<span>users</span> </li>
            <li><a href="admin_contacts.php" img src="payment.png" alt="">&nbsp;<span>Messages</span> </li>
            <li><a href="admin_orders.php" img src="payment.png" alt="">&nbsp;<span>Orders</span> </li>
            
            
        </ul>
    </div>
    <div class="container">
        <div class="header">

        </div>
        <div class="content">
            <div class="cards">

                <div class="card">
                    <div class="box">
                    <?php
               $total_completed = 0;
               $select_completed = mysqli_query($conn, "SELECT total_price FROM `tblorder` WHERE payment_status = 'completed'") or die('query failed');
               if(mysqli_num_rows($select_completed) > 0){
                  while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                     $total_price = $fetch_completed['total_price'];
                     $total_completed += $total_price;
                  };
               };
            ?>
            <h1>R<?php echo $total_completed; ?>.00</h1>
            <h3>completed payments</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <?php
                            $total_pendings = 0;
                            $select_pending = mysqli_query($conn, "SELECT total_price FROM `tblorder` WHERE payment_status = 'pending'") or die('query failed');
                            if(mysqli_num_rows($select_pending) > 0){
                            while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                                $total_price = $fetch_pendings['total_price'];
                                $total_pendings += $total_price;
                            };
                            };
                        ?>
                        <h1>R<?php echo $total_pendings; ?>.00</h1>
                        <h3>total pendings</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                
                <div class="card">
                    <div class="box">
                        <?php 
                            $select_orders = mysqli_query($conn, "SELECT * FROM `tblorder`") or die('query failed');
                            $number_of_orders = mysqli_num_rows($select_orders);
                        ?>
                            <h1><?php echo $number_of_orders; ?></h1>
                            <h3>order placed</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <?php 
                            $select_products = mysqli_query($conn, "SELECT * FROM `tblbook`") or die('query failed');
                            $number_of_products = mysqli_num_rows($select_products);
                        ?>
                            <h1><?php echo $number_of_products; ?></h1>
                            <h3>products added</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <?php 
                            $select_users = mysqli_query($conn, "SELECT * FROM `tbluser` WHERE user_role = 'student'") or die('query failed');
                            $number_of_users = mysqli_num_rows($select_users);
                        ?>
                            <h1><?php echo $number_of_users; ?></h1>
                            <h3>Student users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <?php 
                            $select_admins = mysqli_query($conn, "SELECT * FROM `tbladmin` WHERE admin_role = 'admin'") or die('query failed');
                            $number_of_admins = mysqli_num_rows($select_admins);
                         ?>
                            <h1><?php echo $number_of_admins; ?></h1>
                            <h3>admin users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <?php 
                            $select_account = mysqli_query($conn, "SELECT * FROM `tbluser`" ) or die('query failed');
                            $number_of_account = mysqli_num_rows($select_account);
                        ?>
                            <h1><?php echo $number_of_account; ?></h1>
                            <h3>total students</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <?php 
                            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                            $number_of_messages = mysqli_num_rows($select_messages);
                        ?>
                            <h1><?php echo $number_of_messages; ?></h1>
                            <h3>new messages</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Orders</h2>
                        <a href="admin_orders.php" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>user id</th>
                            <th>Name</th>
                            <th>Amount</th>
                            
                        </tr>
                        <?php
                            $select_orders = mysqli_query($conn, "SELECT * FROM `tblorder`") or die('query failed');
                            if(mysqli_num_rows($select_orders) > 0){
                                while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                            ?>
                        <tr>
                            <td><?php echo $fetch_orders['user_id']; ?></td>
                            <td><?php echo  $fetch_orders['name']; ?></td>
                            <td>R<?php echo  $fetch_orders['total_price']; ?>.00</td>
                            
                        </tr>
                        <?php
                        }
                        }else{
                            echo '<p class="empty">no orders placed yet!</p>';
                        }
                    ?>
                    </table>
                    
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                       
                    </div>
                    <table>
                        <tr>
                            <th>icon </th>
                            <th>User ID </th>
                            <th>Name</th>
                        </tr>
                        <?php
                            $select_users = mysqli_query($conn, "SELECT * FROM `tbluser` WHERE user_role ='student'") or die('query failed');
                            if(mysqli_num_rows($select_users) > 0){
                                while($fetch_users = mysqli_fetch_assoc($select_users)){
                            ?>
                        
                            <tr>
                                <td><img src="images/user.png" alt=""></td>
                                <td><?php echo $fetch_users['user_id']; ?></td>
                                <td><?php echo  $fetch_users['username']; ?></td>
                                
                                
                            </tr>

                            <?php
                        }
                        }else{
                            echo '<p class="empty">no orders placed yet!</p>';
                        }
                    ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>