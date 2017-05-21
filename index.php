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
	
	//Login Page
	$f3->route('POST /login', function() {
		$blogger = $GLOBALS['bloggerDAO']->validateLoginUser($_POST['username'], $_POST['pwd']);
		$view = new View;
		if ($blogger == NULL) {
			echo $view->render('pages/login.html');
		} else {
			echo $view->render('pages/logged_in_user_blogs.html');
		}
	});
	
	//Signup Page
	$f3->route('GET /sign-up', function() {
		$view = new View;
		echo $view->render('pages/sign_up.html');
	});
	
	$f3->route('POST /sign-up', function() {
		$row = array("username" => $_POST['username'], "email" => $_POST['email'], "password" => $_POST['pwd'],
						"verify" => $_POST['verify'], "portrait" => $_POST['portrait'], "bio" => $_POST['bio']);
		$blogger = Blogger::getBloggerInstance($row);
		
		$view = new View;
		if ($row["pwd"] != $row["verify"] || strlen($row["username"]) == 0 || strlen($row["password"]) == 0) {
			echo $view->render('pages/sign_up.html');
		} else {
			$id = $GLOBALS['bloggerDAO']->createBlogger($blogger);
			echo $view->render('pages/login.html');
		}		
	});
	
	//About Us Page
	$f3->route('GET /about-us', function() {
		$view = new View;
		echo $view->render('pages/about_us.html');
	});
	
	//Logged In User Blogs
	$f3->route('GET /my-blogs', function() {
		$view = new View;
		echo $view->render('pages/logged_in_user_blogs.html');
	});
	
	$f3->run();
?>