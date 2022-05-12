<?php include('partials_front/nav_bar.php');?>

<div class="rent_add">
    <div class="container">
        <h1>Profile</h1>

        <?php
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['password_updated'])) {
                echo $_SESSION['password_updated'];
                unset($_SESSION['password_updated']);
            }
            if(isset($_SESSION['newconf_not_match'])) {
                echo $_SESSION['newconf_not_match'];
                unset($_SESSION['newconf_not_match']);
            }
            if(isset($_SESSION['currpw_not_match'])) {
                echo $_SESSION['currpw_not_match'];
                unset($_SESSION['currpw_not_match']);
            }
        ?>

        <br><br>
        <?php
            $c_type = $_SESSION['cust_type'];
                if(isset($_SESSION['cust_login'])) {
                    if($c_type == 'I') {
                        ?>
                        <a href="<?php echo SITEURL;?>update_i.php" class="btn btn-primary">Update Info</a>
                        <?php
                    }
                    if($c_type == 'C') { 
                        ?>
                        <a href="<?php echo SITEURL;?>update_c.php" class="btn btn-primary">Update Info</a>
                        <?php
                    }         
                }
            ?>
            <br><br><br>
            <a href="<?php echo SITEURL;?>change_pw.php" class="btn btn-primary">Change Password</a>

            <br><br><br>
            <a href="<?php echo SITEURL;?>orders.php" class="btn btn-primary">Orders</a>
    </div>
</div>


<?php include('partials_front/footer.php')?>