<?php
    include('../config/constants.php');

    // Get the c_id of the admin we are deleting
    $c_id = $_GET['c_id'];
    $c_type = $_GET['c_type'];

    if($c_type=="I") {
        $SQL2 = "DELETE FROM mvx_individual
            WHERE c_id = $c_id";

        // Execute the query
        $RES2 = mysqli_query($CONN, $SQL2);

        // Actions after the query
        if($RES2==TRUE) {
            //echo "Admin deleted"
            $_SESSION['delete'] = "Individual deleted successfully.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
        else {
            $_SESSION['delete'] = "Individual failed to be deleted.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
    }
    else if($c_type=="C") {
        $SQL2 = "DELETE FROM mvx_corporate
            WHERE c_id = $c_id";

        // Execute the query
        $RES2 = mysqli_query($CONN, $SQL2);

        // Actions after the query
        if($RES2==TRUE) {
            //echo "Admin deleted"
            $_SESSION['delete'] = "Corporate deleted successfully.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
        else {
            $_SESSION['delete'] = "Corporate failed to be deleted.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
    }

    // SQL query to delete admin
    $SQL = "DELETE FROM mvx_customer
    WHERE c_id = $c_id";

    // Execute the query
    $RES = mysqli_query($CONN, $SQL);

    // Actions after the query
    if($RES==TRUE && $RES2==TRUE) {
        //echo "Admin deleted"
        $_SESSION['delete'] = "Customer deleted successfully.";
        header('location:'.SITEURL.'admin/man_cust.php');
    }
    else {
        $_SESSION['delete'] = "Customer failed to be deleted.";
        header('location:'.SITEURL.'admin/man_cust.php');
    }
?>