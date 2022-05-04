<?php include('partials/nav_bar.php'); ?>
    
    <!-- Search Bar -->

    <section class="veh_search text-center">
        <div class="container">
            <form action="">
                <input type="search" name="search" placeholder="Search for Vehicles">
                <input type="submit" name="submit" value="Search" class="button button-primary">
            </form>
        </div>
    </section>

    <!-- -->

    <section class="veh_menu">
        <div class="container">
            <h2 class="text-center"> Explore Vehicles </h2>

            <div class="veh_box">
                <div class="veh_menu-img">
                    <img src="../images/car_porsche.jpg" alt="Porsche 911" class="img-responsive">
                </div>

                <div class="veh_menu-desc">
                    <h4>Porsche 911</h4>
                    <p class="veh_price">Rental Rate: $60</p>
                    <a href="#" class="button button-primary">Rent Now</a>
                </div>
            </div>

            <div class="veh_box">
                <div class ="veh_menu-img">
                    <img src="../images/car_tesla.png" alt="Tesla S" class="img-responsive">
                </div>

                <div class="veh_menu-desc">
                    <h4>Tesla Model S</h4>
                    <p class="veh_price">Rental Rate: $60</p>
                    <a href="#" class="button button-primary">Rent Now</a>
                </div>
            </div>

            <div class="veh_box">
                <div class ="veh_menu-img">
                    <img src="../images/car_kia_k5.png" alt="Kia K5" class="img-responsive">
                </div>

                <div class="veh_menu-desc">
                    <h4>Kia K5</h4>
                    <p class="veh_price">Rental Rate: $40</p>
                    <a href="#" class="button button-primary">Rent Now</a>
                </div>
            </div>
            
            <div class="veh_box">
                <div class ="veh_menu-img">
                    <img src="../images/car_audi.png" alt="Audi A4" class="img-responsive">
                </div>

                <div class="veh_menu-desc">
                    <h4>Audi A4</h4>
                    <p class="veh_price">Rental Rate: $60</p>
                    <a href="#" class="button button-primary">Rent Now</a>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </section>

    <section class="loc_menu">
        <div class="container">
            <h2 class="text-center">Locations</h2>

            <a href="#">
                <div class="loc_box float-container">
                    <img src="../images/loc_nyc.jpg" alt="New York" class="img-responsive img-curve">

                    <h3 class="float-text">New York City</h3>
                </div>
            </a>

            <a href="#">
            <div class="loc_box float-container">
                <img src="../images/loc_sf.jpg" alt="San Francisco" class="img-responsive img-curve">

                <h3 class="float-text">San Francisco</h3>
            </div>
            </a>

            <a href="#">
            <div class="loc_box float-container">
                <img src="../images/loc_vegas.jpg" alt="Las Vegas" class="img-responsive img-curve">

                <h3 class="float-text">Las Vegas</h3>
            </div>
            </a>

            <div class="clearfix">
        </div>
    </section>

    <section class="soc_menu">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/office/16/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/officexs/16/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/office/16/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    
<?php include('partials/footer.php'); ?>