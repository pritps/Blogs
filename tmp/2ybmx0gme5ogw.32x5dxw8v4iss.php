<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!--Custom CSS-->
		<link rel="stylesheet" href="<?= $PROJECT_ROOT ?>/styles/styles.css">
		<link rel="stylesheet" href="<?= $PROJECT_ROOT ?>/styles/sidebar.css">
		<title>The Blog Site</title>
	</head>
	<body>
		<nav class="navbar navbar-fixed-left">
			<div class="navbar-header brand">
			  <h1 class="text-center">Blog Site</h1>
			  <img class="img-responsive" src="<?= $PROJECT_ROOT ?>/images/trumpet.png" width="150" height="125">
			</div>
			<ul class="nav navbar-nav nav-items">
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/"><h4>Home &gt;</h4></a></li>
			  <?php if (!isset($SESSION['user']) || empty($SESSION['user'])): ?>
				
					<li><a href="http://psingh50.greenrivertech.net/328/Blogs/sign-up"><h4>Become a Blogger &gt;</h4></a></li>
					<li><a href="http://psingh50.greenrivertech.net/328/Blogs/login"><h4>Login &gt;</h4></a></li>
				
				<?php else: ?>
					<li><a href="http://psingh50.greenrivertech.net/328/Blogs/my-blogs/<?= $bloggerId ?>"><h4>My Blogs &gt;</h4></a></li>
					<li><a href="<?= $PROJECT_ROOT ?>/blogger/<?= $bloggerId ?>/createBlog"><h4>Create Blog &gt;</h4></a></li>
					<li><a href="http://psingh50.greenrivertech.net/328/Blogs/logout"><h4>Logout &gt;</h4></a></li>
				
			  <?php endif; ?>			  
			</ul>			
		</nav>
		<div class="container">
			<div class="jumbotron top-margin-30 left-margin-20">
				<div class="row">
					<div class="col-md-10">
						<h1>The Blog site</h1> 
						<p>Your one-stop shop for internet blogs</p>
					</div>
					<div class="col-md-2 pull-right">
						<img src="./images/blog_logo.png" width="150" height="150">
					</div>					
				</div>
			</div>
			<div class="jumbotron top-margin-30 left-margin-20">
				<h4><strong>The internet is abuzz with our blog content.</strong></h4><hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut porta dui. Nam
					maximus et mauris eu tempor. Nulla rhoncus lorem pharetra molestie blandit. Set
					pellentesque lacus quis aliquam maximus. Integer sodales eget purus vitae condimentum.
					Phasellus neque neque, rutrum ut mattis ut, tinicidunt eget ante. Vivamus
					faucibus augue in euismod ultrices. 
				</p><hr>
				<h4><strong>Hear what others are saying about us!</strong></h4>
				<div id="comments">
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut porta dui. Nam
						maximus et mauris eu tempor." - long time user Sally Nguyen
					</p>
					<p>"Lorem ipsum dolor sit amet, consectetur..." - blog contributer Terry Stone
					</p>
				</div>
			</div>
		</div>
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>