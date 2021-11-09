<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


$select = "SELECT orders.nop, orders.cost, orders.id ,orders.customerid, orders.productid,customers.name as custname, products.name prodname  FROM orders INNER JOIN customers on orders.customerid = customers.id INNER JOIN products on orders.productid = products.id;";
$getelement = mysqli_query($conn, $select);


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM orders WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/orders/list.php');
}
authAdmin();

?>

<div class="container">

    <table class="table table-bordered mt-5 table-dark table-striped">
        <input id="myInput" type="text" placeholder="Search.." class="form-control">

        <thead class="text-center">
            <th>customer name </th>
            <th>product name</th>
            <th>number of pieces</th>
            <th>cost</th>
            <th>action</th>
        </thead>
        <tbody id="myTable">
            <?php foreach ($getelement as $data) { ?>
                <tr>
                    <td><?php echo $data['custname'] ?></td>
                    <td><?php echo $data['prodname'] ?></td>
                    <td><?php echo $data['nop'] ?></td>
                    <td><?php echo $data['cost'] ?></td>
                    <!-- <td><a href="/e_commerce/orders/update.php?up=<?php echo $data['id'] ?>" class="btn btn-info">edit</a></td> -->
                    <td><a href="/e_commerce/orders/list.php?del=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
                </tr>
            <?php }  ?>
        </tbody>
    </table>
</div>

<?php
include "../shared/footer.php";
?>