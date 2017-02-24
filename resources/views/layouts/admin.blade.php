<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
		@yield('head')
    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet" />

		<style>

							.se-pre-con {
					position: fixed;
					left: 0px;
					top: 0px;
					width: 100%;
					height: 100%;
					z-index: 9999;
					background: url("/photos/gif4.gif") center no-repeat #fff;
					}

		</style>
    <!--     Fonts and icons     -->
		<link href="/assets/css/dropzone.min.css" type="text/css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="se-pre-con"></div>
	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					Creative Tim
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="dashboard.html">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
															<i class="material-icons">person</i>
															<p>Users <b class="caret pull-right" style="margin-top:13px;"></b></p>
													</a>
													<ul class="dropdown-menu">
														<li><a href="{{route('users.index')}}" id="all_user">All Users</a></li>
														<li class="divider"></li>
														<li><a href="{{route('users.create')}}" id="create_user">Create User</a></li>
													</ul>
	                </li>
	                <li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="material-icons">report</i>
												<p>Posts <b class="caret pull-right" style="margin-top:13px;"></b></p>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{route('posts.index')}}" id="all_post">All Posts</a></li>
											<li class="divider"></li>
											<li><a href="{{route('posts.create')}}" id="create_post">Create Post</a></li>
										</ul>
	                </li>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="material-icons">category</i>
												<p>Categories<b class="caret pull-right" style="margin-top:13px;"></b></p>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{route('categories.index')}}" id="category">Manage Categories</a></li>
											<li class="divider"></li>
										</ul>
	                </li>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="material-icons">bubble_chart</i>
												<p>Media Section<b class="caret pull-right" style="margin-top:13px;"></b></p>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{route('media.index')}}" id="post_picture">Posted Pictures</a></li>
											<li class="divider"></li>
											<li><a href="{{route('media.upload')}}" id="upload">Upload Pictures</a></li>
										</ul>
	                </li>
	                <li>
	                    <a href="notifications.html">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
					<li class="active-pro">
	                    <a href="upgrade.html">
	                        <i class="material-icons">unarchive</i>
	                        <p>Upgrade to PRO</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Material Dashboard</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>
							<li>
							@if(Auth::check())
								<div class="dropdown">
										<a href="#" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">
									    	<p style="font-size:14px;padding-top:5px;"><i class="material-icons">person</i> {{Auth::user()->name}} &nbsp;<b class="caret"></b></p>
										</a>
										<ul class="dropdown-menu">
											<li>
												<a href="{{ route('logout') }}"
														onclick="event.preventDefault();
																		 document.getElementById('logout-form').submit();">
														<i class="material-icons">settings_power</i> Logout
												</a>

												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
												</form>
											</li>
											<li><a href="#"><i class="material-icons">person_pin</i>Profile</a></li>
										</ul>
									</div>
								@endif
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Search">
								<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
						</form>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
              @yield('content')
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
            @yield('footer')
        </div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	@yield('script')

	<!-- big mistage bcz we put the @yield('script') after the bootstrap.min.js and thats why the dropdown is not work -->

	<script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script type="text/javascript">
				$(window).load(function() {
					$(".se-pre-con");
					})
</script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="/assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="/assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="/assets/js/dropzone.min.js"></script>
	<link href="/assets/css/dropzone.min.css" type="text/css" rel="stylesheet">



	<script src="/assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="/assets/js/demo.js"></script>
	<script type="text/javascript">


    	$(document).ready(function(){

				$(".se-pre-con").fadeOut(2000);
				$('body').show();
			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();
					$('#all_user').on('click', function (e) {
        		e.preventDefault();
        //alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
        $.get("{{route('users.index')}}", function (data) {

						$( "body" ).html( data );

        		});
    	});
			$('#all_user').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('users.index')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#create_user').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('users.create')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#all_post').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('posts.index')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#create_post').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('posts.create')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#category').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('categories.index')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#post_picture').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('media.index')}}", function (data) {

				$( "body" ).html( data );

				});
			});

			$('#upload').on('click', function (e) {
				e.preventDefault();
				//alert("Customer ID: "$customerId+ " po id: " +$purchaseOrderId );
				$.get("{{route('media.upload')}}", function (data) {

				$( "body" ).html( data );

				});
			});

    });
	</script>

</html>
