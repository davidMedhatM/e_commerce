<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = "SELECT * FROM customers WHERE name = '$name'";
    $row = mysqli_query($conn, $select);
    $numrow = mysqli_num_rows($row);
    if ($numrow > 0) {
        $rowgded = mysqli_fetch_assoc($row);
        if (password_verify($password, $rowgded['password'])) {
            $_SESSION['customerlogin'] = $name;
            $_SESSION['customerid'] = $rowgded['id'];
            header('location: /e_commerce/index.php');
        }
    } else {
        $mess = "try again";
    }
}

if (isset($_POST['rname'])) {
    $rname = $_POST['rname'];
    $rphone = $_POST['rphone'];
    $rpassword = $_POST['rpassword'];

    $imgName = $_FILES['rimage']['name'] . time();
    $imgtype = $_FILES['rimage']['type'];
    $imgTmp = $_FILES['rimage']['tmp_name'];

    // $location = '/e_commerce/customers/images/';
    $location = '../../customers/images/';




    move_uploaded_file($imgTmp, $location . $imgName);

    $passwordhash = password_hash($rpassword, PASSWORD_BCRYPT);

    $select = "INSERT INTO customers(name, img, phone, password) VALUES('$rname', '$imgName', '$rphone', '$passwordhash')";
    mysqli_query($conn, $select);
    header('location: /e_commerce/forCustomers/logincustomer/login.php');
}

?>



<div class="container">

    <div class="alert alert-warning">
        if you are an admin? please <a href="/e_commerce/admins/login.php"><span class="badge badge-primary badge-pill hvr-pulse">press here</span></a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-md-5">


            <div class="d-flex justify-content-between mt-5 ">
                <button class="btn btn-outline-info  hvr-icon-bounce" id="btnlogin">login <i class="fas fa-sign-in-alt hvr-icon"></i></button>
                <button class="btn btn-outline-info hvr-icon-pulse-shrink" id="btnregistraton">registraton <i class="far fa-registered hvr-icon"></i></button>
            </div>

            <div id="logincustomer">
                <form method="post" class="" enctype="multipart/form-data">
                    <div class="m-4">
                        <div class="d-flex justify-content-center">
                            <img src="../../css/img/log-in.png" alt="" class="hvr-wobble-horizontal">
                        </div>

                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" name="name" class="form-control">
                        </div><?php if (isset($mess)) {
                                    mess();
                                } ?>

                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" name="password" class="form-control">
                        </div><?php if (isset($mess)) {
                                    mess();
                                } ?>


                        <button name="send" class="btn btn-info btn-block hvr-wobble-skew">login</button>
                    </div>
                </form>
            </div>

            <div id="registratonicustomer">
                <form method="post" class="" enctype="multipart/form-data">
                    <div class="m-3">

                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" name="rname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">phone</label>
                            <input type="tel" name="rphone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" name="rpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">image</label>
                            <input type="file" name="rimage" class="form-control">
                        </div>

                        <button name="rsend" class="btn btn-info btn-block hvr-wobble-skew">add</button>
                    </div>
                </form>
            </div>


        </div>
    </div>


</div>



<?php
include "../../shared/footer.php";
?>