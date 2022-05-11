<?php include('partials_front/nav_bar.php');?>

    <!-- Search Section Starts Here -->
    <section class="veh_search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Vehicles" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Search Section Ends Here -->

    <!-- Locations Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Locations</h2>

            <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="images/loc_nyc.jpg" alt="New York" class="img-responsive img-curve">

                <h3 class="float-text text-white">New York</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/loc_sf.jpg" alt="San Francisco" class="img-responsive img-curve">

                <h3 class="float-text text-white">San Francisco</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/loc_vegas.jpg" alt="Vegas" class="img-responsive img-curve">

                <h3 class="float-text text-white">Vegas</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Vehicles Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Vehicles</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_audi.png" alt="Audi A4" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Audi A4</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Rent Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_volks.png" alt="Volkswagon Altas" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Volkswagon Altas</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="#" class="btn btn-primary">Rent Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_volvo_xc60.png" alt="Volvo XC60" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Volvo XC60</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="#" class="btn btn-primary">Rent Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_bmw.png" alt="BMW 540" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>BMW 540</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="#" class="btn btn-primary">Rent Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_kia_tell.png" alt="Kia Telluride" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Kia Telluride</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="#" class="btn btn-primary">Rent Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/car_porsche.jpg" alt="Porsche 911" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Porsche 911</h4>
                    <p class="food-price">$2.3</p>
                    <br>

                    <a href="#" class="btn btn-primary">Rent Now</a>
                </div>
            </div>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Vehicles</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials_front/footer.php')?>