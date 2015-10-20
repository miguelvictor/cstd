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
                        <li><a href="/">Home</a></li>
                        <li><a href="/about.php">About us</a></li>
                        <li><a href="/contact.php">Contact us</a></li>
                        <li class="active"><a href="/signup.php">Sign Up</a></li>
                        <li><a href="/login.php">Log In</a></li>
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
            <?php if (isset($errors) && !empty($errors)) { ?>
            <div class="col-lg-6 col-lg-offset-3 alert alert-danger text-left">
              <strong>Oops!</strong>
              <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error ?></li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>
            <div class="col-lg-4 col-lg-offset-4">
                <form class="form-horizontal" action="/signup.php" method="post">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password1" placeholder="Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password2" placeholder="Enter Password Confirmation" />
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
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
    </body>
</html>