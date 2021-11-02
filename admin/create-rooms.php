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
                        <h4 class="page-title">Create Rooms</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Rooms</li>
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
                        
                        <div class="card p-5">
                            
                            <form action="" method="POST" enctype="multipart/form-data">
<?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_POST['create-room'])) {
        
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];

        move_uploaded_file($picture_tmp, "../image/$picture");

                $create_room = mysqli_query($connection, "

                    INSERT 
                        INTO 
                            rooms
                                (
                                    title, 
                                    price, 
                                    picture
                                )
                            VALUES
                                (
                                '$title', 
                                '$price', 
                                '$picture'
                                )

                    ");
                if ($create_room) {
                    $_SESSION['message'] = "<div class='alert alert-success'><strong> Alert! </strong> Room has been Created Successfully!</div>";
                    header("Location: create-rooms.php");
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Problem Occured while creating record.</div>";
                    header("Location: create-rooms.php");
                }
                
 

    }




?>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" placeholder="Room Title" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" placeholder="Room Title" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Attach Picture</label>
                                    <input type="file" name="picture" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="create-room" value="Create Room" class="btn btn-primary btn-block">
                                </div>
                            </form>

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