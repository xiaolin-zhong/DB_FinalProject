<?php include('partials_front/nav_bar.php');?>

    <!-- Search Section Starts Here -->
    <section class="veh_search text-center">
        <div class="container">


        </div>
    </section>
    <!-- Search Section Ends Here -->

    <!-- Locations Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Locations</h2>

            <div class="box-3 float-container">
                <img src="images/loc_nyc.jpg" alt="New York" class="img-responsive img-curve">

                <h3 class="float-text text-white">New York</h3>
            </div>
            
            <div class="box-3 float-container">
                <img src="images/loc_sf.jpg" alt="San Francisco" class="img-responsive img-curve">

                <h3 class="float-text text-white">San Francisco</h3>
            </div>
            
            <div class="box-3 float-container">
                <img src="images/loc_vegas.jpg" alt="Vegas" class="img-responsive img-curve">

                <h3 class="float-text text-white">Vegas</h3>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Vehicles Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Vehicles</h2>

            <?php 
            
                //SQL query to display the vehicles from database.
                $SQL = "SELECT *
                        FROM mvx_vehicle
                        LIMIT 4";
                $RES = mysqli_query($CONN, $SQL);
                //Check if the table is populated.
                $COUNT = mysqli_num_rows($RES);
                
                if($COUNT>0) {
                    while($ROW = mysqli_fetch_assoc($RES)) {
                        $v_vin = $ROW['v_vin'];
                        $v_make = $ROW['v_make'];
                        $v_model = $ROW['v_model'];
                        $v_image = $ROW['v_image'];
                        $v_rentrate = $ROW['v_rentrate'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                            <?php
                                //Check if image is available or not
                                if ($v_image=="") {
                                    echo "Image not available.";
                                }
                                else {
                                    ?>
                                    <img src="<?php echo SITEURL;?>../images/vehicles/<?php echo $v_image;?>" alt="<?php echo $v_make?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $v_make?></h4>
                                <p class="food-price">$<?php echo $v_rentrate;?></p>
                                <br>

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
        <p class="text-center">
            <a href="<?php echo SITEURL;?>vehicles.php">See All Vehicles</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials_front/footer.php')?>