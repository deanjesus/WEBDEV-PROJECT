<?php

session_start();

/* RECEIVE PRODUCT DATA */

$product_name =
$_POST['product_name'];

$product_price =
$_POST['product_price'];

$product_size =
$_POST['product_size'];

$quantity =
$_POST['quantity'];

/* CALCULATIONS */

$subtotal =
$product_price * $quantity;

$shipping_fee = 100;

$total =
$subtotal + $shipping_fee;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="styles.css"/>

  <title>Order Form | NICE PROPAGANDA</title>

</head>

<body>

  <!-- NAVIGATION -->

  <nav>

    <div class="nav__header">

      <div class="nav__logo">
        <a href="index.php">NICE PROPAGANDA</a>
      </div>

      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-line"></i>
      </div>

    </div>

   <ul class="nav__links" id="nav-links">

  <li>
    <a href="index.php">HOME</a>
  </li>

  <li>
    <a href="shop.php">SHOP</a>
  </li>

  <li>
    <a href="index.php#fashion">SALE</a>
  </li>

  <?php if (isset($_SESSION['fullname'])) : ?>

    <li class="welcome__user">

      <p>
        Welcome back,
        <?php echo $_SESSION['fullname']; ?>!
      </p>

      <a href="logout.php">
        <button class="btn">
          SIGN OUT
        </button>
      </a>

    </li>

  <?php else : ?>

    <li>
      <button class="btn" id="auth-btn">
        LOGIN / SIGN UP
      </button>
    </li>

  <?php endif; ?>

</ul>

  </nav>

  <!-- ORDER FORM -->

  <section class="section__container order__container">

    <h2 class="section__header">
      ORDER FORM
    </h2>

<form
  id="order-form"
  class="order__form"
  action="submit_order.php"
  method="POST"
>

<input
  type="hidden"
  name="product_name"
  value="<?php echo $product_name; ?>"
>

<input
  type="hidden"
  name="product_size"
  value="<?php echo $product_size; ?>"
>

<input
  type="hidden"
  name="quantity"
  value="<?php echo $quantity; ?>"
>

<input
  type="hidden"
  name="subtotal"
  value="<?php echo $subtotal; ?>"
>

<input
  type="hidden"
  name="shipping_fee"
  value="<?php echo $shipping_fee; ?>"
>

<input
  type="hidden"
  name="total"
  value="<?php echo $total; ?>"
>

<div class="input__group">
  <input
    type="text"
    name="fullname"
    placeholder="Full Name"
    required
  >
</div>

      <div class="input__group">
       <input
  type="text"
  name="fullname"
  placeholder="Full Name"
  required
>
      </div>

      <div class="input__group">
        <input
  type="email"
  name="email"
  placeholder="Email Address"
  required
>
      </div>

      <div class="input__group">
        <input
  type="text"
  name="address"
  placeholder="Home Address"
  required
>
      </div>

      <div class="input__group">
        <input
  type="tel"
  name="phone"
  placeholder="Phone Number"
  required
>
      </div>

      <!-- PAYMENT -->

      <div class="payment__section">

        <h4>Mode of Payment</h4>

       <select
  id="payment-method"
  name="payment_method"
  required
>
          <option value="">Select Payment Method</option>

          <option value="gcash">
            GCASH
          </option>

          <option value="card">
            Credit / Debit Card
          </option>

        </select>

      </div>

      <!-- GCASH -->

      <div
        class="input__group payment__details"
        id="gcash-field"
      >

      <input
  type="text"
  name="gcash_reference"
  placeholder="GCASH Reference Number"
>

      </div>

      <!-- CARD -->

      <div
        class="payment__details"
        id="card-field"
      >

        <div class="input__group">
          <input
  type="text"
  name="card_number"
  placeholder="Card Number"
>
        </div>

        <div class="input__group">
          <input
  type="text"
  name="card_holder"
  placeholder="Card Holder Name"
>
        </div>

        <div class="input__group">
          <input
  type="text"
  name="expiry_date"
  placeholder="Expiry Date"
>
        </div>

        <div class="input__group">
         <input
  type="text"
  name="cvv"
  placeholder="CVV"
>
        </div>

      </div>

      <!-- TOTALS -->

      <div class="order__summary">

  <p>
    Product:
    <?php echo $product_name; ?>
  </p>

  <p>
    Size:
    <?php echo $product_size; ?>
  </p>

  <p>
    Quantity:
    <?php echo $quantity; ?>
  </p>

  <p>
    Shirt Price:
    ₱<?php echo $product_price; ?>
  </p>

  <p>
    Subtotal:
    ₱<?php echo $subtotal; ?>
  </p>

  <p>
    Shipping Fee:
    ₱<?php echo $shipping_fee; ?>
  </p>

  <h3>
    Total:
    ₱<?php echo $total; ?>
  </h3>

</div>

      <button type="submit" class="btn order__btn">
        SUBMIT ORDER
      </button>

    </form>

  </section>

  <script>

  const paymentMethod =
    document.getElementById("payment-method");

  const gcashField =
    document.getElementById("gcash-field");

  const cardField =
    document.getElementById("card-field");

  /* HIDE EVERYTHING ON LOAD */

  gcashField.style.display = "none";
  cardField.style.display = "none";

  /* PAYMENT SWITCH */

  paymentMethod.addEventListener("change", () => {

    if (paymentMethod.value === "gcash") {

      gcashField.style.display = "block";
      cardField.style.display = "none";

    }

    else if (paymentMethod.value === "card") {

      gcashField.style.display = "none";
      cardField.style.display = "block";

    }

    else {

      gcashField.style.display = "none";
      cardField.style.display = "none";

    }

  });



</script>

</body>
</html>