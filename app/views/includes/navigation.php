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
                                            <li><a href="<?php echo URLROOT ?>/Pages/index">Home</a></li>
                                            <li><a href="<?php echo URLROOT ?>/Pages/animaux">animaux</a>
                                                <ul class="submenu">
                                                    <li><a href="<?php echo URLROOT ?>/animauxC/afficherList">animaux</a></li>
                                                    <li><a href="<?php echo URLROOT ?>/regimeC/afficherList">régime alimentaire</a></li>
                                                </ul>
                                            </li>

                                            <li><a href="#">What we Do</a></li>
                                            <li><a href="#">Projects</a></li>
                                            <li><a href="#">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Blog</a></li>
                                                    <li><a href="#">Blog Details</a></li>
                                                    <li><a href="#">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo URLROOT ?>/Pages/profile">Profile</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <?php if (isset($_SESSION['id'])) : ?>
                                        <a class="btn header-btn" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                                    <?php else : ?>
                                        <a class="btn header-btn" href="<?php echo URLROOT; ?>/users/login">Login</a>
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