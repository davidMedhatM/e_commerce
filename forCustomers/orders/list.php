<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../func/database.php";
include "../../func/function.php";

$seid = $_SESSION['customerid'];
$select = "SELECT orders.nop, orders.cost,orders.time, orders.id ,orders.customerid, orders.productid,customers.name as custname, products.name prodname  FROM orders INNER JOIN customers on orders.customerid = customers.id INNER JOIN products on orders.productid = products.id WHERE orders.customerid = $seid";
$getelement = mysqli_query($conn, $select);


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM orders WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/orders/list.php');
}
authcustomeronly();

?>

<div class="container">
    <input id="myInput" type="text" placeholder="Search.." class="form-control">

    <div class="table-responsive">

        <table class="table table-bordered mt-5 table-dark table-striped">

            <thead class="text-center">
                <th>customer name </th>
                <th>product name</th>
                <th>number of pieces</th>
                <th>cost</th>
                <th>time</th>
                <th>action</th>
            </thead>
            <tbody id="myTable">
                <?php foreach ($getelement as $data) { ?>
                    <tr>
                        <td><?php echo $data['custname'] ?></td>
                        <td><?php echo $data['prodname'] ?></td>
                        <td><?php echo $data['nop'] ?></td>
                        <td><?php echo $data['cost'] ?></td>
                        <td><?php echo $data['time'] ?></td>
                        <td><a href="/e_commerce/orders/list.php?del=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "../../shared/footer.php";
?>