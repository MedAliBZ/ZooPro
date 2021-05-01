
<!doctype html>
<html class="no-js" lang="fr">


<?php

if (

isset($_POST["nom"]) &&
isset($_POST["email"]) &&
isset($_POST["sujet"]) &&
isset($_POST["message"]) 

) {
if (
    !empty($_POST["nom"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["sujet"]) &&
    !empty($_POST["message"]) 
) {
    $email = $_POST["email"];
    $subject = $_POST["sujet"];
    mail("$email" , "$email ($subject)" , $_POST["message"] , "From: $email");    
} else
    echo "Missing information";
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZooPro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/Images/logo.png" type="image/x-icon">

    <!-- CSS here -->
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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/enclos.css">
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo URLROOT ?>/public/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
    <main>
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70">
                                <h2><?php echo $lang['menuItem2'] ?></h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html"><?php echo $lang['menuItem1'] ?></a></li>
                                        <li class="breadcrumb-item"><a href="#"><?php echo $lang['breadcrumb-item'] ?></a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
     
        <div class="our-cases-area section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2><?php echo $lang['title'] ?></h2>
                            <p class="pl-20 pr-20"><?php echo $lang['description'] ?></p>
                        </div>
                    </div>
                </div>
                 
                <div class="row">
                <?php if (isset($data['tab'])) {
                echo $data['tab'];} ?>
                </div>

                 <div class="overlay overlaysend">
                    <div style="margin-top: 100px;" class="col-lg-3">
                    <div>
                        <form class="form-contact contact_form"  method="POST">
                            <h2 class="contact-title" ><?php echo $lang['contact-title'] ?></h2>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="<?php echo $lang['PlaceholderNom'] ?>"name="nom" id="nom-popups" value="<?php echo $_SESSION['username']; ?>"  />
                            </div>

                            <div id="errorSendNom"></div>

                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="<?php echo $lang['PlaceholderEmail'] ?>" name="email" id="email-popups" value="<?php echo $_SESSION['email']; ?>" />
                            </div>
                            <div id="errorSendEmail"></div>
                            <!-- <script>
                               document.getElementById('email-popups').value=document.getElementById('subject').value;
                            </script> -->

                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="<?php echo $lang['PlaceholderMontant'] ?>" name="sujet" id="sujet-popups" />
                            </div>
                            <div id="errorSendSujet"></div>

                            <div class="form-group">
                                <textarea class="form-control" rows="9" placeholder="<?php echo $lang['PlaceholderMessage'] ?>" name="message" id="message-popups" ></textarea>
                                <script>
                                document.querySelector('.appellation-popup')
                                </script>
                            </div>
                            <div id="errorSendMessage"></div>
                            
                            <button type="submit" value="send an email" class="button button-contactForm boxed-btn" id="emailPopup"><?php echo $lang['button-contactForm'] ?></button>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>
    <footer>
        <div class="footer-wrapper">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container ">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-3 col-md-8 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="<?php echo URLROOT ?>/Pages/index"><img src="<?php echo URLROOT ?>/public/assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>The automated process starts as soon as your clothes go into the machine.</p>
                                        </div>
                                    </div>
                                    <!-- social -->
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Our solutions</h4>
                                    <ul>
                                        <li><a href="#">Design & creatives</a></li>
                                        <li><a href="#">Telecommunication</a></li>
                                        <li><a href="#">Restaurant</a></li>
                                        <li><a href="#">Programing</a></li>
                                        <li><a href="#">Architecture</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Company</h4>
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Review</a></li>
                                        <li><a href="#">Insights</a></li>
                                        <li><a href="#">Carrier</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact us</h4>
                                    <ul>
                                        <li><a href="#">consulto98@gmail.com</a></li>
                                        <li><a href="#">76/A, Green road, NYC</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li class="number"><a href="#">(80) 783 367-3904</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                    <div class="text-center">
                                        <a href="http://localhost/frontEnclos//enclos/afficherList?lang=en"><?php echo $lang   ['lang_en'] ?></a> 
                                        |<a href="http://localhost/frontEnclos//enclos/afficherList?lang=fr"><?php echo $lang   ['lang_fr'] ?></a> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>

    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

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