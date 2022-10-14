<?php
    require_once 'config/config.php';
    include 'incl/fun.php';
    include 'incl/contactSubmit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'incl/head.php';?>
    <title>Contact Us</title>
</head>
<body>
    
    <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">

            <!-- Logo -->
            <a class="logo" href="index.php">
                <img src="assets/img/logo-light.png" alt="logo">          
            </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="fa fa-bars"></i></span>
              </button>

              <!-- navbar links -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php"> Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="favourites.php"> My Favourites</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="contact-us.php">Contact Us</a>
                  </li> 
                    <!--NOT Logged user -->
                    
                    <li class="nav-item">
                        <?php if(empty($_SESSION['username'])){ ?>
                        <a class="btn-login" href="login.php"><i class="fa fa-user-o"></i> Login </a>
                        <!-- Logged user -->
                        <?php } elseif(!empty($_SESSION['username'])){ ?>
                            <a class="btn-login" href="log-out.php"><i class="fa fa-lock"></i> Log out </a>
                        <?php }?>
                        <!--NOT //Logged user -->
                    </li>
                   
                </ul>
              </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- =====================================
        ==== Start Contact -->
        <section class="contact" data-scroll-index="6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-18 contact-form">
                        <form class="form" id="contactForm" method="post" action="">

                            <?php
                                if(isset($notice)){echo $notice;}
                            ?>

                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text-white">Get In Touch</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="name" placeholder="Fullname" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_email" type="email" name="email" placeholder="Email address" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_subject" type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="form_message" name="message" placeholder="Message" rows="4" required="required"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="sendMessage"><span>Send Message</span></button>
                                    </div>

                                </div>                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Form -->


        <!-- Contact Information -->
        <section class="information bg-img" data-overlay-dark="9" data-background="img/3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info">
                            <div class="item">
                                <span class="icon"><i class="fa fa-phone"></i></span>
                                <div class="cont">
                                    <h6>Phone : </h6>
                                    <p>084 531 8336<br>068 4254 565</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info">
                            <div class="item">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                                <div class="cont">
                                    <h6>Email : </h6>
                                    <p>
                                        <a href="mailto:chriswebsitedev@gmail.com;">chriswebsitedev@gmail.com</a>
                                        <br>
                                        <a href="mailto:thabanichris@yahoo.com;">thabanichris@yahoo.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Contact Information -->

        <!-- footer -->
        <?php include 'incl/footer.php';?>
        <!-- //footer -->

    <script src="assets/js/contact.js"></script>
</body>
</html>