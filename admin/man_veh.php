<?php include('partials/nav_bar.php'); ?>

    <!-- Vehicles Available -->
        <div class="admin">
            <div class="container">
                <h1>Manage Vehicles</h1>

                <br/>
                <a href="add-veh.php" class="button button-primary">Add Vehicle</a>
                <br/><br/>

                <table class="table-full">
                    <tr>
                        <th>Vin Number</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>License</th>
                        <th>Rental Rate</th>
                        <th>Over Mileage</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>

                    <tr>
                        <td>A45897645</td>
                        <td>AUDI</td>
                        <td>A4</td>
                        <td>2021</td>
                        <td>DL895NY1</td>
                        <td>$60</td>
                        <td>$4.00</td>
                        <td>Luxury</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Vehicle</a>
                            <a href="#" class="button button-secondary">Delete Vehicle</a>
                        </td>
                    </tr>
                    <tr>
                        <td>F79834589</td>
                        <td>VOLKSWAGEN</td>
                        <td>ATLAS</td>
                        <td>2019</td>
                        <td>598GY967</td>
                        <td>$45</td>
                        <td>$2.50</td>
                        <td>SUV</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Vehicle</a>
                            <a href="#" class="button button-secondary">Delete Vehicle</a>
                        </td>
                    </tr>
                    <tr>
                        <td>M43597167</td>
                        <td>VOLVO</td>
                        <td>XC60</td>
                        <td>2022</td>
                        <td>D3R95GN1</td>
                        <td>$55</td>
                        <td>$3.50</td>
                        <td>SUV</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Vehicle</a>
                            <a href="#" class="button button-secondary">Delete Vehicle</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

<?php include('partials/footer.php'); ?>