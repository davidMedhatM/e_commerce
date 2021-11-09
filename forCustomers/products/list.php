<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";



if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $select = "SELECT products.id,products.name proname,products.price,products.description, products.img, category.name catname FROM products JOIN category ON products.categoryid = category.id where categoryid = $search";
    $getelement = mysqli_query($conn, $select);
}

if (isset($_GET['clicked'])) {
    $search = $_GET['search'];
    header("location: /e_commerce/forCustomers/products/list.php?search=$search");
}
if (!isset($_GET['search'])) {
    $select = "SELECT products.id,products.name proname, products.price,products.description, products.img, category.name catname FROM products JOIN category ON products.categoryid = category.id;";
    $getelement = mysqli_query($conn, $select);
}

$select_2 = "SELECT * FROM category";
$getelement_2 = mysqli_query($conn, $select_2);

authcustomer();

?>

<div class="container-flid">
    <form class="form-group form-inline">
        <!-- <input type="text" class="form-control" width="80%"> -->
        <select name="search" id="" class="form-control">
            <?php foreach ($getelement_2 as $s) { ?>
                <option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>
            <?php } ?>
        </select>
        <button class="btn btn-success" name="clicked">search</button>
    </form>
</div>




<div class="container">


    <div class="row">
        <?php foreach ($getelement as $data) { ?>
            <div class="col-md-4 mt-3">

                <div class="card" style="width: 18rem; height: 420px">
                    <img src="/e_commerce/products/images/<?php echo $data['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['proname'] ?></h5>
                        <p><?php echo $data['description']; ?></p>
                        <p><?php echo $data['catname']; ?></p>
                        <p>price:- <b><?php echo $data['price']; ?> $</b></p>
                        <a href="/e_commerce/forCustomers/orders/add.php?buy=<?php echo $data['id'] ?>&customerid=<?php echo $_SESSION['customerid']; ?>&price=<?php echo $data['price']; ?>" class="btn btn-info btn-block">buy</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>




</div>

<?php
include "../../shared/footer.php";
?>