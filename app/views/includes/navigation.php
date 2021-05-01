<?php
	
	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "en";
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "fr")
			$_SESSION['lang'] = "fr";
	}

	require_once "../languages/" . $_SESSION['lang'] . ".php";
?>

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo URLROOT; ?>/index"><img src="<?php echo URLROOT ?>/public/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?php echo URLROOT ?>/Pages/index"><?php echo $lang['menuItem1'] ?></a></li>
                                            <li><a href="<?php echo URLROOT ?>/enclos/afficherList"><?php echo $lang['menuItem2'] ?></a></li>

                                            <li><a href="#"><?php echo $lang['menuItem3'] ?></a></li>
                                            <li><a href="#"><?php echo $lang['menuItem4'] ?></a></li>
                                            <li><a href="#"><?php echo $lang['menuItem5'] ?></a>
                                                <ul class="submenu">
                                                    <li><a href="#">Blog</a></li>
                                                    <li><a href="#">Blog Details</a></li>
                                                    <li><a href="#">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo URLROOT ?>/Pages/profile"><?php echo $lang['menuItem6'] ?></a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <?php if (isset($_SESSION['id'])) : ?>
                                        <a class="btn header-btn" href="<?php echo URLROOT; ?>/users/logout"><?php echo $lang['btnHeaderLogOut'] ?></a>
                                    <?php else : ?>
                                        <a class="btn header-btn" href="<?php echo URLROOT; ?>/users/login"><?php echo $lang['btnHeaderLogIn'] ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>