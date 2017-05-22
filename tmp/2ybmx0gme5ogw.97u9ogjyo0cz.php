<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!--Custom CSS-->
		<link rel="stylesheet" href="../styles/styles.css">
		<link rel="stylesheet" href="../styles/sidebar.css">
		<title>The Blog Site</title>
	</head>
	<body>
		<nav class="navbar navbar-fixed-left">
			<div class="navbar-header brand">
			  <h1 class="text-center">Blog Site</h1>
			  <img class="img-responsive" src="../images/trumpet.png" width="150" height="125">
			</div>
			<ul class="nav navbar-nav nav-items">
			  <li class="active"><a href="http://psingh50.greenrivertech.net/328/Blogs/"><h4>Home &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/my-blogs"><h4>My Blogs &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/about-us"><h4>About Us &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/login"><h4>Log Out &gt;</h4></a></li>
			</ul>			
		</nav>
		<div class="container">
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-10">
						<h1>What's on your mind?</h1> 
					</div>
					<div class="col-md-2 pull-right">
						<img src="../images/writing.png" width="175" height="200">
					</div>					
				</div>
			</div>
			<div class="jumbotron">
				<form action="../createBlog/<?= $bloggerId ?>" method="post" class="form-horizontal">
					<div class="row">
						<div class="form-group">
							<div class="col-md-4 col-md-push-8 text-center title-lbl">
								<label class="control-label" for="title">Title</label>
							</div>
							<div class="col-md-8 col-md-pull-4 title-field">
								<input type="text" class="form-control" id="title" name="title">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label class="control-label" for="blog-content">Blog Entry</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea class="form-control" id="blog-content" name="blog-content" rows="10"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary btn-lg"><h4>Save</h4></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>