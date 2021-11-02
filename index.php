<?php include("includes/header.php"); ?>
        <!--================Header Area =================-->
        <?php include("includes/navigation.php"); ?>
        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>Welcome to our Hotel</h6>
						<h2>Enjoy our services</h2>
						<p>please  login to enjoy our services</p>
						<a href="available-rooms.php" class="btn theme_btn button_hover">Check Rooms</a>
					</div>
				</div>
            </div>
        </section>
        <!--================Banner Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Hotel Accomodation</h2>
                    <p>check our rooms </p>
                </div>
                <div class="row mb_30">
                    <?php
                        $getRooms = mysqli_query($connection, "SELECT * FROM rooms");
                        if (mysqli_num_rows($getRooms) > 0) {
                            while ($room = mysqli_fetch_array($getRooms)) {
                            
                            ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="accomodation_item text-center">
                                        <div class="hotel_img">
                                            <img src="image/<?php echo $room['picture']; ?>" alt="" style="width: 263px;height: 270px;">
                                            <a href="available-rooms.php?book=<?php echo $room['id']; ?>&title=<?php echo $room['title']; ?>" class="btn theme_btn button_hover">Book Now</a>
                                        </div>
                                        <a href="#"><h4 class="sec_h4"><?php echo $room['title']; ?></h4></a>
                                        <h5>Nrs.<?php echo $room['price']; ?><small>/night</small></h5>
                                    </div>
                                </div>
                            
                            <?php
                            }
                        } else {
                            echo "<div class='col-md-12 text-center'><h4>No Rooms Available.</h4></div>";
                        }
                    ?>
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
      
     
        <!--================ About History Area  =================-->
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">About Us </h2>
                            <p>we have good rooms and services to offer to our guests.we have services to book variety of rooms according to the choices of guets. we also have food order facilities and we welcome online payment system as our payment method. guests can view testimonials of others guests who have visited our hotel and make their choices whether to saty or not in our hotel.</p>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="image/bck_bg.jpg" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ About History Area  =================-->
        
        <!--================ Testimonial Area  =================-->
        <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Testimonial from our Clients</h2>
                   
                </div>
                <div class="testimonial_slider owl-carousel">
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="image/11.jpg" alt="" style="width: 100px !important;">
                        <div class="media-body">
                            <p>The hotel rooms are great with good taste of foods and services. i love it. </p>
                            <a href="#"><h4 class="sec_h4">Subarna Dahal</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>    
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="image/12.jpg" alt="" style="width: 100px !important;">
                        <div class="media-body">
                            <p>I recommend people to stay at this hotel as it provides good services at  low price and rooms are comfortable. </p>
                            <a href="#"><h4 class="sec_h4">Jiya Karki</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="image/13.jpg" alt="" style="width: 100px !important;">
                        <div class="media-body">
                            <p>This is a great hotel to stay at with low price and good services</p>
                            <a href="#"><h4 class="sec_h4">Rewanta Singh</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>    
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="image/14.jpg" alt="" style="width: 100px !important;">
                        <div class="media-body">
                            <p>Good hotel with good services at low prize. </p>
                            <a href="#"><h4 class="sec_h4">Salina Gurung</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Testimonial Area  =================-->
        
        
<?php include("includes/footer.php"); ?>