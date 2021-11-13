<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


$select = "SELECT feedback.id as feedid,feedback.text,feedback.customerid,customers.id, customers.name  FROM feedback INNER JOIN customers ON feedback.customerid = customers.id";
$getelement = mysqli_query($conn, $select);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM feedback WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/feedback/list.php');
}
authAdmin();

?>

<div class="container">
    <input id="myInput" type="text" placeholder="Search.." class="form-control">

    <div class="table-responsive">
        <table class="table table-bordered mt-5 table-dark table-striped">
            <thead class="text-center">
                <th>text</th>
                <th>customer name</th>
                <th colspan="2">action</th>
            </thead>
            <tbody id="myTable">
                <?php foreach ($getelement as $data) { ?>
                    <tr>
                        <td><?php echo $data['text'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><a href="/e_commerce/feedback/update.php?up=<?php echo $data['feedid'] ?>" class="btn btn-info">edit</a></td>
                        <td><a href="/e_commerce/feedback/list.php?del=<?php echo $data['feedid'] ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "../shared/footer.php";
?>