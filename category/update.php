<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


if (isset($_GET['up'])) {
    $up = $_GET['up'];
    $select = "SELECT * FROM category WHERE id = $up";
    $getone = mysqli_query($conn, $select);
    $getone = mysqli_fetch_assoc($getone);



    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $imgName = $_FILES['image']['name'] . time();
        $imgtype = $_FILES['image']['type'];
        $imgTmp = $_FILES['image']['tmp_name'];


        if (empty($name) || empty($imgName)) {
            $mess = "try again";
        } else {
            $location = './images/';
            move_uploaded_file($imgTmp, $location . $imgName);
            $select = "UPDATE category SET name = '$name', img = '$imgName'  WHERE id = $up";
            mysqli_query($conn, $select);
            header('location: /e_commerce/category/list.php');
        }
    }
}
authAdmin();
?>



<div class="container">

    <form method="post" class="mt-4" enctype="multipart/form-data">
        <div class="m-3">

            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="name" class="form-control" value="<?php if (isset($getone['name'])) {
                                                                                echo $getone['name'];
                                                                            } ?>" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" class="form-control" value="<?php if (isset($getone['img'])) {
                                                                                echo $getone['img'];
                                                                            } ?>" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>

            <button name="send" class="btn btn-info btn-block hvr-wobble-skew">update</button>
        </div>
    </form>
</div>



<?php
include "../shared/footer.php";
?>