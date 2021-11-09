<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";

if (isset($_GET['up'])) {
    $up = $_GET['up'];
    $select = "SELECT * FROM products WHERE id = $up";
    $getone = mysqli_query($conn, $select);
    $getone = mysqli_fetch_assoc($getone);



    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $categoryid = $_POST['categoryid'];
        $description = $_POST['description'];
        $price = $_POST['price'];


        $imgName = $_FILES['image']['name'] . time();
        $imgtype = $_FILES['image']['type'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $location = './images/';

        if (empty($name) || empty($description) || empty($price) || empty($imgName)) {
            $mess = "try again";
        } else {
            if ($price >= 1) {
                move_uploaded_file($imgTmp, $location . $imgName);
                $select = "UPDATE products SET name = '$name', img = '$imgName', categoryid = '$categoryid', description= '$description', price = $price  WHERE id = $up";
                mysqli_query($conn, $select);
                header('location: /e_commerce/products/list.php');
            } else {
                $mess = "try again";
            }
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
                <label for="">description</label>
                <input type="text" name="description" class="form-control" value="<?php if (isset($getone['description'])) {
                                                                                        echo $getone['description'];
                                                                                    } ?>" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">price</label>
                <input type="number" name="price" class="form-control" value="<?php if (isset($getone['price'])) {
                                                                                    echo $getone['price'];
                                                                                } ?>" required min="1">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">categoryid</label>
                <select name="categoryid" id="" class="form-control">
                    <?php
                    $select = "SELECT * FROM category";
                    $getelement = mysqli_query($conn, $select);
                    foreach ($getelement as $data) {
                    ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" class="form-control" required>
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>

            <button name="send" class="btn btn-info btn-block">add</button>
        </div>
    </form>
</div>



<?php
include "../shared/footer.php";
?>