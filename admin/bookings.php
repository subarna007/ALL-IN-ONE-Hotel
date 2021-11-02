<?php include("includes/header.php"); ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Bookings</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="card">
                            
                            <div class="table-responsive">
                                
                                <table class="table">
                                    
                                    <thead>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Room</th>
                                        <th>Booking Date</th>
                                    </thead>

                                    <tbody>

                                        <?php

$bookings = mysqli_query($connection, "
	SELECT  
		bookings.user_id, 
		bookings.title, 
		bookings.booking_date, 
		users.id, 
		users.name, 
		users.email 
	FROM 
		bookings 
	INNER JOIN 
		users 
	ON 
	bookings.user_id = users.id
");
                                            $inc = 1;
                                            if (mysqli_num_rows($bookings) > 0) {

                                                while ($booking = mysqli_fetch_array($bookings)) {

                                                    ?>

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                        	<strong><?php echo $booking['name']; ?></strong>
                                                        	<br>
                                                        	<?php echo $booking['email'] ?>
                                                        </td>
                                                        <td><?php echo $booking['title'] ?></td>
                                                        <td><?php echo $booking['booking_date'] ?></td>

                                                    </tr>

                                                    <?php
                                                    $inc++;
                                                }

                                            } else {

                                                echo "<tr class='text-center'><td colspan='4'>No Data Found!</td></tr>";
                                            }

                                        ?>
                                        
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include("includes/footer.php"); ?>