<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Dashboard</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4>Your <span class="text-gold">Bookings</span></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Room</th>
                                        <th>Booking Date</th>
                                    </thead>
                                    <tbody>
<?php

    $yourBookings = mysqli_query($connection, "SELECT * FROM bookings WHERE user_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($yourBookings) > 0) {
        $inc = 1;
        while ($booking = mysqli_fetch_array($yourBookings)) {
            ?>
            <tr>
                <td><?php echo $inc; ?></td>
                <td><?php echo $booking['title']; ?></td>
                <td><?php echo $booking['booking_date']; ?></td>
            </tr>
            <?php
            $inc++;
        }
    } else {
        echo "<tr><td>No Booking Found!</td></tr>";
    }

?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        <?php include("includes/footer.php"); ?>