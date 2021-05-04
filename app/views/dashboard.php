<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');
if (!isset($data['admins']))
	header('location: ' . URLROOT . '/dashboard/showStats');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Brainstormers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/dashboard.css" />
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/img/logo.png" type="image/x-icon">
</head>

<body>
    <div id="loading"><img src="<?php echo URLROOT ?>/public/img/logo.png" alt="loader" class="loader" height="300px">
    </div>
    <!--wrapper start-->
    <div class="wrapper collapse">
        <!--header menu start-->
        <header>
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
            <div class="left_area">
                <h3>Zoo <span>Pro</span></h3>
            </div>
            <div class="sidebar-btn">
                <i class="fas fa-bars"></i>
            </div>
            <div class="right_area">
                <a href="#" id="themeButton">
                    <i class="themebtn" data-feather="sun"></i>
                </a>
            </div>
        </header>
        <!--header menu end-->
        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">
                <li class="logo">
                    <img src="<?php echo URLROOT ?>/public/img/logo.png" alt="logo" />
                </li>
                <li class="item active">
                    <a href="<?php echo URLROOT ?>/pages/dashboard" class="menu-btn">
                        <i class="fas fa-chart-line"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo URLROOT ?>/pages/usersV" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span> Profile</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo URLROOT ?>/pages/employes" class="menu-btn">
                        <i class="fas fa-user-friends"></i><span>Employés</span>
                    </a>
                </li>
                <li class="item " id="profile">
                    <a href="#" class="menu-btn profilebtn">
                        <i class="fas fa-paw"></i><span> Animaux<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-profile">
                        <a href="<?php echo URLROOT ?>/pages/animaux"><i class="fas fa-hippo"></i><span>Animaux</span></a>
                        <a href="<?php echo URLROOT ?>/pages/regime"><i class="fas fa-bone"></i><span>Régime
                                alimentaire</span></a>
                    </div>
                </li>

                <li class="item" id="messages">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-leaf"></i><span>Végetation<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-messages">
                        <a href="<?php echo URLROOT ?>/pages/plante"><i class="fas fa-seedling"></i><span>Plantes</span></a>
                        <a href="<?php echo URLROOT ?>/pages/espece"><i class="fas fa-tree"></i><span>Espéce
                                vegetale</span></a>
                    </div>
                </li>
                <li class="item" id="settings">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-igloo"></i><span>Enclos<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-settings">
                        <a href="<?php echo URLROOT ?>/pages/enclos"><i class="fas fa-dungeon"></i><span>Enclos</span></a>
                        <a href="<?php echo URLROOT ?>/pages/types"><i class="fas fa-landmark"></i><span>Types</span></a>
                    </div>
                </li>
                <li class="item" id="event">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-calendar-alt"></i><span> Evénements<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-events">
                        <a href="<?php echo URLROOT ?>/pages/evenement"><i class="fas fa-calendar-day"></i><span>Evenement</span></a>
                        <a href="<?php echo URLROOT ?>/pages/sponsor"><i class="fas fa-hand-holding-usd"></i><span>Sponsor</span></a>
                    </div>
                </li>
                <li class="item">
                    <a href="<?php echo URLROOT; ?>/users/logout" class="menu-btn">
                        <i class="fas fa-sign-out-alt"></i><span> Logout</span>
                    </a>
                </li>
            </div>
        </div>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container" style="display: flex;justify-content:space-evenly;align-items:center;flex-wrap:wrap;">
            <div class="piechart card" id="roles"  admins='<?php echo $data['admins']; ?>' users="<?php echo $data['users']; ?>" 
            style="height: fit-content;padding: 0;width: 50%;display: flex;justify-content: center;"></div>

            <div class="donutchart card" id="employes" sup='<?php echo $data['sup']; ?>' inf="<?php echo $data['inf']; ?>" 
            style="height: fit-content;padding: 0;width: 40%;display: flex;justify-content: center;"></div>

            <div id="animalchart" class="donutchart card" stable='<?php echo $data['stable']; ?>' menace='<?php echo $data['menace']; ?>' endanger='<?php echo $data['endanger']; ?>'  
            style="height: fit-content;padding: 0;width: 35%;display: flex;justify-content: center;"></div>

            <div id="Regimechart" class="card" herbivore='<?php echo $data['herbivore']; ?>' omnivore='<?php echo $data['omnivore']; ?>' frugivore='<?php echo $data['frugivore']; ?>' carnivore='<?php echo $data['carnivore']; ?>' granivore='<?php echo $data['granivore']; ?>' 
            style="height: fit-content;padding: 0;width: 55%;display: flex;justify-content: center;"></div>

            <div id="espece" class="donutchart card" sup='<?php echo $data['suppp']; ?>' inf="<?php echo $data['infff']; ?>" 
            style="height: fit-content;padding: 0;width: 50%;display: flex;justify-content: center;"></div>

            <div id="enclos" class="donutchart card" sup='<?php echo $data['supp']; ?>' inf="<?php echo $data['inff']; ?>" 
            style="height: fit-content;padding: 0;width:40%;display: flex;justify-content: center;"></div>
            
        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/sidebar.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/theme.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/dashboard.js"></script>

</body>

</html>