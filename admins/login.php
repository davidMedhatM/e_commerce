<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";

ob_start();

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = "SELECT * FROM admins WHERE name = '$name'";
    $row = mysqli_query($conn, $select);
    $numrow = mysqli_num_rows($row);
    if ($numrow > 0) {
        $rowgded = mysqli_fetch_assoc($row);
        if (password_verify($password, $rowgded['password'])) {
            $_SESSION['adminlogin'] = $name;
            $_SESSION['adminid'] = $rowgded['id'];
            $_SESSION['adminaccess'] = $rowgded['access'];

            header('location: /e_commerce/index.php');
        } else {
            $mess = "try again";
        }
    } else {
        $mess = "try again";
    }
}

?>
<div class="container">

    <div class="alert alert-warning">
        if you are a customer? please <a href="/e_commerce/forCustomers/logincustomer/login.php"><span class="badge badge-primary badge-pill">press here</span></a>
    </div>

    <form method="post" class="mt-5">
        <div class="m-4">
            <div class="d-flex justify-content-center">
                <img src="../css/img/log-in.png" alt="">
            </div>
            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="name" class="form-control">
                <?php if (isset($mess)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $mess; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" class="form-control">
                <?php if (isset($mess)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $mess; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>

            <button name="send" class="btn btn-info btn-block">login</button>
        </div>
    </form>

</div>



<?php
include "../shared/footer.php";
?>