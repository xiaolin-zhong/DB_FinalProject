<?php
    include('../config/constants.php');

    if(isset($_GET['v_vin']) && isset($_GET['v_image'])) {
        $v_vin = $_GET['v_vin'];
        $v_image = $_GET['v_image'];

        if($v_image != "") {
            $PATH = "../images/vehicles/".$v_image;

            $REMOVE = unlink($PATH);

            if($REMOVE==FALSE) {
                $_SESSION['upload'] = "Failed to remove.";
                header('location:'.SITEURL.'admin/man_veh.php');
                die();
            }
        }

        $SQL = "DELETE FROM mvx_vehicle
                WHERE v_vin = $v_vin";

        $RES = mysqli_query($CONN, $SQL);

        if($RES==TRUE) {
            $_SESSION['delete'] = "Vehicle deleted successfully.";
            header('location:'.SITEURL.'admin/man_veh.php');
        }
        else {
            $_SESSION['delete'] = "Vehicle failed to be deleted.";
            header('location:'.SITEURL.'admin/man_veh.php');
        }

    }
    else {
        $_SESSION['delete'] = "Unauthorized access.";
        header('location:'.SITEURL.'admin/man_veh.php');
    }

?>