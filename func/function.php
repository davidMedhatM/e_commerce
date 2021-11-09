<?php

function authAdmin()
{
    if (isset($_SESSION['adminlogin'])) {
    } else {
        header('location: /e_commerce/admins/login.php');
    }
}
function authAdminAccess()
{
    if (isset($_SESSION['adminlogin'])) {
        if ($_SESSION['adminaccess'] == 0) {
        } else {
            header('location: /e_commerce/admins/login.php');
        }
    } else {
        header('location: /e_commerce/admins/login.php');
    }
}
function authcustomer()
{
    if (isset($_SESSION['customerlogin'])) {
    } elseif (isset($_SESSION['adminlogin'])) {
    } else {
        header('location: /e_commerce/admins/login.php');
    }
}

function mess()
{

    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>try again</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
