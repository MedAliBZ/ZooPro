<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');

 if (!isset($data['tab'])) {
     if (isset($data['errorAdd']) && !empty($data['errorAdd'])) {
         $errorTab = explode(" ", $data['errorAdd']);
         $err = implode("-", $errorTab);
         header('location: ' . URLROOT . '/sponsor/afficherList/err-' . $err);
     } elseif (isset($data['errorUpdate']) || !empty($data['errorUpdate'])) {
         $errorTab = explode(" ", $data['errorUpdate']);
         $err = implode("-", $errorTab);
         header('location: ' . URLROOT . '/sponsor/afficherList/errUp-' . $err);
     } 
     else
         header('location: ' . URLROOT . '/sponsor/afficherList');
}

?>

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Brainstormers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sponsor.css" />
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
                <li class="item">
                    <a href="<?php echo URLROOT ?>/pages/usersV" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span> Profile</span>
                    </a>
                </li>
                <li class="item ">
                    <a href="<?php echo URLROOT ?>/pages/employes" class="menu-btn">
                        <i class="fas fa-user-friends"></i><span>Employés</span>
                    </a>
                </li>
                <li class="item " id="profile">
                    <a href="#" class="menu-btn profilebtn">
                        <i class="fas fa-paw"></i><span> Animaux<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-profile">
                        <a href="<?php echo URLROOT ?>/pages/animaux"><i
                                class="fas fa-hippo"></i><span>Animaux</span></a>
                        <a href="<?php echo URLROOT ?>/pages/regime"><i class="fas fa-bone"></i><span>Régime
                                alimentaire</span></a>
                    </div>
                </li>

                <li class="item" id="messages">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-leaf"></i><span>Végetation<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-messages">
                        <a href="<?php echo URLROOT ?>/pages/plante"><i
                                class="fas fa-seedling"></i><span>Plantes</span></a>
                        <a href="<?php echo URLROOT ?>/pages/espece"><i class="fas fa-tree"></i><span>Espéce
                                vegetale</span></a>
                    </div>
                </li>
                <li class="item" id="settings">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-igloo"></i><span>Enclos<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-settings">
                        <a href="<?php echo URLROOT ?>/pages/enclos"><i
                                class="fas fa-dungeon"></i><span>Enclos</span></a>
                        <a href="<?php echo URLROOT ?>/pages/types"><i
                                class="fas fa-landmark"></i><span>Types</span></a>
                    </div>
                </li>
                <li class="item active" id="event">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-calendar-alt"></i><span> Evénements<i
                                class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-events">
                        <a href="<?php echo URLROOT ?>/pages/evenement"><i
                                class="fas fa-calendar-day"></i><span>Evenement</span></a>
                        <a href="<?php echo URLROOT ?>/pages/sponsor"><i
                                class="fas fa-hand-holding-usd"></i><span>Sponsor</span></a>
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
                    <div class="btn-div">                                                
                <button class="btn" id="ajoutersponor">Ajouter</button>
                <button class="btn" id="sendemail">Envoyer un email</button>
                                        </div>    
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col col-1">ID</div>
                        <div class="col col-2">Nom de société</div>
                        <div class="col col-3">Numéro de téléphone</div>
                        <div class="col col-4">Adresse Email</div>
                        <div class="col col-5"></div>

                    </li>

                    <?php if (isset($data['tab'])) {
                        echo $data['tab'];
                    } ?>

                </ul>
                <div class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <form class="content" action="<?php echo URLROOT; ?>/sponsor/deleteUpdateTab" method="POST">
                            <h2>Modifier un sponsor</h2>
                            <input type="text" placeholder="id" name="id" style="display: none;" class="id-popup" />

                            <div class="input-field two">
                                <i class="fas fa-building"></i>
                                <input type="text" placeholder="Nom de société" name="nom" class="nom-popup" />
                            </div>
                            <div id="errorMdnom"></div>

                            <div class="input-field two">
                                <i class="fas fa-phone"></i>
                                <input type="number" placeholder="Numéro de téléphone" name="nb" class="nb-popup" />
                            </div>
                            <div id="errorMdnb"></div>

                            <div class="input-field two">
                                <i class="fas fa-@"></i>
                                <input type="text" placeholder="Email" name="email" class="email-popup" />
                            </div>
                            <div id="errorMdemail"></div>

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
                        <form class="content" action="<?php echo URLROOT; ?>/sponsor/addsponsor" method="POST">
                            <h2>Ajouter un sponsor</h2>

                            <div class="input-field one">
                                <i class="fas fa-building"></i>
                                <input type="text" placeholder="Nom de société" name="nom" id="nom-popupA" />
                            </div>
                            <div id="errorAjnom"></div>

                            <div class="input-field two">
                                <i class="fas fa-phone"></i>
                                <input type="number" placeholder="Numéro de téléphone" name="nb" id="nb-popupA" />
                            </div>
                            <div id="errorAjnb"></div>

                            <div class="input-field two">
                                <i class="fas fa-inbox"></i>
                                <input type="text" placeholder="Email" name="email" id="email-popupA" />
                            </div>
                            <div id="errorAjemail"></div>

                            <div class="input-field two">
                                <i class="fas fa-images"></i>
                                 <input type="file" placeholder="Photo" name="photo" id="photo-popupA" />
                            </div>
                            <div id="errorAjphoto"></div>

                            <div class="buttonsP">
                                <input name="ajouter" type="submit" class="btn" value="Ajouter" id="ajouterPopup" />
                            </div>
                        </form>
                    </div>
                </div>
                
        
                <div class="overlay overlaysend">
                    <div class="popup">
                        <a class="close closesend" href="#">&times;</a>
                        <form class="content"  method="POST">
                            <h2>envoyer un email </h2>

                            <div class="input-field one">
                                <i class="fas fa-building"></i>
                                <input type="text" placeholder="entrer un nom" name="nom" id="nom-popups" />
                            </div>
                            <div class="input-field two">
                                <i class="fas fa-inbox"></i>
                                <input type="text" placeholder="entrer l email" name="email" id="email-popups" />
                            </div>

                            <div class="input-field two">
                                <i class="fas fa-pen"></i>
                                <input type="text" placeholder="entrer le sujet" name="sujet" id="sujet-popups" />
                            </div>

                            <div class="input-field two">
                                <i class="fas fa-envelope-square"></i>
                                <textarea rows="5" placeholder="type message" name="message" id="message-popups" ></textarea>
                            </div>
                            
                            <button type="submit" value="send an email">submit</button>
                            
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
    <script src="<?php echo URLROOT ?>/public/js/sponsor.js"></script>
</body>