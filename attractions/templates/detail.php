<!DOCTYPE html>
<html>
<head>
    <link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic:400,100,600,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href='' rel="stylesheet" type="text/css">

    <!-- TODO add font awesome and make ratings work !! -->
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
            <h3><?php echo $attraction['name'] ?></h3>
        </div>
        <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" style="overflow: hidden;">
                    <!-- Edit and Delete Buttons -->
                    <?php if (is_admin()) { ?>
                        <div style="margin-bottom: 40px;">
                            <a class="btn btn-primary" href="/attractions/update.php?id=<?php echo $attraction['id'] ?>"><i class="glyphicon glyphicon-pencil"></i> Edit Attraction</a>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal"><i class="glyphicon glyphicon-trash"></i> Delete Attraction</button>
                        </div>
                    <?php } ?>

                    <!-- Picture -->
                    <img src="<?php echo $attraction['picture'] ?>">

                    <!-- Rating -->
                    <h3 style="color: #aaa;">
                        Ratings: <?php echo format_attraction_rating($attraction) ?>
                        <div class="starrr" style="float: right" data-attraction-id="<?php echo $attraction['id'] ?>"></div>
                    </h3>

                    <!-- Description -->
                    <h4 style="margin-top: 20px;"><?php echo $attraction['description'] ?></h4>
                    
                    <!-- Comments -->
                    <h3 style="color: #aaa;">Comments/Suggestions</h3>
                    <?php if ($attraction['comments']) { ?>
                        <?php foreach ($attraction['comments'] as $index => $comment) { ?>
                            <hr />
                            <div>
                                <h4><?php echo ucwords($comment['user']) ?></h4>
                                <p><?php echo $comment['comment'] ?></p>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <h4>No comments/suggestions yet.</h4>
                    <?php } ?>
                    <?php if (is_authenticated()) { ?>
                    <hr />

                    <!-- Write Comment Form -->
                    <form action="/attractions/comment.php" method="post" class="form-horizontal">
                        <input type="hidden" name="attraction_id" value="<?php echo $attraction['id'] ?>" />
                        <div class="form-group">
                            <label>Write a Comment</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit comment</button>
                    </form>
                    <?php } ?>
                </div>
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
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/move-top.js"></script>
    <script src="/js/easing.js"></script>
    <script src="/js/starr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.starrr:eq(0)').on('starrr:change', function(e, value){
                var data = 'rating=' + value + '&attraction_id=' + e.target.dataset.attractionId;
                $.post('/attractions/rate.php', data, function(response) {
                    location.reload(true);
                });
            });

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

        <!-- Delete Modal -->
        <div id="delete-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete <?php echo $attraction['name'] ?>?</h4>
              </div>
              <div class="modal-body">
                <p>This action cannot be undone and deleting this attraction will require another addition for it to be added again.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form action="/attractions/delete.php?id=<?php echo $attraction['id'] ?>" method="post" style="display: inline;">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>

          </div>
        </div>
    </body>
</html>