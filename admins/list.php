<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../func/database.php";
include "../func/function.php";


$select = "SELECT * FROM admins";
$getelement = mysqli_query($conn, $select);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $select = "DELETE FROM admins WHERE id = $id";
    mysqli_query($conn, $select);
    header('location: /e_commerce/admins/list.php');
}
authAdminAccess();

?>

<div class="container">
    <table class="table table-bordered mt-5 table-dark table-striped">
        <input id="myInput" type="text" placeholder="Search.." class="form-control">
        <thead class="text-center">
            <th>name</th>
            <th>password</th>
            <th>access</th>

            <th colspan="2">action</th>
        </thead>
        <tbody id="myTable">
            <?php foreach ($getelement as $data) { ?>
                <tr>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['password'] ?></td>
                    <td><?php
                        if ($data['access'] == 0) {
                            echo "all access";
                        } else {
                            echo "semi access";
                        }
                        ?></td>

                    <td><a href="/e_commerce/admins/update.php?up=<?php echo $data['id'] ?>" class="btn btn-info">edit</a></td>
                    <td><a href="/e_commerce/admins/list.php?del=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include "../shared/footer.php";
?>