<?php

if(isset($_POST['doLogin'])){

    // Set Vars
    $user = strip_tags($_POST['user']); //Remove html tags
    $user = str_replace(' ', '', $user); //remove spaces

    $password = md5($_POST['password']); //Encrypt password
            
    $check_user = mysqli_query($con,"SELECT * FROM tc_users WHERE tc_email='$user' OR tc_username='$user'");
    $check_user_password = mysqli_query($con,"SELECT * FROM tc_users WHERE tc_email='$user' AND tc_password='$password' OR tc_username='$user' AND tc_password='$password'");
    
    // verify username / email
    if(mysqli_num_rows($check_user) < 1){
        $err = '<li class="alert alert-danger">Invalid Email / Username</li>';
    }
    // verify Password
    elseif(mysqli_num_rows($check_user_password) < 1){
        $err = '<li class="alert alert-danger">Invalid Password</li>';
        
        if(user_attempts($user) >= 2){
            set_user_lockout_time($user); // Block after attempt
        }else{
            add_log_attempts($user); // Add attempt
        }
    }
    // verify user_attempts
    elseif(user_attempts($user) >'2' && date('H:i:s') < user_lockout_time($user)){
        $err = '<li class="alert alert-danger">Account locked until '.user_lockout_time($user).'</li>';
    }
    else{
        // Clear log attempts
        $update_log_attempts = mysqli_query($con,"UPDATE tc_users SET log_attempts=0,blocked_until='00:00:00' WHERE tc_email='$user' OR tc_username='$user'"); 
        
        // Get User account details
        $get_user_data = mysqli_query($con,"SELECT tc_email,tc_username FROM tc_users WHERE tc_email = '$user' OR tc_username = '$user'");
        $user_row = mysqli_fetch_assoc($get_user_data);
        // Create username AND Sessions
        $username = $_SESSION['username'] = $user_row['tc_username'];
        $_SESSION['logged']=1;
        
        if(isset($_GET['redirect'])){
            $redirectLink = $_GET['redirect'];
            header('Location: '.$redirectLink);
        }else{
            header('Location: index.php'); 
        }
               
    }
}

?>