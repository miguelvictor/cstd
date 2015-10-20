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
                <a href="/"><img src="/img/logo1.png" title="carwash" /></a>
            </div>
            <div class="top-nav">
                <span class="menu"> </span>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li class="active"><a href="/attractions">Attractions</a></li>
                            <li><a href="/about.php">About us</a></li>
                            <li><a href="/contact.php">Contact us</a></li>
                            <li><a href="/logout.php">Log Out</a></li>
                        <?php } else { ?>
                            <li class="active"><a href="/attractions">Attractions</a></li>
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
    <div>
        <div class="about-head">
            <h3>
                Top Attractions
                <?php if (is_admin()) { ?>
                <a href="/attractions/create.php" style="float: right;" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> Add Attraction</a>
                <?php } ?>
            </h3>
        </div>
        <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="row">
                <?php if (!empty($attractions)) { ?>
                    <?php foreach ($attractions as $attraction) { ?>
                        <a class="col-lg-4 text-center" style="overflow: hidden;" href="/attractions?id=<?php echo $attraction['id'] ?>">
                            <img src="<?php echo $attraction['picture'] ?>" style="height: 300px; " />
                            <h3><?php echo $attraction['name'] ?></h3>
                            <p><?php echo $attraction['description'] ?></p>
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <h1 class="text-center">There are no attractions here</h1>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END OF BANNER -->

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