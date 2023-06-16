<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="/" class="logo">
						<img src="../../assets/site/images/icons/logo-02.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="/">Home</a>
							</li>

							<li>
								<a href="/#shop">Shop</a>
							</li>

							<li>
								<a href="/about">About</a>
							</li>

							<li>
								<a href="/contact">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<a href="/cart_details">
								<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="<?= getCartProductQuantity() ?>">
									<i class="zmdi zmdi-shopping-cart"></i>
								</div>
							</a>
						</div>
						<?php if(null !== session('customer')) : ?>
							<div class="flex-c-m h-full bor6">
								<div class="icon-header-item cl0 hov-cl1 p-lr-11">
									<div class="dropdown">
										<a
											class="dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<span class="user-icon">
												<img src="../../<?= defaultCustomerProfile(session('customer')) ?>" alt="" class="pf-img" />
											</span>
											<span class="font-pf text-white"><?= session('customer')['name'] ?></span>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list dd-pf p-2"
										>
											<a class="dropdown-item p-2" href="/user/profile"
												><i class="ri-user-line"></i> Profile</a
											>
											<a class="dropdown-item p-2" href="profile.html"
												><i class="ri-settings-2-line"></i> Setting</a
											>
											<a class="dropdown-item p-2" href="/logout"
												><i class="ri-logout-box-line"></i> Log Out</a
											>
										</div>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="flex-c-m h-full bor6">
								<div class="icon-header-item cl0 hov-cl1 p-lr-11">
									<a href="/login" class="sign-in-w"><i class="ri-login-box-line"></i></a>
								</div>
							</div>
						<?php endif; ?>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="../../assets/site/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<a href="/cart_details">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?= getCartProductQuantity() ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</a>
				</div>
				<?php if(null !== session('customer')) : ?>
					<div class="flex-c-m h-full bor6">
						<div class="icon-header-item cl0 hov-cl1 p-lr-11">
							<div class="dropdown">
								<a
									class="dropdown-toggle"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<span class="user-icon">
										<img src="../../<?= defaultCustomerProfile(session('customer')) ?>" alt="" class="pf-m-img" />
									</span>
									<span class="font-m-pf text-dark"><?= session('customer')['name'] ?></span>
								</a>
								<div
									class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list dd-pf p-2"
								>
									<a class="dropdown-item p-2" href="/user/profile"
										><i class="ri-user-line"></i> Profile</a
									>
									<a class="dropdown-item p-2" href="profile.html"
										><i class="ri-settings-2-line"></i> Setting</a
									>
									<a class="dropdown-item p-2" href="/logout"
										><i class="ri-logout-box-line"></i> Log Out</a
									>
								</div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="flex-c-m h-full bor6">
						<div class="icon-header-item cl0 hov-cl1 p-lr-11">
							<a href="/login" class="sign-in-b"><i class="ri-login-box-line"></i></a>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="/">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="#shop">Shop</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<form class="container-search-header">
				<div class="wrap-search-header">
					<input class="plh0" type="text" name="search" placeholder="Search...">

					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
				</div>
			</form>
		</div>
	</header>