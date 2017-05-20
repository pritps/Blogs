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
	
	//Login Page
	$f3->route('GET /login', function(){
		$view = new View;
		echo $view->render('pages/login.html');
	});
	
	//Signup Page
	$f3->route('GET /sign-up', function() {
		$view = new View;
		echo $view->render('pages/sign_up.html');
	});
	
	//About Us Page
	$f3->route('GET /about-us', function() {
		$view = new View;
		echo $view->render('pages/about_us.html');
	});
	
	$f3->run();
?>