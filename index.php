<?php
include "./shared/header.php";
include "./shared/nav.php";
include "./func/function.php";
authcustomer();
?>

<div class="container">
  <div class="row mt-5">



  <div class="col-md-6  d-flex animate__animated animate__backInRight">
      <div class="text-center  align-self-center">
        <h1 class="text-info display-3">welcome
          <?php
          if (isset($_SESSION['adminlogin'])) {
            echo $_SESSION['adminlogin'];
          } elseif (isset($_SESSION['customerlogin'])) {
            echo $_SESSION['customerlogin'];
          } else {
          }
          ?>
        </h1>
      </div>
  </div>

  <div class="col-md-6  animate__animated animate__backInLeft">
      <div class="text-center">
        <div>
          <img src="./css/img/davidLogo.png" alt="" width="90%">
        </div>

      </div>




    </div>

  </div>

</div>
</div>




<?php
include "./shared/footer.php";
?>