<?php include(base_path('views/backend/layout/header.view.php')) ?>

	<div class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="">
						<img src="../../assets/backend/vendors/images/logo-icon.png" alt="" />
                        <span class="text-primary font-weight-bolder ml-2">Torofy.com</span>
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7 h-auto">
						<img src="../../assets/backend/vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Login To Torofy.com</h2>
							</div>

							<?php if(isset($_SESSION['errors'])) : ?>
								<div class="alert alert-danger error-message">
									<ul class="error-list-style">
											<li><?= $_SESSION['errors']['0'] ?></li>
									</ul>
								</div>
							<?php endif; ?>

							<form action="/admin/login" method="POST">
								<div class="select-role">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn active" >
											<input type="radio" name="is_admin" id="admin" value=1 />
											<div class="icon">
												<img
													src="../../assets/backend/vendors/images/admin.svg"
													class="svg"
													alt=""
												/>
                                                <!-- <i class="ri-admin-line svg svg-w"></i> -->
											</div>
											<span>I'm</span>
											Admin
										</label>
										<label class="btn">
											<input type="radio" name="is_admin" id="user" value=0 />
											<div class="icon">
												<img
													src="../../assets/backend/vendors/images/user.svg"
													class="svg"
													alt=""
												/>
											</div>
											<span>I'm</span>
											Owner
										</label>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="email"
										class="form-control form-control-lg"
                                        name="email"
										placeholder="Email"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
                                        name="password"
										placeholder="**********"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
                                                name="is_remember"
												id="customCheck1"
											/>
											<label class="custom-control-label" for="customCheck1"
												>Remember</label
											>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="forgot-password.html">Forgot Password</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<button 
                                                class="btn btn-primary btn-lg btn-block" 
                                                type="submit" 
                                            >Sign In</button>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href=""
												>Register To Create Account</a
											>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php include(base_path('views/backend/layout/footer.view.php')) ?>