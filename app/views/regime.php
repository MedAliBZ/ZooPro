<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');


if (!isset($data['tab'])) {
    if (isset($data['errorAdd']) && !empty($data['errorAdd'])) {
        $errorTab = explode(" ", $data['errorAdd']);
        $err = implode("-", $errorTab);
        header('location: ' . URLROOT . '/regimeC/afficherList/err-' . $err);
    } else
        header('location: ' . URLROOT . '/regimeC/afficherList');
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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/animaux.css" />
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
                <li class="item ">
                    <a href="<?php echo URLROOT ?>/pages/employes" class="menu-btn">
                        <i class="fas fa-user-friends"></i><span>Employés</span>
                    </a>
                </li>
                <li class="item active " id="profile">
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
            <div class="searchCss" id="search">
                <input type="text" placeholder="recherche" name="search" />
                <i class="fas fa-search"></i>
            </div>

            <div class="card">
                <div class="firstRow" id="firstRow">
                    <h3 id="titreTab">La liste des régimes alimentaires </h3>
                </div>

                <button class="buttonStyle" id="addButtonToList" onclick="openFormAjouter()">Ajouter un régime</button>
                <div class="form-popup" id="myForm">
                    <form action="<?php echo URLROOT; ?>/regimeC/addRegimeC" class="form-container" method="POST">

                        <h2> Ajouter un régime alimentaire</h2>
                        <br>

                        <div class="formCss">
                            <select name="nom_regime" id="regimeAlimentaire">
                                <option value="0">choisir un régime</option>
                                <option value="herbivore">herbivore </option>   
                                <option value="granivore">granivore </option>
                                <option value="frugivore">frugivore </option>
                                <option value="omnivore"> omnivore </option>
                                <option value="carnivore">carnivore </option>
                            </select>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorRegimeAlimentaire"></div>

                        <div class="formCss">
                            <input placeholder="type Nourriture" type="text" id="typeNourriture" name="type_nourriture" required>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorTypeNourriture"></div>

                        <div class="formCss">
                            <input placeholder="quantité par repas(kg)" type="text" id="quantiteParRepas" name="quantite_par_repas" required>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorQuantiteParRepas"></div>

                        <div class="formCss">
                            <input type="text" placeholder="nombre de repas(jour)" name="nombre_de_repas" id="nombre_de_repas" required />
                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorNombreDeRepas"></div>

                        <!-- <div class="error-table"><p>error : <?php /* if (isset($data['errorAdd'])) {
                                                                        echo $data["errorAdd"];
                                                                    }*/ ?></p></div> -->

                        <input type="submit" class="buttonStyle" value="Ajouter" id="ajouterRegime">
                        <button type="button" class="buttonStyle" onclick="closeForm()" value="annuler">Close</button>

                    </form>

                </div>
                <!-- start table -->

                <table class="styled-table" id="tableRegime">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom régime </th>
                            <th>type nourriture</th>
                            <th>quantité par repas(kg)</th>
                            <th>nombre de repas(jour)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php if (isset($data['tab'])) {
                        echo $data['tab'];
                    } ?>


                </table>
                <!-- MODIFIER HEREEEEEEE -->
                <div class="form-popup" id="myForm1">
                    <form action="<?php echo URLROOT; ?>/regimeC/deleteUpdateTabRegime" class="form-container" method="POST">


                        <i class="fas fa-times" id="closeButton" onclick="closeFormModifier()"></i>
                        <h2> modifier un régime alimentaire</h2>

                        <br>
                        <div class="formCss">
                            <input type="text" id="id" name="id" readonly>
                        </div>


                        <div class="formCss">
                            <select name="nom_regime" id="regimeAlimentaire1">
                                <option value="0">choisir un régime</option>
                                <option value="herbivore">herbivore </option>
                                <option value="granivore">granivore </option>
                                <option value="frugivore">frugivore </option>
                                <option value="omnivore">omnivore </option>
                                <option value="carnivore">carnivore </option>
                            </select>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorRegimeAlimentaire1"></div>

                        <div class="formCss">
                            <input placeholder="type Nourriture" type="text" id="typeNourriture1" name="type_nourriture" required >
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorTypeNourriture1"></div>
                        <div class="formCss">
                            <input placeholder="quantité par repas(kg)" type="text" id="quantiteParRepas1" name="quantite_par_repas" required >
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorQuantiteParRepas1"></div>

                        <div class="formCss">
                            <input type="text" placeholder="nombre de repas(jour)" name="nombre_de_repas" id="nombre_de_repas1" required />
                        </div>


                        <!--erreur-->
                        <div class="errormsg" id="errorNombreDeRepas1"></div>

                        <!-- <div class="error-table">
                            <p>error : <?php if (isset($data['errorUpdate'])) {
                                            echo $data["errorUpdate"];
                                        } ?></p>
                        </div> -->

                        <input name="update" type="submit" class="buttonStyle" value="modifier" id="modifierRegime">
                        <input name="delete" type="submit" class="buttonStyle" value="Supprimer">

                    </form>

                </div>

                <!--try pop up show-->

                <!-- end table -->
            </div>

        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->
    <script src="<?php echo URLROOT ?>/public/js/sidebar.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/theme.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/regime.js"></script>
</body>