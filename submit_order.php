<?php

session_start();

include "config.php";

/* USER */

$user_id =
$_SESSION['user_id'];

/* PRODUCT */

$product_name =
$_POST['product_name'];

$product_size =
$_POST['product_size'];

$quantity =
$_POST['quantity'];

$subtotal =
$_POST['subtotal'];

$shipping_fee =
$_POST['shipping_fee'];

$total =
$_POST['total'];

/* CUSTOMER */

$fullname =
$_POST['fullname'];

$email =
$_POST['email'];

$address =
$_POST['address'];

$phone =
$_POST['phone'];

/* PAYMENT */

$payment_method =
$_POST['payment_method'];

$gcash_reference =
$_POST['gcash_reference'] ?? '';

$card_number =
$_POST['card_number'] ?? '';

$card_holder =
$_POST['card_holder'] ?? '';

$expiry_date =
$_POST['expiry_date'] ?? '';

$cvv =
$_POST['cvv'] ?? '';

/* INSERT */

$sql = "INSERT INTO orders (

    user_id,
    product_name,
    product_size,
    quantity,
    subtotal,
    shipping_fee,
    total,
    fullname,
    email,
    address,
    phone,
    payment_method,
    gcash_reference,
    card_number,
    card_holder,
    expiry_date,
    cvv

) VALUES (

    '$user_id',
    '$product_name',
    '$product_size',
    '$quantity',
    '$subtotal',
    '$shipping_fee',
    '$total',
    '$fullname',
    '$email',
    '$address',
    '$phone',
    '$payment_method',
    '$gcash_reference',
    '$card_number',
    '$card_holder',
    '$expiry_date',
    '$cvv'

)";

/* RUN QUERY */

if (mysqli_query($conn, $sql)) {

    echo "
    <script>

    alert('Successful Order! We will contact you through email / number for your order.');

    window.location.href='index.php';

    </script>
    ";

} else {

    echo "Database Error: " . mysqli_error($conn);

}

?>