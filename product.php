<?php
session_start();
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

  <title>Classic Tee | NICE PROPAGANDA</title>

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
      <a href="#fashion">SALE</a>
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

  <!-- PRODUCT PAGE -->

  <section class="section__container product__container">

    <div class="product__image">

  <div class="product__slider">

    <!-- LEFT BUTTON -->

    <button class="slider__btn left" id="prevBtn">
      <i class="ri-arrow-left-s-line"></i>
    </button>

    <!-- IMAGES -->

    <img
      src="assets/classictee.jpg"
      class="product__slide active"
      alt="product"
    >

    <img
      src="assets/classictees.jpg"
      class="product__slide"
      alt="product"
    >

    <img
      src="assets/sizechart.jpg"
      class="product__slide"
      alt="product"
    >

    <!-- RIGHT BUTTON -->

    <button class="slider__btn right" id="nextBtn">
      <i class="ri-arrow-right-s-line"></i>
    </button>

  </div>

</div>

    <div class="product__details">

      <h2>Classic Tee</h2>

      <h3>₱650</h3>

      <p>
        Premium oversized tee built for everyday streetwear styling.
      </p>

      <!-- SIZES -->

      <div class="size__buttons">

  <button type="button" class="size-btn">S</button>

  <button type="button" class="size-btn">M</button>

  <button type="button" class="size-btn">L</button>

  <button type="button" class="size-btn">XL</button>

</div>

      <!-- QUANTITY -->

      <div class="quantity__section">

        <h4>Quantity</h4>

      <input
  type="number"
  value="1"
  min="1"
  max="10"
  id="quantity-input"
>

      </div>

     <!-- BUY -->

<form action="order.php" method="POST">

  <!-- PRODUCT NAME -->

  <input
    type="hidden"
    name="product_name"
    value="Classic Tee"
  >

  <!-- PRODUCT PRICE -->

  <input
    type="hidden"
    name="product_price"
    value="650"
  >

  <!-- SIZE -->

  <input
    type="hidden"
    name="product_size"
    id="selected-size"
    required
  >

  <!-- QUANTITY -->

  <input
    type="hidden"
    name="quantity"
    id="selected-quantity"
  >

  <button
    type="submit"
    class="btn product__btn"
  >
    BUY NOW
  </button>

</form>

    </div>

  </section>
<script>

  const slides =
    document.querySelectorAll(".product__slide");

  const prevBtn =
    document.getElementById("prevBtn");

  const nextBtn =
    document.getElementById("nextBtn");

  let currentSlide = 0;

  function showSlide(index) {

    slides.forEach((slide) => {
      slide.classList.remove("active");
    });

    slides[index].classList.add("active");

  }

  nextBtn.addEventListener("click", () => {

    currentSlide++;

    if (currentSlide >= slides.length) {
      currentSlide = 0;
    }

    showSlide(currentSlide);

  });

  prevBtn.addEventListener("click", () => {

    currentSlide--;

    if (currentSlide < 0) {
      currentSlide = slides.length - 1;
    }

    showSlide(currentSlide);

  });

</script>

<script>

const sizeButtons =
  document.querySelectorAll(".size-btn");

const selectedSize =
  document.getElementById("selected-size");

sizeButtons.forEach((button) => {

  button.addEventListener("click", () => {

    sizeButtons.forEach((btn) => {
      btn.classList.remove("active");
    });

    button.classList.add("active");

    selectedSize.value =
      button.textContent;

  });

});

</script>

<script>

const quantityInput =
  document.getElementById("quantity-input");

const selectedQuantity =
  document.getElementById("selected-quantity");

/* DEFAULT */

selectedQuantity.value =
quantityInput.value;

/* VALIDATION */

quantityInput.addEventListener("input", () => {

  if (quantityInput.value > 10) {

    alert(
      "Only 10 items maximum can be ordered."
    );

    quantityInput.value = 10;

  }

  if (quantityInput.value < 1) {

    quantityInput.value = 1;

  }

  selectedQuantity.value =
    quantityInput.value;

});

</script>

<script src="main.js"></script>

</body>
</html>