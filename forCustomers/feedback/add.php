<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";


if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $customerid = $_POST['customerid'];


    if (empty($text)) {
        $mess = "try again";
    } else {
        $select = "INSERT INTO feedback( text , customerid) VALUES('$text', $customerid)";
        mysqli_query($conn, $select);
        header('location: /e_commerce/index.php');
    }
}
authcustomeronly()

?>



<div class="container">

    <form method="post" class="mt-4">
        <div class="m-3">
            <div class="form-group">
                <label for="">text</label>
                <input type="text" name="text" class="form-control" required minlength="3">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">customerid</label>
                <input type="text" required readonly name="customerid" class="form-control" value="<?php echo $_SESSION['customerid']; ?>">
            </div>

            <button name="send" class="btn btn-info btn-block hvr-wobble-skew">add</button>
        </div>
    </form>
</div>



<?php
include "../../shared/footer.php";
?>