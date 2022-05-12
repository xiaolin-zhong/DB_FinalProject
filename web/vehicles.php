<?php include('partials_front/nav_bar.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Vehicles</h2>

            <?php 
            
                //SQL query to display the vehicles from database.
                $SQL = "SELECT *
                        FROM mvx_vehicle";
                $RES = mysqli_query($CONN, $SQL);
                //Check if the table is populated.
                $COUNT = mysqli_num_rows($RES);
                
                if($COUNT>0) {
                    while($ROW = mysqli_fetch_assoc($RES)) {
                        $v_vin = $ROW['v_vin'];
                        $v_make = $ROW['v_make'];
                        $v_model = $ROW['v_model'];
                        $v_image = $ROW['v_image'];
                        ?>

                        <div class="box-3 float-container">
                            <?php
                                //Check if image is available or not
                                if ($v_image=="") {
                                    echo "Image not available.";
                                }
                                else {
                                    ?>
                                    <img src="<?php echo SITEURL;?>../images/vehicles/<?php echo $v_image;?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            <h3 class="float-text text-brown"><?php echo $v_make ?></h3>
                            <div class="food-menu-desc">
                                <?php
                                    if(isset($_SESSION['cust_login'])) {
                                        $c_email = $_SESSION['cust_login'];
                                        $SQL8 = "SELECT *
                                                 FROM mvx_customer
                                                 WHERE c_email = '$c_email'";
                                        $RES8 = mysqli_query($CONN, $SQL8);
                                        $ROW8 = mysqli_fetch_assoc($RES8);
                                        $c_type = $ROW8['c_type'];
                                        if($c_type == 'I') {
                                            ?>
                                            <a href="<?php echo SITEURL;?>rent_i.php?v_vin=<?php echo $v_vin;?>" class="btn btn-primary">Rent Now</a>
                                        <?php
                                        }
                                        if($c_type == 'C') { 
                                            ?>
                                            <a href="<?php echo SITEURL;?>rent_c.php?v_vin=<?php echo $v_vin;?>" class="btn btn-primary">Rent Now</a>
                                        <?php
                                        }
                                    
                                    }
                                    else {
                                        ?>
                                            <a href="<?php echo SITEURL;?>login.php?>" class="btn btn-primary">Rent Now</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <?php

                    }
                }
                else {
                    echo "There is no vehicles available.";
                }

            ?>

            <div class="clearfix"></div>

        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials_front/footer.php')?>