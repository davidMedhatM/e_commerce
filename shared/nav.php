<?php
session_start();
ob_start();

if (isset($_GET['logOut'])) {
  session_unset();
  session_destroy();
  header('location: /e_commerce/admins/login.php');
}
?>
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand shake shake-constant shake-slow shake-constant--hover" href="#">
  <img src="/e_commerce/css/img/davidLogo.png" width="50px" alt="">
    <?php
    if (isset($_SESSION['adminlogin'])) {
      echo $_SESSION['adminlogin'];
    } elseif (isset($_SESSION['customerlogin'])) {
      echo $_SESSION['customerlogin'];
    } else {
      echo 'welcome';
    }
    ?>
  </a>



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="/e_commerce/index.php"><img src="/e_commerce/css/img/apps.64280.14494019834309616.a59ce6b7-8a7c-48ee-8ab8-977eece71157.png" alt="" width="32"> <span class="sr-only">(current)</span></a>
      </li>
      <?php
      if (isset($_SESSION['adminlogin'])) {
        if ($_SESSION['adminaccess'] == 0) {
      ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
              admins
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/e_commerce/admins/add.php">add admin</a>
              <a class="dropdown-item" href="/e_commerce/admins/list.php">list admin</a>
            </div>
          </li>

      <?php
        } else {
        }
      } else {
      }

      ?>


      <?php
      if (isset($_SESSION['adminlogin'])) {
      ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/category/add.php">add category</a>
            <a class="dropdown-item" href="/e_commerce/category/list.php">list category</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            customers
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/customers/add.php">add customers</a>
            <a class="dropdown-item" href="/e_commerce/customers/list.php">list customers</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            feedback
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/feedback/add.php">add feedback</a>
            <a class="dropdown-item" href="/e_commerce/feedback/list.php">list feedback</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/products/add.php">add products</a>
            <a class="dropdown-item" href="/e_commerce/products/list.php">list products</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            orders
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!-- <a class="dropdown-item" href="/e_commerce/orders/add.php">add orders</a> -->
            <a class="dropdown-item" href="/e_commerce/orders/list.php">list orders</a>
          </div>
        </li>
      <?php       } else {
      } ?>

      <!-- /////////////////////////////////for customers////////////////////  -->
      <?php
      if (isset($_SESSION['customerlogin'])) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/forCustomers/category/list.php">list category</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/forCustomers/products/list.php">list products</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            feedback
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/e_commerce/forCustomers/feedback/add.php">add feedback</a>
          </div>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="/e_commerce/forCustomers/orders/list.php">my orders <span class="sr-only">(current)</span></a>
      </li>
      <?php }  ?>
        



    </ul>
  </div>
  <?php if ($_SESSION) : ?>
    <form>
      <button class="btn btn-danger hvr-icon-pulse-grow" name="logOut">log out <i class="fas fa-sign-out-alt hvr-icon"></i></button>
    </form>
  <?php else : ?>
    <a class="btn btn-outline-info my-2 my-sm-0 hvr-icon-pulse-grow" href="/e_commerce/admins/login.php" type="submit">login <i class="far fa-user-circle hvr-icon"></i></a>
  <?php endif; ?>

</nav>