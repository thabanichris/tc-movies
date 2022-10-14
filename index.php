<?php
    require_once 'config/config.php';
    include 'incl/fun.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'incl/head.php';?>    
    <title>Find movies</title>
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
                    <a class="nav-link active" href="index.php"> Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="favourites.php"> My Favourites</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php"> Contact Us</a>
                  </li> 
                    
                    <li class="nav-item">
                        <?php if(empty($_SESSION['username'])){ ?>
                        
                        <!--NOT Logged user -->
                        <a class="btn-login" href="login.php"><i class="fa fa-user-o"></i> Login </a>
                        
                        <!-- Logged user -->
                        <?php } elseif(!empty($_SESSION['username'])){ ?>
                            <a class="btn-login" href="log-out.php"><i class="fa fa-lock"></i> Log out </a>
                        <?php }?>

                    </li>
                   
                </ul>
              </div>
            </div>
        </nav>
        <!-- End Navbar -->

    <!-- Search form -->
    <form id="form">
        <input type="text" class="form-control" placeholder="Search here.." id="search" class="search" autocomplete="" autofocus>
    </form>
    <!-- // Search form -->

    <!-- Categories -->

    <div id="tags"></div>
    <!-- // Categories -->

    <!-- notices -->
    <div id="notices">
    <?php
        if(isset($_GET['notice']) && ($_GET['notice']) == '0' ){
            echo '<p class="alert alert-success">Saved to favourites successfully!<p>';
        }
        if(isset($_GET['notice']) && ($_GET['notice']) == 'alreadyAdded' ){
            echo '<p class="alert alert-warning">You already saved it on your favourites.<p>';
        }
        if(isset($_GET['notice']) && ($_GET['notice']) == 'InvalidLink' ){
            echo '<p class="alert alert-danger">Invalid link! please try aggain.<p>';
        }
        if(isset($_GET['notice']) && ($_GET['notice']) == 'trySave' ){
            echo '<p class="alert alert-info">Logged-In successfully! Now you can save movies.<p>';
        }
    ?>
    </div>
    <!-- // notices -->

    <!-- Sow movies  -->
    <div id="movies"></div>
    <!-- Sow movies  -->

    <!-- pagination -->
    <div class="pagination">
        <div class="page" id="prev"><i class="fa fa-angle-left" style="font-size: 3em;"></i></div>
        <div class="current" id="current">1</div>
        <div class="page" id="next"> <i class="fa fa-angle-right" style="font-size: 3em;"></i></div>
    </div>
    <!-- // pagination -->

     <!-- footer -->
    <?php include 'incl/footer.php';?>
    <!-- // footer -->

    <script src="assets/js/main.js"></script>
</body>
</html>