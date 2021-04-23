<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');

if (!isset($data['tab'])) {
    header('location: ' . URLROOT . '/employes/afficherList');
}

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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/employes.css" />
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/img/logo.png" type="image/x-icon">
</head>

<body>
    <div id="loading"><img src="<?php echo URLROOT ?>/public/img/logo.png" alt="loader" class="loader" height="300px"></div>
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
                <li class="item">
                    <a href="<?php echo URLROOT ?>/pages/usersV" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span> Profile</span>
                    </a>
                </li>
                <li class="item active">
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
                        <a href="<?php echo URLROOT ?>/pages/regime"><i class="fas fa-bone"></i><span>Régime alimentaire</span></a>
                    </div>
                </li>

                <li class="item" id="messages">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-leaf"></i><span>Végetation<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-messages">
                        <a href="<?php echo URLROOT ?>/pages/plante"><i class="fas fa-seedling"></i><span>Plantes</span></a>
                        <a href="<?php echo URLROOT ?>/pages/espece"><i class="fas fa-tree"></i><span>Espéce vegetale</span></a>
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
        <div class="main-container">
            <div class="container">
                <div class="error-table"><?php if (isset($data['errorAdd'])) {
                                                echo $data["errorAdd"];
                                            } ?></div>
                <div class="error-table"><?php if (isset($data['errorUpdate'])) {
                                                echo $data["errorUpdate"];
                                            } ?></div>
                <button class="btn" id="ajouterEmp">Ajouter</button>
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col col-1">ID</div>
                        <div class="col col-2">CIN</div>
                        <div class="col col-3">Nom</div>
                        <div class="col col-4">Prenom</div>
                        <div class="col col-5">Date de naissance</div>
                        <div class="col col-6">Salaire</div>
                        <div class="col col-7">
                        </div>
                    </li>

                    <?php if (isset($data['tab'])) {
                        echo $data['tab'];
                    } ?>

                </ul>
                <div class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <form class="content" action="<?php echo URLROOT; ?>/employes/deleteUpdateTab" method="POST">
                            <h2>Modifier un employé</h2>
                            <input type="text" placeholder="id" name="id" style="display: none;" class="id-popup" />
                            <div class="input-field one">
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="Cin" name="cin" class="cin-popup" required />
                            </div>
                            <div class="input-field two">
                                <i class="fas fa-signature"></i>
                                <input type="text" placeholder="Nom" name="nom" class="nom-popup" required />
                            </div>
                            <div class="input-field two">
                                <i class="fas fa-signature"></i>
                                <input type="text" placeholder="Prenom" name="prenom" class="prenom-popup" required />
                            </div>
                            <div class="input-field two">
                                <i class="fas fa-calendar"></i>
                                <input type="date" name="dateNaissance" class="BD-popup" max='2002-01-01' min='1950-01-01' required />
                            </div>
                            <div class="input-field two">
                                <i class="fas fa-dollar-sign"></i>
                                <input type="number" step='0.01' placeholder="Salaire" name="salaire" class="salaire-popup" required />
                            </div>
                            <div id="errorMd"></div>
                            <div class="buttonsPUpdate">
                                <input name="update" type="submit" class="btn" value="Modifier" id="modifierPopupM" />
                                <input name="delete" type="submit" class="btn" value="Supprimer" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="overlay overlayAjouter">
                    <div class="popup">
                        <a class="close closeAjouter" href="#">&times;</a>
                        <form class="content" action="<?php echo URLROOT; ?>/employes/addEmployes" method="POST">
                            <h2>Ajouter un employé</h2>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="Cin" name="cin" id="cin-popupA" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-signature"></i>
                                <input type="text" placeholder="Nom" name="nom" id="nom-popupA" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-signature"></i>
                                <input type="text" placeholder="Prenom" name="prenom" id="prenom-popupA" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-calendar"></i>
                                <input type="Date" name="dateNaissance" id="BD-popupA" max='2002-01-01' min='1950-01-01' required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-dollar-sign"></i>
                                <input type="number" step='0.01' placeholder="Salaire" name="salaire" id="salaire-popupA" required />
                            </div>
                            <div>
                                <div id="errorAj"></div>
                                <div class="buttonsP">
                                    <input name="ajouter" type="submit" class="btn" value="Ajouter" id="ajouterPopup" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->
    <script src="<?php echo URLROOT ?>/public/js/sidebar.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/theme.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/employes.js"></script>
</body>