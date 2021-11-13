<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";


$select = "SELECT * FROM category";
$getelement = mysqli_query($conn, $select);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM category WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/category/list.php');
}
authcustomeronly()
?>

<div class="container">


    <div class="row  justify-content-center">
        <?php foreach ($getelement as $data) { ?>
            <div class="col-md-6 mt-3 col-lg-4 col-sm-8">

                <div class="card" style="width: 18rem; height: 320px">
                    <img src="/e_commerce/category/images/<?php echo $data['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['name'] ?></h5>
                        <a href="/e_commerce/forCustomers/products/list.php?search=<?php echo $data['id'] ?>" class="btn btn-primary btn-block hvr-wobble-skew">go to the products</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php
include "../../shared/footer.php";
?>