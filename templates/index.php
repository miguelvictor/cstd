<!DOCTYPE html>
<html>
<head>
    <link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic:400,100,600,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- START OF HEADER -->
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="/index.php"><img src="/img/logo1.png" title="carwash" /></a>
            </div>
            <div class="top-nav">
                <span class="menu"> </span>
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li><a href="/attractions">Attractions</a></li>
                            <li><a href="/about.php">About us</a></li>
                            <li><a href="/contact.php">Contact us</a></li>
                            <li><a href="/logout.php">Log Out</a></li>
                        <?php } else { ?>
                            <li><a href="/attractions">Attractions</a></li>
                            <li><a href="/about.php">About us</a></li>
                            <li><a href="/contact.php">Contact us</a></li>
                            <li><a href="/signup.php">Sign Up</a></li>
                            <li><a href="/login.php">Log In</a></li>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- END OF HEADER -->
    
    <!-- START OF BANNER -->    
    <div class="banner">
        <div class="slider-caption">
            <h1>WELCOME TO CROWD SOURCE TRAVEL DESTINATION SITE!</h1>
        </div>
        <div class="img-grids">
            <h3>Places You Must Visit In Your Lifetime</h3>       
            <div class="top-grids">
                <div class="col-md-2 grid1">
                    <img src="/img/img-1.jpg" alt="" />
                    <h3>Bohol</h3>
                </div>
                <div class="col-md-2 grid1">
                    <img src="/img/img-2.jpg" alt="">
                    <h3>Cebu</h3>                                                  
                </div>
                <div class="col-md-2 grid1">
                    <img src="/img/img-3.jpg" alt="">
                    <h3>Vigan</h3>                                                  
                </div>
                <div class="col-md-2 grid1">
                    <img src="/img/img-4.jpg" alt="">
                    <h3>Davao</h3>                                                  
                </div>
                <div class="col-md-2 grid1">
                    <img src="/img/img-5.jpg" alt="">
                    <h3>Tawi-Tawi</h3>                                                  
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="bottom-grids">
                <div class="col-md-2 grid2">
                    <img src="/img/img-6.jpg" alt="">
                    <h3>Boracay</h3>
                </div>
                <div class="col-md-2 grid2">
                    <img src="/img/img-7.jpg" alt="">
                    <h3>Palawan</h3>                                                  
                </div>
                <div class="col-md-2 grid2">
                    <img src="/img/img-8.jpg" alt="">
                    <h3>Leyte</h3>                                                  
                </div>
                <div class="col-md-2 grid2">
                    <img src="/img/img-9.jpg" alt="">
                    <h3>Subic</h3>                                                  
                </div>
                <div class="col-md-2 grid2">
                    <img src="/img/img-10.jpg" alt="">
                    <h3>Bacolod</h3>                                                  
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END OF BANNER -->

    <!-- START OF SERVICES -->
    <div id="services" class="Services">
        <div class="container">
            <div class="service-grids">
                <div class="col-md-3 service-grid">
                    <i class="icon1"> </i>
                    <h3>Sites the world</h3>
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END OF SERVICES -->

    <!-- START OF FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="copy-right">
                <p>&copy; 2015 &nbsp;<a href="/">Brainybees</a></p>
            </div>  
        </div>                          
    </div>

    <!-- SCRIPT DEPENDENCIES -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/move-top.js"></script>
    <script src="/js/easing.js"></script>
    <script>
        $(document).ready(function() {
            // smooth scroll
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });

            // pull
            var pull = $('#pull');
            var menu = $('nav ul');
            var menuHeight = menu.height();
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

            // 1
            $().UItoTop({ easingType: 'easeOutQuart' });

            // 2
            function hideURLbar(){ 
                window.scrollTo(0,1);
            }
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0); 
            }, false); 

            // 3
            $("span.menu").click(function() {
                $(".top-nav ul").slideToggle(1000);
            });
        });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </body>
</html>