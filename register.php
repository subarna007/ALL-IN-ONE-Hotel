<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Login</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-4 offset-4 formDesign">
                                
                        <form action="" method="POST">
                            <?php

                                if (isset($_POST['registerbtn'])) {
                                    
                                    // Lets get data from form inputs

                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $password = $_POST['password'];

                                    // Escape data from SQL Injection

                                    $name = mysqli_real_escape_string($connection, $_POST['name']);
                                    $email = mysqli_real_escape_string($connection, $_POST['email']);
                                    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
                                    $password = mysqli_real_escape_string($connection, $_POST['password']);


                                    // validate data

                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $errors[] = "Please Enter a valid Email";
                                    }

                                    if (strlen($phone) < 10 || strlen($phone) > 12) {
                                        $errors[] = "Please Enter a valid phone number.";
                                    }

                                    // Check if email already exist

                                    $check = mysqli_query($connection, "SELECT email FROM users WHERE email = '$email'");

                                    if (mysqli_num_rows($check) > 0) {
                                        $errors[] = "Account with this email already exists. try another!";
                                    }


                                    if (!empty($errors)) {
                                        
                                        foreach ($errors as $error) {
                                            ?>

                                            <div class="alert alert-danger">
                                                <strong>Alert! </strong> <?php echo $error; ?>
                                            </div>

                                            <?php
                                        }

                                    } else {

                                        //Add User to Database

                                        $insert = mysqli_query($connection, "INSERT INTO users(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')");

                                        if ($insert) {
                                            
                                            echo '
                                                <div class="alert alert-success">
                                                    <strong>Alert! </strong> You are Register Successfully! Continue <a href="login.php"><strong>Login</strong></a>
                                                </div>
                                            ';
                                            // Write whatever your message is
                                        } else {

                                            echo '
                                                <div class="alert alert-danger">
                                                    <strong>Alert! </strong> Something Went Wrong. Please try again!
                                                </div>
                                            ';

                                        }

                                    }

                                }   

                            ?>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="<?php echo (isset($_POST['name']))? $_POST['name'] : ''; ?>" placeholder="Your Name" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php echo (isset($_POST['email']))? $_POST['email'] : ''; ?>" placeholder="Your Email" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" name="phone" value="<?php echo (isset($_POST['phone']))? $_POST['phone'] : ''; ?>" placeholder="Your Phone" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="<?php echo (isset($_POST['password']))? $_POST['password'] : ''; ?>" placeholder="Your Password" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="registerbtn" class="btn btn-warning btn-block btn-lg text-white">
                                <a href="login.php" class="float-right mt-3 text-dark">Already have an Account?</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
       
       <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
<?php include("includes/footer.php"); ?>