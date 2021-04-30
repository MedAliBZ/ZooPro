<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZooPro - Register</title>
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/Images/logo.png" type="image/x-icon">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/cssLogin/style.css">
</head>

<body>
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>

    <div class="container">

        <div class="left-div">
            <div class="left-image">
                <img src="<?php echo URLROOT ?>/public//images/register.png" alt="">
            </div>
        </div>

        <!-- right div start  -->

        <div class="right-div">
            <h4>Welcome</h4>
            <form action="<?php echo URLROOT; ?>/users/register" method="POST" class="right-form createNew-form">

                <ul>
                    <li><h3>Create Your Account</h3></li>
                    <li><i class="fas fa-user"></i> <input type="text" placeholder="Username" name="username" required></li>
                    <li><i class="fas fa-envelope"></i> <input type="text" placeholder="Email" name="email" required></li>
                    <li><i class="fas fa-lock"></i><input type="password" placeholder="Password" name="password" required></li> 
                    <li><i class="fas fa-lock"></i><input type="password" placeholder="Confirm Password" name="confirmPassword"></li> 
                    <li style="color: red;"><?php if(isset($data['errorSignUp'])){echo $data['errorSignUp'];} ?></li>
                    <li><input type="submit" value="Create"></li>                 
                </ul>

            </form>

            <div class="footer createNew-footer">
                <ul>
                    <li><a href="<?php echo URLROOT ?>/users/login">Back</a></li>
                    
                </ul>
            </div>
            <div class="vr-line"></div>
        </div>

    </div>
    <script src="<?php echo URLROOT ?>/public/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?php echo URLROOT ?>/public/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/popper.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.slicknav.min.js"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?php echo URLROOT ?>/public/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?php echo URLROOT ?>/public/assets/js/wow.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/animated.headline.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="<?php echo URLROOT ?>/public/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/waypoints.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="<?php echo URLROOT ?>/public/assets/js/contact.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.form.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/mail-script.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?php echo URLROOT ?>/public/assets/js/plugins.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/main.js"></script>
</body>
</html>