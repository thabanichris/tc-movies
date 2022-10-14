<?php
    if(isset($_POST['sendMessage'])){
    	// Variables
       	$fullname =strip_tags($_POST['name']);
        $email = $_POST['email'];
        $subject = strip_tags($_POST['subject']);
        $message = strip_tags($_POST['message']);

        /// confirm inputs are not empty
        if (!empty($fullname) && !empty($email) && !empty($subject) && !empty($message) ) {
        	// insert into database
        	if($insert_query = mysqli_query($con,"INSERT INTO tc_inbox (tc_from,tc_msg,tc_email,tc_status,tc_date) values ('$fullname','$message','$email','Unread','$date')")){
        		$notice = '<p class="alert alert-success">Message sent successfully!<p>';
        	}else{
        		$notice = '<p class="alert alert-warning">Message Not sent. Try later..<p>';
        	}
        }else{
        	$notice = '<p class="alert alert-danger">All fields are required!<p>';
        }
    }
?>