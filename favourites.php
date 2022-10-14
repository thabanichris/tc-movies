<?php
require_once 'config/config.php';
include 'incl/fun.php';
include 'incl/deleteMovies.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'incl/head.php';?>
    <title>Favourites</title>
</head>
<body>
    
<!-- Navbar -->
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
                    <a class="nav-link active" href="favourites.php"> My Favourites</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php"> Contact Us</a>
                  </li> 
                    
                    <li class="nav-item">
                        <?php if(empty($_SESSION['username'])){ ?>
                        
                        <!--NOT Logged user -->
                        <a class="btn btn-login" href="login.php"><i class="fa fa-user-o"></i> Login </a>
                        
                        <!-- Logged user -->
                        <?php } elseif(!empty($_SESSION['username'])){ ?>
                            <a class="btn btn-login" href="log-out.php"><i class="fa fa-lock"></i> Log out </a>
                        <?php }?>

                    </li>
                   
                </ul>
              </div>
            </div>
        </nav>
<!-- Navbar -->
  </div>
    <!-- header-area-end -->
    
    <?php
        if(!empty($_SESSION['username'])) {
    ?>
    <div class="movie-list-area section-ptb-50 bg-black-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-12 me-auto ms-auto">
                    <div class="movie-list-top-bar">
                        <div class="movie-list-title">
                            <h2 class="title">My Favourites</h2>
                        </div>
                        <div class="movie-list-clear">
                            <a href="favourites.php?removeAll=<?=$username;?>&verify=<?=md5($username);?>&user=<?=$username;?>" class="Watch-list-clear-btn">Clear All</a>
                        </div>
                    </div><br>
                    <?php
                        if(isset($err)){echo $err;}
                    ?>
                    <div class="movielist-wrap">
                    <!-- Show Favourites movies  -->
                    <?php
                        $sql = mysqli_query($con,"SELECT * FROM tc_favourites WHERE tc_liked_by='jointheteam' order by id DESC");
                        if (mysqli_num_rows($sql)>0) {
                            while( $row = mysqli_fetch_assoc($sql)){
                                echo '
                                    <div class="single-movielist">
                                        <div class="movielist-img-content">
                                            <div class="movielist-img">
                                                <a href="movie-details.html">
                                                    <img src="'.$row['tc_movie_img'].'" alt="'.$row['tc_movie_img'].'">
                                                    <i class="zmdi zmdi-play play-btn-style"></i>
                                                </a>
                                            </div>
                                            <div class="movielist-content">
                                                <h3 class="title"><a href="movie-details.html">'.$row['tc_movie_title'].'</a></h3>
                                                <p>'.$row['tc_movie_overview'].'</p>
                                                <p class="text"> ~ '.$row['tc_release_date'].'</p>
                                            </div>
                                        </div>
                                        <div class="movielist-close">
                                            <a class="movielist-close-btn" href="favourites.php?remove='.$row['id'].'&verify='.md5($row['id']).'" class="btn btn-outline-light" id="'.$row['id'].'"><i class="fa fa-times"></i> </a>
                                        </div>
                                    </div>
                                ';
                            }
                        }else{
                            echo '<p class="alert alert-light">You haven\'t added any movies into favourites. <a href="index.php">go to movies</a></p>';
                        }
             
                        // END Favourites movies 
                        }else{
                            //echo '<p class="alert alert-danger">Log is required! <a href="login.php">login here</a></p>';
                            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <?php include 'incl/footer.php';?>
    <!-- // footer -->

</body>
</html>