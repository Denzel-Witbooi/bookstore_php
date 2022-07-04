<?php 

// ORDERS UPDATE AND DELETE
function update_order()
{
    global $conn;
    global $message;
    if(isset($_POST['update_order'])){

        $order_update_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];
        mysqli_query($conn, "UPDATE `tblorder` SET payment_status = '$update_payment' WHERE order_id = '$order_update_id'") or die('query failed');
        $message[] = 'payment status has been updated!';
     
     }
}
function delete_order()
{
    global $conn;
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM `tblorder` WHERE order_id = '$delete_id'") or die('query failed');
        header('location:admin_orders.php');
     }
}
// ORDERS END

// PRODUCTS (BOOKS) START
function add_product()
{
    global $conn;
    global $message;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
 
    $select_product_name = mysqli_query($conn, "SELECT name FROM `tblbook` WHERE name = '$name'") or die('query failed');
 
    if(mysqli_num_rows($select_product_name) > 0){
       $message[] = 'book already added';
    }else{
       $add_product_query = mysqli_query($conn, "INSERT INTO `tblbook`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed2');
 
       if($add_product_query){
          if($image_size > 2000000){
             $message[] = 'image size is too large';
          }else{
             move_uploaded_file($image_tmp_name, $image_folder);
             $message[] = 'book added successfully!';
          }
       }else{
          $message[] = 'book could not be added!';
       }
    }
}

function delete_product($delete_id)
{
    global $conn;
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `tblbook` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `tblbook` WHERE id = '$delete_id'") or die('query failed');
}

function update_product()
{
   global $conn;
   global $message;
   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `tblbook` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `tblbook` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');
}
// PRODUCTS END





?>