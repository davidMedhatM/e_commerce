<?php
include "./shared/header.php";
include "./shared/nav.php";
include "./func/function.php";
authcustomer();
?>


<h1 class="text-info display-2 text-center">welcome
  <?php
  if (isset($_SESSION['adminlogin'])) {
    echo $_SESSION['adminlogin'];
  } elseif (isset($_SESSION['customerlogin'])) {
    echo $_SESSION['customerlogin'];
  } else {
  }
  ?>





</h1>



<?php
include "./shared/footer.php";
?>