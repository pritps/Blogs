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
			  <li><a href="<?= $PROJECT_ROOT ?>/blogger/<?= $blogger->getId() ?>/createBlog"><h4>Create Blog &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/about-us"><h4>About Us &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/logout"><h4>Log Out &gt;</h4></a></li>
			</ul>			
		</nav>
		<div class="container">
			<div class="row top-margin-30 left-margin-20 light-grey-background">
				<div class="col-md-8">
					<h2>Your blogs</h2>
				</div>
				<div class="col-md-4">
					<img src="<?= $PROJECT_ROOT ?>/images/user.png" alt="User Portrait" class="img-responsive pull-right" width="150" height="150">
				</div>
			</div>
			<div class="row top-margin-10 left-margin-20">
				<div class="col-md-8 light-grey-background">
					<div class="row top-margin-30">
						<div class="col-md-10 col-md-offset-1 dark-grey-background">
							<table class="table">
								<thead>
									<tr>
									  <th>Blog</th>
									  <th>Update</th>
									  <th>Delete</th>
									</tr>
								  </thead>
								  <tbody>
									<?php foreach (($blogPosts?:[]) as $blogPost): ?>
										<tr class="light-grey-background">
											<td><?= $blogPost->getTitle() ?></td>
											<td><a href="<?= $PROJECT_ROOT ?>/blogger/<?= $blogger->getId() ?>/updateBlogPost/<?= $blogPost->getId() ?>"><span class="glyphicon glyphicon-wrench"></span></a></td>
											<td><a href="<?= $PROJECT_ROOT ?>/blogger/<?= $blogger->getId() ?>/deleteBlogPost/<?= $blogPost->getId() ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
										</tr>
									<?php endforeach; ?>
								  </tbody>								  
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-3 light-grey-background col-md-offset-1">
					<h5 class="text-center"><strong><?= $blogger->getUsername() ?></strong></h5><hr>
					<p>Bio: <?= $blogger->getBio() ?></p>
				</div>
			</div>
		</div><!-- container -->
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>