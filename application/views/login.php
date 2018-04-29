


<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
						<li class="active">Page Login</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->

			<?php
			if(isset($_GET['failure'])) {
			?>
			<div class="alert alert-danger">
				Invalid username or password
			</div>
			<?php		
			}
			?>

			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg" style="background-image:url('images/background-img-6.jpg');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title">Login</h2>
								<form class="form-horizontal" method="post" action='<?=base_url('login_submit')?>'>
									<div class="form-group has-feedback">
										<label for="inputUserName" class="col-sm-3 control-label">User Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="username" placeholder="User Name" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputPassword" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="password" placeholder="Password" required>
											<i class="fa fa-lock form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<div class="checkbox">
												<label>
													<input type="checkbox" required> Remember me.
												</label>
											</div>											
											<button type="submit" class="btn btn-group btn-default btn-animated">Log In <i class="fa fa-user"></i></button>
											<ul class="space-top">
												<li><a href="#">Forgot your password?</a></li>
											</ul>
											<span class="text-center text-muted">Login with</span>
											<ul class="social-links colored circle clearfix">
												<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
												<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
												<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
							<p class="text-center space-top">Don't have an account yet? <a href="page-signup.html">Sing up</a> now.</p>
						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
			<!-- main-container end -->
