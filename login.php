<?php
(!empty($_SESSION['username'])) ? $username = $_SESSION['username'] : $username = 'visitor';

require_once 'config/config.php';
include 'incl/fun.php';
include 'incl/loginSubmit.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="movies,tv,videos">
    <meta name="description" content="My interview task">
    <meta name="author" content="TC NJOKO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- CSS main-->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Login</title>
</head>
<body>
    
    <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">

            <!-- Logo -->
            <a class="logo" href="#">
                <img src="img/logo-light.png" alt="logo">          
            </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="fas fa-bars"></i></span>
              </button>

              <!-- navbar links -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php"> Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="myFavourites.php"> My Favourites</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact Us</a>
                  </li> 
                    <!--NOT Logged user -->
                    
                    <li class="nav-item">
                        <?php if(empty($_SESSION['username'])){ ?>
                        <a class="btn-log" href="login.php"><i class="fas fa-user-o"></i> Login </a>
                        <!-- Logged user -->
                        <?php } elseif(!empty($_SESSION['username'])){ ?>
                            <a class="btn-log" href="log-out.php"><i class="fas fa-lock"></i> Log out </a>
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
        <section class="login" data-scroll-index="6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-18 login-form">
                        <form class="form" id="Login" method="post" action="">

                            <?php
                                if(isset($notice)){echo $notice;}
                            ?>

                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text-white">Sign In</h4>
                                    </div>
                                    <?php
                                        if(isset($err)){
                                            echo '<ul>'.$err.'</ul>';
                                        }
                                    ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="user" placeholder="Enter UserName or Email" required="required"value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_email" type="password" name="password" placeholder="Enter password" required="required"value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn-log" name="doLogin"><span>Login</span></button>
                                    </div>

                                </div>                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Form -->

        <footer class="text-center">
            <div class="container">

                <div class="social">
                    <a href="#0"><i class="fa fa-facebook"></i></a>
                    <a href="#0"><i class="fa fa-twitter"></i></a>
                    <a href="#0"><i class="fa fa-instagram"></i></a>
                    <a href="#0"><i class="fa fa-linkedin"></i></a>
                </div>

                <p>&copy; 2022 All Rights Reserved.</p>

            </div>
        </footer>

    <script src="assets/js/contact.js"></script>
</body>
</html>