<?php
	/*
	*Author: Pritpal Singh
	*Date: 05/18/2017
	*Description: My Bloggin Website Controller
	*/
	require_once('vendor/autoload.php');
	session_start();
	
	$f3 = Base::instance();
	
	//Set Debug Mode
	$f3->set('DEBUG', 3);
	
	//Instantiate the database class
	$bloggerDAO = new BloggerDAO();
	$blogPostDAO = new BlogPostDAO();
	
	//Home Page
	$f3->route('GET /', function(){
		$view = new View;
		echo $view->render('pages/home.html');
	});
	/**
	 * This is the helper function to move the uploaded profile photo to
	 * a permanent location.
	 *
	 * @return string The name of the uploaded photo if upload was successful
	 * and the name of the default profile photo otherwise.
	*/
	function processUploadedPhoto() {
		//Only accept jpeg, png, or jpg file types
		if (isset($_FILES["profilePhoto"]) and $_FILES["profilePhoto"]["error"] == UPLOAD_ERR_OK) {
			if ($_FILES["profilePhoto"]["type"] != "image/jpeg" && $_FILES["profilePhoto"]["type"] != "image/png"
				&& $_FILES["profilePhoto"]["type"] != "image/jpg") {
				//return the location and name of the default profile photo
				return "profile.png";
			}
			if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"],
								   "images/" . basename($_FILES["profilePhoto"]["name"]))) {
				//return the location and name of the uploaded photo
				return basename($_FILES["profilePhoto"]["name"]);
			}
		}
		//return the name of the default profile photo
		return "profile.png";
	}
?>