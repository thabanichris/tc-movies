<?php

// REMOVE 1 MOVIE FROM FAV
if(isset($_GET['remove']) && isset($_GET['verify'])){
    $idd = $_GET['remove'];
    $verify = $_GET['verify'];
    if($verify != md5($idd)){
        $err = '<p class="alert alert-warning">Invalid link. Try again.<p>';
        header('refresh:3;url=favourites.php');
    }else{
        // verify if is te owner
        $sql_verify_owner = mysqli_query($con,"SELECT * FROM tc_favourites WHERE tc_liked_by='$username' AND id='$idd'");
        if(mysqli_num_rows($sql_verify_owner)>0){
            // delete
            $deleteMovie = mysqli_query($con,"DELETE FROM tc_favourites WHERE id='$idd' limit 1");
            $err = '<p class="alert alert-success">Removed successfully.<p>';
            header('refresh:3;url=favourites.php');
        }else{
            $err = '<p class="alert alert-warning">You are not owner of this like.<p>';
            header('refresh:3;url=favourites.php');
        }
    }

}

// REMOVE ALL MOVIES FROM FAVs
if(isset($_GET['removeAll']) && isset($_GET['verify'])  && isset($_GET['user'])){
    $user = $_GET['user'];
    $verify = $_GET['verify'];
    if($verify != md5($username)){
        $err = '<p class="alert alert-warning">Invalid link. Try again.<p>';
        header('refresh:3;url=favourites.php');
    }else{
        // verify if is te owner
        $sql_verify_owner = mysqli_query($con,"SELECT * FROM tc_favourites WHERE tc_liked_by='$username'");
        if(mysqli_num_rows($sql_verify_owner)>0){
            // delete
            $deleteMovie = mysqli_query($con,"DELETE FROM tc_favourites WHERE tc_liked_by='$username' ");
            $err = '<p class="alert alert-success">Removed successfully.<p>';
            header('refresh:3;url=favourites.php');
        }else{
            $err = '<p class="alert alert-warning">You are not owner of this like.<p>';
            header('refresh:3;url=favourites.php');
        }
    }

}

?>