    <?php

    function get_username($user){
        global $con;
        $sql = mysqli_query($con,"SELECT * FROM tc_users WHERE tc_email='$user' OR tc_username='$user'");
        $row = mysqli_fetch_assoc($sql);
        return $row['tc_username'];
    }

    function user_attempts($user){
        global $con;
        $sql = mysqli_query($con,"SELECT * FROM tc_users WHERE tc_email='$user' OR tc_username='$user'");
        $row = mysqli_fetch_assoc($sql);
        return $row['log_attempts'];
    }
    function user_lockout_time($user){
        global $con;
        $sql = mysqli_query($con,"SELECT * FROM tc_users WHERE tc_email='$user' OR tc_username='$user'");
        $row = mysqli_fetch_assoc($sql);
        return $row['blocked_until'];
    }

    function set_user_lockout_time($user){
        global $con;
        // SET Lockout time
        $next_15min = date('H:i:s',strtotime("+15 minutes"));
        $sql = mysqli_query($con,"UPDATE tc_users SET log_attempts=log_attempts+1,blocked_until='$next_15min' WHERE tc_email='$user' OR tc_username='$user'");
        return $sql;
    }

    function add_log_attempts($user){
        global $con;
        $sql = mysqli_query($con,"UPDATE tc_users SET log_attempts=log_attempts+1 WHERE tc_email='$user' OR tc_username='$user'");
        return $sql;
    }

    function checkMovieId($username,$movieId){
        global $con;
        $sql = mysqli_query($con,"SELECT * FROM tc_favourites WHERE tc_liked_by='$username' AND tc_movie_id='$movieId'");
        $rows = mysqli_num_rows($sql);
        return $rows;
    }

    function addToFav($username,$movieId,$movieTitle,$movieImg,$movieRelease_date,$movieOverview,$date){
        global $con;
        $sql = mysqli_query($con,"INSERT INTO tc_favourites (tc_liked_by,tc_movie_id,tc_movie_title,tc_movie_img,tc_release_date,tc_movie_overview,tc_date_liked) values ('$username','$movieId','$movieTitle','$movieImg','$movieRelease_date','$movieOverview','$date')");
    }

    