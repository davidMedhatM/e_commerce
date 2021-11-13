<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


$select = "SELECT * FROM category";
$getelement = mysqli_query($conn, $select);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM category WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/category/list.php');
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
                <th colspan="2">action</th>
            </thead>
            <tbody id="myTable">
                <?php foreach ($getelement as $data) { ?>
                    <tr>
                        <td> <img src="./images/<?php echo $data['img'] ?>" alt="img"></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><a href="/e_commerce/category/update.php?up=<?php echo $data['id'] ?>" class="btn btn-info">edit</a></td>
                        <td><a href="/e_commerce/category/list.php?del=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "../shared/footer.php";
?>