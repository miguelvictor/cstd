<!DOCTYPE html>
<html>
<head>
	<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="/css/style.css" rel='stylesheet' type='text/css' />

	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic:400,100,600,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!-- START OF HEADER -->
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="/"><img src="/img/logo1.png" title="carwash" /></a>
			</div>
			<div class="top-nav">
				<span class="menu"></span>
				<ul>
					<li><a href="/">Home</a></li>
					<li class="active"><a href="about.php">About us</a></li>
					<li><a href="/contact.php">Contact us</a></li>
					<li><a href="/signup.php">Sign up</a></li>
					<li><a href="/login.php">Sign In</a></li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- START OF ABOUT BANNER -->
	<div id="about" class="about">
	 	<div class="about">
	 		<div class="about-head">
	 			<h3>About us</h3>
	 		</div>
	 		<div class="container">
				<div class="about-section">
					<div class="col-md-8 about-top">
						<div class=" about-grid-img">
							<div class=" section group">
								<div class="col-md-6 images_1_of_4">
									<div class="image">
										<a href="#"><img src="/img/p1.jpg"></a>
									</div>
									<h4>Aquino Junnel</h4>
									<h6>UI DESIGNER/PROGRAMMER</h6>
								</div>
								<div class="col-md-6 images_1_of_4">
									<div class="image">
										<a href="#"><img src="/img/p2.jpg"></a>
									</div>
									<h4>Canonigo Ephraim</h4>
									<h6>PROGRAMMER</h6>
								</div>
								<div class="col-md-6 images_1_of_4">
									<div class="image">
										<a href="#"><img src="/img/p3.jpg"></a>
									</div>
									<h4>SANTILLAN BABYLEN</h4>
									<h6>TEAM LEADER</h6>
								</div>
								<div class="col-md-6 images_1_of_4">
									<div class="image">
										<a href="#"><img src="/img/p4.jpg"/></a>
									</div>
									<h4>SODUSTA LOVELACE</h4>
									<h6>UI DESIGNER/TESTER</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-4  about-bottom">
						<h3>Any comments</h3>
						<div class="about-grid-Recent">
							<div class="section group">
								<ul class="comments-custom unstyled">			
									<li class="comments-custom_li">
										<div class="icon"></div>
										<div class="right-text">	
											<a href="#"><h4 class="comments-custom_h">Comments/suggestion:</h4></a>
											<div class="comments-custom_txt">
												<a href="#" title="Go to this comment"></a>
											</div>
										</div>
										<div class="clearfix"></div>
									</li>
									<li class="comments-custom_li">
										<div class="icon"></div>
										<div class="right-text">	
											<a href="#"><h4 class="comments-custom_h">Comments/suggestion:</h4></a>
											<div class="comments-custom_txt">
												<a href="#" title="Go to this comment">.</a>
											</div>
										</div>
										<div class="clearfix"></div>
									</li>
									<li class="comments-custom_li">
										<div class="icon"> </div>
										<div class="right-text">	
											<a href="#"><h4 class="comments-custom_h">Comments/suggestion:</h4></a>
											<div class="comments-custom_txt">
												<a href="#" title="Go to this comment"></a>
											</div>
										</div>
										<div class="clearfix"> </div>
									</li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
	 		 </div>
	 	</div>
	</div>

	<!-- START OF SERVICES -->
	<div id="services" class="services">
			<div class="container">
					
 			<div class="service-grids">
	 				<div class="col-md-3 service-grid">
	 					<i class="icon1"> </i>
	 					<h3>Destination</h3>
	 				</div>
	 				<div class="col-md-3 service-grid">
	 					<i class="icon2"> </i>
	 					<h3>Delicacies</h3>
	 				</div>
	 				<div class="col-md-3 service-grid">
	 					<i class="icon3"> </i>
	 					<h3>Photography</h3>
	 				</div>
	 				<div class="col-md-3 service-grid">
	 					<i class="icon4"> </i>
	 					<h3>Find the best</h3>
	 				</div>
 				<div class="clearfix"> </div>
 			</div>
		</div>
	</div>
	
	<!-- START OF FOOTER -->
	<div class="footer">
		<div class="container">
			<div class="copy-right">
				<p>&copy; 2015 &nbsp;<a href="/">Brainybees</a></p>
			</div>
		</div>								
	</div>
	<!-- END OF FOOTER -->

	<!-- BACK TO TOP LINK -->							
	<a href="#" id="toTop" style="display: block;">
		<span id="toTopHover"></span>
	</a>

	<!-- SCRIPT DEPENDENCIES -->
	<script src="/js/jquery.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		$(document).ready(function($) {
			function hideURLbar(){ 
				window.scrollTo(0,1); 
			}
			addEventListener("load", function() { 
				setTimeout(hideURLbar, 0); 
			}, false); 

			$(".scroll").click(function(event){		
				event.preventDefault();
				$('php,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});

			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();
			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});

    		$().UItoTop({ easingType: 'easeOutQuart' });

    		$("span.menu").click(function(){
				$(".top-nav ul").slideToggle(1000);
			});
		});
		
	</script>
</body>
</html>