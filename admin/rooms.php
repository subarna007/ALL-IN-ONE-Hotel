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
                        <h4 class="page-title">Rooms</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Rooms</li>
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
                            <?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }


                                if (isset($_GET['delete'])) {
                                    
                                    $id = $_GET['delete'];

                                    $delete = mysqli_query($connection, "DELETE FROM rooms WHERE id = '$id'");
                                    if ($delete) {
                                        $_SESSION['message'] = "<div class='alert alert-success'><strong>Alert! </strong> Record Deleted Successfully!</div>";
                                        header("Location: rooms.php");
                                    } else {
                                        $_SESSION['message'] = "<div class='alert alert-danger'><strong>Alert! </strong> Problem occured deleting record.</div>";
                                        header("Location: rooms.php");
                                    }
                                }

                            ?>
                            <div class="table-responsive">
                                
                                <table class="table">
                                    
                                    <thead>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                    </thead>

                                    <tbody>

                                        <?php

                                            $rooms = mysqli_query($connection, "SELECT * FROM rooms ORDER BY id DESC");
                                            $inc = 1;
                                            if (mysqli_num_rows($rooms) > 0) {

                                                while ($room = mysqli_fetch_array($rooms)) {

                                                    ?>

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                            <img src="../image/<?php echo $room['picture']; ?>" alt="<?php echo $room['title']; ?>" style="width: 100px;" class="mb-3">
                                                            <br>
                                                            <a href="rooms.php?delete=<?php echo $room['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?');">X</a>
                                                        </td>
                                                        <td><?php echo $room['title']; ?></td>
                                                        <td><?php echo $room['price']; ?></td>

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