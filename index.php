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
	
	$f3->set('PROJECT_ROOT', 'http://psingh50.greenrivertech.net/328/Blogs');
	//Instantiate the database class
	$bloggerDAO = new BloggerDAO();
	$blogPostDAO = new BlogPostDAO();
	
	//Home Page
	$f3->route('GET /', function($f3){
		$bloggers = $GLOBALS['bloggerDAO']->getAllBloggers();
		$f3->set('bloggers', $bloggers);
		echo Template::instance()->render('pages/home.html');
	});
	
	//Login Page
	$f3->route('GET /login', function(){
		echo Template::instance()->render('pages/login.html');
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
		echo Template::instance()->render('pages/sign_up.html');
	});
	
	$f3->route('POST /sign-up', function($f3) {
		$row = array("username" => $_POST['username'], "email" => $_POST['email'], "password" => $_POST['pwd'],
						"verify" => $_POST['verify'], "portrait" => $_POST['portrait'], "bio" => $_POST['bio']);
		$blogger = Blogger::getBloggerInstance($row);
		
		if (strlen($row["username"]) == 0 || strlen($row["password"]) == 0 || $row["password"] != $row["verify"]) {
			echo Template::instance()->render('pages/sign_up.html');
		} else {
			$blogger->setPortrait(getUploadedPhoto($row['username']));
			$id = $GLOBALS['bloggerDAO']->createBlogger($blogger);
			$blogger->setId($id);
			$blogPosts = array();
			$f3->set('blogger', $blogger);
			$f3->set('blogPosts', $blogPosts);
			echo Template::instance()->render('pages/logged_in_user_blogs.html');
		}		
	});
	
	//View users blogs
	$f3->route('GET /viewBlogs/blogger/@id', function($f3, $params){
		$blogger = $GLOBALS['bloggerDAO']->getBloggerById($params['id']);
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
		$f3->set('blogger', $blogger);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/user_blogs.html');
	});
	
		//View user blog
	$f3->route('GET /viewBlog/blogger/@bloggerId/blogPost/@blogPostId', function($f3, $params){
		$blogger = $GLOBALS['bloggerDAO']->getBloggerById($params['bloggerId']);
		$blogPost = $GLOBALS['blogPostDAO']->getBlogPost($params['blogPostId']);
		$f3->set('blogger', $blogger);
		$f3->set('blogPost', $blogPost);
		echo Template::instance()->render('pages/user_blog.html');
	});
	
	//Logged In User Blogs
	$f3->route('GET /my-blogs/@id', function($f3, $params) {
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
		$f3->set('blogger', $_SESSION['user']);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/logged_in_user_blogs.html');
	});
	
	//Create a BLog Post
	$f3->route('GET /blogger/@id/createBlog', function($f3, $params) {
		if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
			echo Template::instance()->render('pages/login.html');
		} else {
			$f3->set('bloggerId', $params['id']);
			echo Template::instance()->render('pages/create_blog.html');
		}		
	});
	
	$f3->route('POST /blogger/@id/createBlog', function($f3, $params) {
		if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
			echo Template::instance()->render('pages/login.html');
		} else {
			//create the new blog post
			$row = array("title" => $_POST['title'], "blogger_id" => $params['id'], "blog_content" => $_POST['blog-content']);
			$blogPost = BlogPost::getBlogPostInstance($row);
			$blogPostId = $GLOBALS['blogPostDAO']->createBlogPost($blogPost);
			
			//load the updated set of blogs
			$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['id']);
			$f3->set('blogger', $_SESSION['user']);
			$f3->set('blogPosts', $blogPosts);
			echo Template::instance()->render('pages/logged_in_user_blogs.html');
		}		
	});
	
	//Update a Blog Post
	$f3->route('GET /blogger/@bloggerId/updateBlogPost/@blogPostId', function($f3, $params) {
		$blogPost = $GLOBALS['blogPostDAO']->getBlogPost($params['blogPostId']);
		
		$f3->set('bloggerId', $params['bloggerId']);
		$f3->set('blogPost', $blogPost);
		echo Template::instance()->render('pages/update_blog.html');
	});
	
	$f3->route('POST /blogger/@bloggerId/updateBlogPost/@blogPostId', function($f3, $params) {
		//update the blog post
		$blogPost = $GLOBALS['blogPostDAO']->getBlogPost($params['blogPostId']);
		$row = array("title" => $_POST['title'], "blog_content" => $_POST['blog-content']);
		$blogPost->setTitle($row['title']);
		$blogPost->setBlogContent($row['blog_content']);
		$blogPost = $GLOBALS['blogPostDAO']->updateBlogPost($blogPost);
		
		//load the updated set of blogs
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['bloggerId']);
		$f3->set('blogger', $_SESSION['user']);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/logged_in_user_blogs.html');
	});
	
	//Delete a Blog Post
	$f3->route('GET /blogger/@bloggerId/deleteBlogPost/@blogPostId', function($f3, $params) {
		//delete the blog post
		$blogPost = $GLOBALS['blogPostDAO']->deleteBlogPost($params['blogPostId']);
		
		//load the updated set of blogs
		$blogPosts = $GLOBALS['blogPostDAO']->getBlogPosts($params['bloggerId']);
		$f3->set('blogger', $_SESSION['user']);
		$f3->set('blogPosts', $blogPosts);
		echo Template::instance()->render('pages/logged_in_user_blogs.html');
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
	
	/**
	 * This is the helper function to move the uploaded profile photo to
	 * a permanent location.
	 *
	 * @return string The name of the uploaded photo if upload was successful
	 * and the name of the default profile photo otherwise.
	*/
	function getUploadedPhoto($username) {
		//Only accept jpeg, png, or jpg file types
		if (isset($_FILES["profilePhoto"]) and $_FILES["profilePhoto"]["error"] == UPLOAD_ERR_OK) {
			if ($_FILES["profilePhoto"]["type"] != "image/jpeg" && $_FILES["profilePhoto"]["type"] != "image/png"
				&& $_FILES["profilePhoto"]["type"] != "image/jpg") {
				//return the location and name of the default profile photo
				return "generic-user.png";
			}
			if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"],
								   "images/" . $username . "_" . basename($_FILES["profilePhoto"]["name"]))) {
				//return name of the uploaded photo
				return $username . "_" . basename($_FILES["profilePhoto"]["name"]);
			}
		}
		//return the name of the default profile photo
		return "generic-user.png";
	}
	
	$f3->run();
?>