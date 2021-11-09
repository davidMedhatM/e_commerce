<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";

if (isset($_POST['productid'])) {
    $productid = $_POST['productid'];
    $customerid = $_POST['customerid'];
    $nop = $_POST['nop'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];


    if (empty($productid) || empty($customerid) || empty($nop) || empty($price) || empty($cost)) {
        $mess = "try again";
    } else {
        if ($nop >= 1) {
            $select = "INSERT INTO orders(productid,customerid,nop,cost) VALUES($productid, $customerid,$nop,$cost)";
            mysqli_query($conn, $select);
            header('location: /e_commerce/forCustomers/products/list.php');
        } else {
            $mess = "try again";
        }
    }
}




authcustomer()
?>



<div class="container">

    <form method="post" class="mt-4">
        <div class="m-3">


            <div class="form-group">
                <label for="">customer id</label>
                <input name="customerid" type="text" value="<?php echo $_GET['customerid'] ?>" required readonly class="form-control" required>
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">product id</label>
                <input name="productid" type="text" value="<?php echo $_GET['buy'] ?>" required readonly class="form-control" required>
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">price</label>
                <input name="price" type="text" value="<?php echo $_GET['price'] ?>" required readonly class="form-control" id="price" required>
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">how many pieces do you need</label>
                <input name="nop" type="number" required class="form-control" id="nop" min="1">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>
            <div class="form-group">
                <label for="">cost</label>
                <input name="cost" type="text" required readonly class="form-control" id="cost">
            </div><?php if (isset($mess)) {
                        mess();
                    } ?>

            <button name="send" id="send" class="btn btn-info btn-block">add</button>
        </div>
    </form>
</div>



<?php
include "../../shared/footer.php";
?>