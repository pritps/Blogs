<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!--Custom CSS-->
		<link rel="stylesheet" href="../../styles/styles.css">
		<link rel="stylesheet" href="../../styles/sidebar.css">
		<title>The Blog Site</title>
	</head>
	<body>
		<nav class="navbar navbar-fixed-left">
			<div class="navbar-header brand">
			  <h1 class="text-center">Blog Site</h1>
			  <img class="img-responsive" src="../../images/trumpet.png" width="150" height="125">
			</div>
			<ul class="nav navbar-nav nav-items">
			  <li class="active"><a href="http://psingh50.greenrivertech.net/328/Blogs/"><h4>Home &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/sign-up"><h4>Become a Blogger &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/about-us"><h4>About Us &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/login"><h4>Login &gt;</h4></a></li>
			</ul>			
		</nav>
		<div class="container">
			<div class="row top-margin-30 light-grey-background left-margin-20">
				<div class="col-md-12 text-center"><h3><strong><?= $blogger->getUsername() ?> Blogs</strong></h3></div>
			</div><!-- row -->
			<div class="row top-margin-10 left-margin-20">
				<div class="col-md-8">
					<div class="row top-margin-10">
						<div class="col-md-12 light-grey-background">
							<h4><a href="#"><strong>My most recent blog:</strong></a></h4>
							<p>Excerpt:This is suppose to be an excerpt to my most recent blog, but there is no field to capture that.</p>
						</div>
					</div>
					<div class="row top-margin-10">
						<div class="col-md-12 light-grey-background">
							<h4>My blogs:</h4><hr>
							<?php foreach (($blogPosts?:[]) as $blogPost): ?>
								<p><a href="./viewBlog/blogger/<?= $blogger->getId() ?>/blogPost/<?= $blogPost->getId() ?>"><?= $blogPost->getTitle() ?></a> - word count <?= $blogPost->getWordCount() ?> - <?= $blogPost->getCreatedDate() ?></p>
								<hr>
							<?php endforeach; ?>
						</div>
					</div>
				</div><!-- col-md-6 -->
				<div class="col-md-3 top-margin-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-12 text-center">
							<img src="../../images/generic-user.png" alt="User Portrait" class="img-responsive">
						</div>
					</div>
					<div class="row top-margin-10">
						<div class="col-md-12 light-grey-background">
							<h5 class="text-center"><strong><?= $blogger->getUsername() ?></strong></h5><hr>
							<p>Bio: <?= $blogger->getBio() ?></p>
						</div>
					</div>
				</div><!-- col-md-4 -->
			</div><!-- row -->
		</div><!-- container -->
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>