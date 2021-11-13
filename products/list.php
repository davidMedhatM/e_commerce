<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


$select = "SELECT products.id, products.name proname, products.price ,products.description, products.img, category.name catname FROM products JOIN category ON products.categoryid = category.id;";
$getelement = mysqli_query($conn, $select);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/products/list.php');
}
authAdmin();

?>

<div class="container">
    <input id="myInput" type="text" placeholder="Search.." class="form-control">

    <div class="table-responsive">

        <table class="table table-bordered mt-5 table-dark table-striped">

            <thead class="text-center">
                <th>img</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>categoryid</th>
                <th colspan="2">action</th>
            </thead>
            <tbody id="myTable">
                <?php foreach ($getelement as $data) { ?>
                    <tr>
                        <td> <img src="./images/<?php echo $data['img'] ?>" alt="img"></td>
                        <td><?php echo $data['proname'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['price'] ?>$</td>
                        <td><?php echo $data['catname'] ?></td>
                        <td><a href="/e_commerce/products/update.php?up=<?php echo $data['id'] ?>" class="btn btn-info">edit</a></td>
                        <td><a href="/e_commerce/products/list.php?del=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "../shared/footer.php";
?>