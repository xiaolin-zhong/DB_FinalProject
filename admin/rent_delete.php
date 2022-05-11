<?php
    include('../config/constants.php');

    // Get the r_id of the admin we are deleting
    $r_id = $_GET['r_id'];

    // SQL query to delete admin
    $SQL = "DELETE FROM mvx_rent
            WHERE r_id = $r_id";

    // Execute the query
    $RES = mysqli_query($CONN, $SQL);

    // Actions after the query
    if($RES==TRUE) {
        //echo "Admin deleted"
        $_SESSION['delete'] = "Rental deleted successfully.";
        header('location:'.SITEURL.'admin/man_rent.php');
    }
    else {
        $_SESSION['delete'] = "Rental failed to be deleted.";
        header('location:'.SITEURL.'admin/man_rent.php');
    }

?>