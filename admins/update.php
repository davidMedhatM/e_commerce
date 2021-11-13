<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";

if (isset($_GET['up'])) {
    $up = $_GET['up'];
    $select = "SELECT * FROM admins WHERE id = $up";
    $getone = mysqli_query($conn, $select);
    $getone = mysqli_fetch_assoc($getone);


    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $access = $_POST['access'];

        // $select = "INSERT INTO admins(name , password) VALUES('$name', '$password')";

        if (empty($name) || empty($name) || empty($name)) {
            $mess = "try again";
        } else {
            $select = "UPDATE admins SET name = '$name', password = '$password',access = $access  WHERE id = $up";
            mysqli_query($conn, $select);
            header('location: /e_commerce/admins/list.php');
        }
    }
}
authAdminAccess();


?>



<div class="container">

    <form method="post" class="mt-4">
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
                <label for="">password</label>
                <input type="password" name="password" class="form-control" value="<?php if (isset($getone['password'])) {
                                                                                        echo $getone['password'];
                                                                                    } ?>" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">access</label>
                <select name="access" id="" class="form-control">
                    <option value="0">all access</option>
                    <option value="1">semi access</option>
                </select>
            </div>

            <button name="send" class="btn btn-info btn-block hvr-wobble-skew">update</button>
        </div>
    </form>
</div>



<?php
include "../shared/footer.php";
?>