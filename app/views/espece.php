<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');


    if (!isset($data['tab'])) {
        if (isset($data['errorAdd']) && !empty($data['errorAdd'])) {
            $errorTab = explode(" ", $data['errorAdd']);
            $err = implode("-", $errorTab);
            header('location: ' . URLROOT . '/especeC/afficherList/err-' . $err);
        }
        //  elseif (isset($data['errorUpdate']) || !empty($data['errorUpdate'])) {
        //     $errorTab = explode(" ", $data['errorUpdate']);
        //     $err = implode("-", $errorTab);
        //     header('location: ' . URLROOT . '/employes/afficherList/errUp-' . $err);
        // } 
        else
            header('location: ' . URLROOT . '/especeC/afficherList');
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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/espece.css" />
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
                    <a href="<?php echo URLROOT ?>/pages/dashboard" class="menu-btn">
                        <i class="fas fa-chart-line"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo URLROOT ?>/pages/usersV" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span> Profile</span>
                    </a>
                </li>
                <li class="item ">
                    <a href="<?php echo URLROOT ?>/pages/regime" class="menu-btn">
                        <i class="fas fa-user-friends"></i><span>Employés</span>
                    </a>
                </li>
                <li class="item" id="profile">
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

                <li class="item active " id="messages">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-leaf"></i><span>Végetation<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-messages">
                        <a href="<?php echo URLROOT ?>/pages/plante"><i
                                class="fas fa-seedling"></i><span>plante</span></a>
                        <a href="<?php echo URLROOT ?>/pages/espece"><i class="fas fa-tree"></i><span>Espéce
                                végétale</span></a>
                    </div>
                </li>
                <li class="item" id="settings">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-igloo"></i><span>Enclos<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu-settings">
                        <a href="<?php echo URLROOT ?>/pages/enclos"><i
                                class="fas fa-dungeon"></i><span>Enclos</span></a>
                        <a href="<?php echo URLROOT ?>/pages/typeEnclos"><i
                                class="fas fa-landmark"></i><span>Typesenclos</span></a>
                    </div>
                </li>
                <li class="item" id="event">
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






            <div id="google_translate_element"></div>
            <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                        pageLanguage: 'en'
                    },
                    'google_translate_element'
                );
            }
            </script>
            <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



            <p> Le temps en ce moment : </p>

            <p id="demo"></p>


            <script>
            var myVar = setInterval(myTimer, 1000);

            function myTimer() {
                var d = new Date();
                var t = d.toLocaleTimeString();
                document.getElementById("demo").innerHTML = t;
            }
            </script>



            <div class="card">
                <!-- <div class="error-table"><?php if (isset($data['errorAdd'])) {
                                            echo $data["errorAdd"];
                                        } ?></div> -->

                <!-- <div id="donutchart" class="card" sup='<?php echo $data['sup']; ?>' inf="<?php echo $data['inf']; ?>" style="height: fit-content;padding: 0;margin-left: calc(50%);
				transform: translate(-50%,0);width: 100%;display: flex;justify-content: center;">
                </div>-->

                <div class="firstRow" id="firstRow">
                    <h3 id="titreTab">liste des éspéce végétales </h3>
                </div>


                <form class="content" action="<?php echo URLROOT; ?>/especeC/getespece" method="POST">
                    <input class="btn" type="submit" value="rechercher" name="search_espece" style="float: right;" />
                    <input type="text" placeholder="Entrer id" name="idE" autocomplete="off" style="float: right;"
                        class="input-fieldSearch" />
                </form>

                <form class="content" action="<?php echo URLROOT; ?>/especeC/afficherList" method="POST">
                    <input class="btn" type="submit" value="Réinitialiser" name="reset_espece" style="float: right;" />
                </form>


                <form class="content" action="<?php echo URLROOT; ?>/especeC/sortespece" method="POST">
                    <input class="btn" type="submit" value="Trier" name="sort_espece" style="float: right;" />
                </form>


                <button class="AddbuttonStyle" id="addButtonToList" onclick="openFormAjouter()">+</button>
                <div class="form-popup" id="myForm">
                    <form action="<?php echo URLROOT; ?>/especeC/addespeceC" class="form-container" method="POST">
                        <style>
                        h2 {
                            text-align: center;
                        }
                        </style>
                        <h2 style="color:#04907E"> Ajouter une éspéce végétale : </h2>
                        <br>

                        <div class="formCss">

                            <input placeholder="Nom" type="text" id="nomE" name="nomE">
                        </div>
                        <div style="color:red" id="errorAjnom"></div>
                        <div class="formCss">
                            <input placeholder="Hauteur potentiel(m)" type="number" id="hauteur" name="hauteur">
                        </div>

                        <div style="color:red" id="errorAjhauteur"></div>

                        <input type="submit" class="buttonStyle" value="Ajouter" id="ajouterPopup">
                        <button type="button" class="buttonStyle" onclick="closeForm()">fermer</button>

                    </form>

                </div>
                <!-- start table -->

                <table class="styled-table" id="tableespece">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'éspece végétale </th>
                            <th>Hauteur potentiel</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php if (isset($data['tab'])) {
                        echo $data['tab'];
                        
                    } ?>




                    <!-- MODIFIER HEREEEEEEE -->
                    <div class="form-popupmodif" id="myForm1">
                        <form action="<?php echo URLROOT; ?>/especeC/deleteUpdateTabespece" 
                            method="POST">


                            <i class="fas fa-times" id="closeButton" onclick="closeFormModifier()"></i>
                            <h2 style="color:#04907E"> Modifier une éspéce végétale : </h2>

                            <br>
                            <div class="formCss">
                                <input type="text" id="idE" name="idE" readonly>
                            </div>

                            <div class="formCss">
                                <input placeholder="Nom" type="text" id="nomE1" name="nomE" required>
                            </div>


                            <div class="formCss">
                                <input placeholder="Hauteur potentiel" type="number" id="hauteur1" name="hauteur"
                                    required>
                            </div>
                           

                        <div style="flex-direction: row;width:130%;">
                            <input name="update" type="submit" class="buttonStyle" value="Modifier">
                            <input name="delete" type="submit" class="buttonStyle" value="Supprimer">
                            </div>
                        </form>

                    </div>

                    <!--try pop up show-->

                    <!-- end table -->
            </div>

        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/sidebar.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/theme.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/espece.js"></script>
</body>