<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
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
			  <img class="img-responsive" src="./images/trumpet.png" width="150" height="125">
			</div>
			<ul class="nav navbar-nav nav-items">
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/sign-up"><h4>Become a Blogger &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/about-us"><h4>About Us &gt;</h4></a></li>
			  <?php if (!isset($SESSION['user']) || empty($SESSION['user'])): ?>
				<li><a href="http://psingh50.greenrivertech.net/328/Blogs/login"><h4>Login &gt;</h4></a></li>
				<?php else: ?><li><a href="http://psingh50.greenrivertech.net/328/Blogs/logout"><h4>Login &gt;</h4></a></li>
			  <?php endif; ?>
			</ul>			
		</nav>
		<div class="container">
			<div class="row left-margin-20">
				<?php foreach (($bloggers?:[]) as $blogger): ?>
				<div class="col-md-4">					
					<div class="thumbnail">
						<img src="<?= $PROJECT_ROOT ?>/images/<?= $blogger->getPortrait() ?>" alt="User Portrait" class="img-responsive">
						<p class="text-center"><?= $blogger->getUsername() ?> Blogger</p>
						<hr>
						<div class="row">							
							<div class="col-md-6"><a href="<?= $PROJECT_ROOT ?>/viewBlogs/blogger/<?= $blogger->getId() ?>">view blogs</a></div>
							<div class="col-md-6 text-right">Total: <?= $blogger->getBlogCount() ?></div>							
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<p>This is suppose to be an excerpt to my most recent blog, but there is no field to capture that.</p>
							</div>
						</div>
					</div>					
				</div><!-- col-md-4 -->
				<?php endforeach; ?>
			</div><!-- row -->
		</div><!-- container -->
		
		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>