<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $imgName = $_FILES['image']['name'] . time();
    $imgtype = $_FILES['image']['type'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $location = './images/';




    if (empty($name) || empty($phone) || empty($password) || empty($imgName)) {
        $mess = "try again";
    } else {
        move_uploaded_file($imgTmp, $location . $imgName);

        $passwordhash = password_hash($password, PASSWORD_BCRYPT);

        $select = "INSERT INTO customers(name, img, phone, password) VALUES('$name', '$imgName', '$phone', '$passwordhash')";
        mysqli_query($conn, $select);
        header('location: /e_commerce/customers/list.php');
    }
}



authAdmin();

?>



<div class="container">

    <form method="post" class="mt-4" enctype="multipart/form-data">
        <div class="m-3">

            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="name" class="form-control" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">phone</label>
                <input type="tel" name="phone" class="form-control" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" class="form-control" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" class="form-control" required>
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>

            <button name="send" class="btn btn-info btn-block hvr-wobble-skew">add</button>
        </div>
    </form>
</div>



<?php
include "../shared/footer.php";
?>