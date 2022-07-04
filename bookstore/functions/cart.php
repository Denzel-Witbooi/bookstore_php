<?php 
function update_cart($cart_id)
{
    global $conn;
    global $message;
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
}

function delete_cart($delete_id)
{
   global $conn;
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

function delete_all_cart($user_id)
{   
    global $conn;
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
}

function add_to_cart($user_id)
{
    global $conn;
    global $message;
    if(isset($_POST['add_to_cart'])){

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
     
        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
     
        if(mysqli_num_rows($check_cart_numbers) > 0){
           $message[] = 'already added to cart!';
        }else{
           mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
           $message[] = 'product added to cart!';
        }
     
     };
}

?>