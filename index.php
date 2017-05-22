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
	$f3->route('GET /', function($f3){
		$bloggers = $GLOBALS['bloggerDAO']->getAllBloggers();
		$f3->set('bloggers', $bloggers);
		echo Template::instance()->render('pages/home.html');
	});
	
	//View users blogs
	$f3->route('GET /viewBlogs/blogger/@id', function($f3, $params){
		$blogger = $GLOBALS['bloggerDAO']->getBloggerById($params['id']);
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
		$f3->set('blogger', $blogger);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/user_blogs.html');
	});
	
	//Login Page
	$f3->route('GET /login', function(){
		$view = new View;
		echo $view->render('pages/login.html');
	});
	
	$f3->route('POST /login', function($f3) {
		$blogger = $GLOBALS['bloggerDAO']->validateLoginUser($_POST['username'], $_POST['pwd']);
		$view = new View;
		if ($blogger == NULL) {
			echo $view->render('pages/login.html');
		} else {
			$_SESSION['user'] = $blogger;
			$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($blogger->getId());
			$f3->set('blogger', $blogger);
			$f3->set('blogPosts', $blogPosts);
			echo Template::instance()->render('pages/logged_in_user_blogs.html');
		}
	});
	
	//Signup Page
	$f3->route('GET /sign-up', function() {
		$view = new View;
		echo $view->render('pages/sign_up.html');
	});
	
	$f3->route('POST /sign-up', function($f3) {
		$row = array("username" => $_POST['username'], "email" => $_POST['email'], "password" => $_POST['pwd'],
						"verify" => $_POST['verify'], "portrait" => $_POST['portrait'], "bio" => $_POST['bio']);
		$blogger = Blogger::getBloggerInstance($row);
		
		$view = new View;
		if ($row["pwd"] != $row["verify"] || strlen($row["username"]) == 0 || strlen($row["password"]) == 0) {
			echo $view->render('pages/sign_up.html');
		} else {
			$id = $GLOBALS['bloggerDAO']->createBlogger($blogger);
			$blogger->setId($id);
			$blogPosts = array();
			$f3->set('blogger', $blogger);
			$f3->set('blogPosts', $blogPosts);
			echo $view->render('pages/logged_in_user_blogs.html');
		}		
	});
	
	//Logged In User Blogs
	$f3->route('GET /my-blogs/@id', function($f3, $params) {
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
		$f3->set('blogger', $_SESSION['user']);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/logged_in_user_blogs.html');
	});
	
	//Create a BLog Post
	$f3->route('GET /createBlog/@id', function($f3, $params) {
		$view = new View;
		
		if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
			echo $view->render('pages/login.html');
		} else {
			$f3->set('bloggerId', $params['id']);
			echo Template::instance()->render('pages/create_blog.html');
		}		
	});
	
	$f3->route('POST /createBlog/@id', function($f3, $params) {
		$view = new View;
		
		if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
			echo $view->render('pages/login.html');
		} else {
			$row = array("title" => $_POST['title'], "blogger_id" => $params['id'], "blog_content" => $_POST['blog-content']);
			$blogPost = BlogPost::getBlogPostInstance($row);
			$blogPostId = $GLOBALS['blogPostDAO']->createBlogPost($blogPost);
			
			$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
			$f3->set('blogger', $_SESSION['user']);
			$f3->set('blogPosts', $blogPosts);
			echo $view->render('pages/logged_in_user_blogs.html');
		}		
	});
	
	//Update a Blog Post
	$f3->route('GET /blogger/@bloggerId/updateBlogPost/@blogPostId', function() {
		$view = new View;
		echo $view->render('pages/');
	});
	
	//Delete a Blog Post
	$f3->route('GET /blogger/@bloggerId/deleteBlogPost/@blogPostId', function() {
		$view = new View;
		echo $view->render('pages/');
	});
	
	//About Us Page
	$f3->route('GET /about-us', function() {
		$view = new View;
		echo $view->render('pages/about_us.html');
	});
	
	//Logout
	$f3->route('GET /logout', function() {
		session_unset();
		session_destroy();
		$view = new View;
		echo $view->render('pages/login.html');
	});
	
	$f3->run();
?>