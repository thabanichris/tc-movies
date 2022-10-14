<?php

require_once 'config/config.php';
include 'incl/fun.php';

if (empty($_SESSION['username'])) {
	// Require login
	$redirectLink = 'index.php?notice=trySave';

    header('Location: login.php?redirect='.$redirectLink);
    die();
}else{
	echo $username = $_SESSION['username'];
}

// GET MOVIE ID & TITLE
if(isset($_GET['like']) && isset($_GET['title']) && isset($_GET['img']) && isset($_GET['release_date']) && isset($_GET['overview'])){
	$movieId = $_GET['like'];
	$movieTitle = $_GET['title'];
	$movieImg = $_GET['img'];
	$movieRelease_date = $_GET['release_date'];
	$movieOverview = $_GET['overview'];
	$movieOverview = str_replace("'","\'",$movieOverview);
	$movieTitle = str_replace("'","\'",$movieTitle);

	if (empty($_GET['like']) || empty($_GET['title']) || empty($_GET['release_date']) || empty($_GET['overview'])) {
		// if ID is empty
		//die('Invalid Link. Please try again.');
		header('Location: index.php?notice=InvalidLink');
	}
	elseif (checkMovieId($username,$movieId)>0) {
		// Prevent like duplicates
		// Redirect back if already added
		header('Location: index.php?notice=alreadyAdded');
	}else{
		// add into favourites
		if (addToFav($username,$movieId,$movieTitle,$movieImg,$movieRelease_date,$movieOverview,$date)) {
			// Redirect to index successfully
			header('Location: index.php?notice=likeAdded');
		}else{
			header('Location: index.php?notice=0');
		}
	}


}
?>