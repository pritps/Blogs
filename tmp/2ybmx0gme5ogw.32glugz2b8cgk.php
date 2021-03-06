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
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/about-us"><h4>About Us &gt;</h4></a></li>
			  <li><a href="http://psingh50.greenrivertech.net/328/Blogs/login"><h4>Login &gt;</h4></a></li>
			</ul>			
		</nav>
		<div class="container">
			<div class="jumbotron left-margin-20 top-margin-30">
				<div class="row">
					<div class="col-md-10">
						<h1>Become a Blogger!</h1> 
						<p>Create a new account below</p>
					</div>
					<div class="col-md-2 pull-right">
						<img src="<?= $PROJECT_ROOT ?>/images/writing.png" width="175" height="200">
					</div>					
				</div>
			</div>
			<div class="jumbotron left-margin-20">
				<form action="<?= $PROJECT_ROOT ?>/sign-up" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-5">
							<div class="row login-fields">
								<div class="form-group">
									<div class="col-md-4 col-md-push-8 text-center username-lbl">
										<label class="control-label sign-up-form-label lbl-centered" for="username">Username</label>
									</div>
									<div class="col-md-8 col-md-pull-4 username-field">
										<input type="text" class="form-control" id="username" name="username">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4 col-md-push-8 text-center email-lbl">
										<label class="control-label sign-up-form-label lbl-centered" for="email">Email</label>
									</div>
									<div class="col-md-8 col-md-pull-4 email-field">
										<input type="email" class="form-control" id="email" name="email">
									</div>
								</div>
							</div>
							<div class="row login-fields top-margin-10">
								<div class="form-group">
									<div class="col-md-4 col-md-push-8 text-center pwd-lbl">
										<label class="control-label sign-up-form-label lbl-centered" for="pwd">Password</label>
									</div>
									<div class="col-md-8 col-md-pull-4 pwd-field">
										<input type="password" class="form-control" id="pwd" name="pwd">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4 col-md-push-8 text-center verify-lbl">
										<label class="control-label sign-up-form-label lbl-centered" for="verify">Verify</label>
									</div>
									<div class="col-md-8 col-md-pull-4 verify-field">
										<input type="password" class="form-control" id="verify" name="verify">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<div class="row">
								<div class="form-group">
									<div class="col-md-8">
										<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
										<input type="file" class="form-control" id="profilePhoto" name="profilePhoto" value=""/>
									</div>
									<div class="bordered-lbl">
										<div class="col-md-4 text-center">
											<label class="control-label " for="profilePhoto">Upload Portrait</label>
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="form-group">
									<div class="bordered-lbl">
										<div class="col-md-12 text-center">
											<label class="control-label " for="bio">Quick Biography</label>
										</div>
									</div>
									<div class="col-md-12 top-margin-10">
										<textarea class="form-control" id="biography" name="bio" rows="7"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row top-margin-30">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary btn-lg"><h4>Start Blogging!</h4></button>
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