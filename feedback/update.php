<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";

if (isset($_GET['up'])) {
    $up = $_GET['up'];
    $select = "SELECT * FROM feedback WHERE id = $up";
    $getone = mysqli_query($conn, $select);
    $getone = mysqli_fetch_assoc($getone);


    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $customerid = $_POST['customerid'];


        if (empty($text)) {
            $mess = "try again";
        } else {
            $select = "UPDATE feedback SET text = '$text', customerid = '$customerid'  WHERE id = $up";
            mysqli_query($conn, $select);
            header('location: /e_commerce/feedback/list.php');
        }
    }
}
authAdmin();


?>



<div class="container">

    <form method="post" class="mt-4">
        <div class="m-3">

            <div class="form-group">
                <label for="">text</label>
                <input type="text" name="text" class="form-control" value="<?php if (isset($getone['text'])) {
                                                                                echo $getone['text'];
                                                                            } ?>" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">customerid</label>
                <select name="customerid" id="" class="form-control">
                    <?php
                    $select = "SELECT * FROM customers";
                    $getelement = mysqli_query($conn, $select);
                    foreach ($getelement as $data) {
                    ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button name="send" class="btn btn-info btn-block hvr-wobble-skew">update</button>
        </div>
    </form>
</div>



<?php
include "../shared/footer.php";
?>