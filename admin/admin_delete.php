<?php include('partials/nav_bar.php'); ?>

<?php
    include('../config/constants.php');

    // Get the a_id of the admin we are deleting
    $a_id = $_GET['a_id'];

    // SQL query to delete admin
    $SQL = "DELETE FROM mvx_admin
            WHERE a_id = $a_id";

    // Execute the query
    $RES = mysqli_query($CONN, $SQL);

    // Actions after the query
    if($RES==TRUE) {
        //echo "Admin deleted"
        $_SESSION['delete'] = "Admin deleted sucessfully.";
        header('location:'.SITEURL.'admin/man_admin.php');
    }
    else {
        $_SESSION['delete'] = "Admin failed to delete.";
        header('location:'.SITEURL.'admin/man_admin.php');
    }

?>


<?php include('partials/footer.php'); ?>
