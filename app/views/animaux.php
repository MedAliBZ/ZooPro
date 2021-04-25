<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/index');


if (!isset($data['tab'])) {
    if (isset($data['errorAdd']) && !empty($data['errorAdd'])) {
        $errorTab = explode(" ", $data['errorAdd']);
        $err = implode("-", $errorTab);
        header('location: ' . URLROOT . '/animauxC/afficherList/err-' . $err);
    } else
        header('location: ' . URLROOT . '/animauxC/afficherList');
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
                <input type="text" placeholder="recherche" name="rechercher" id="rechercher" />
                <i class="fas fa-search"></i>
            </div>

            <div class="card">
                <div class="firstRow" id="firstRow">
                    <h3 id="titreTab">La liste des animaux </h3>
                </div>
                <div class="containerTriAjout">
                
                <div class="containerTri">
                <button class="buttonStyle" id="triButton" >Trier</button>
                <div class="triElements" id="triElements">
                <a href="<?php echo URLROOT; ?>/animauxC/trierParID" id ="triId">Par ID</a>
                <a href="<?php echo URLROOT; ?>/animauxC/trierParAge" id ="triAge">Par Age</a>
                <a href="<?php echo URLROOT; ?>/animauxC/trierParNomAnimal" id ="triName">Par Nom Animal</a>
                </div>
                </div>
                <button class="buttonStyle" id="addButtonToList" onclick="openFormAjouter()">Ajouter un animal</button>
                </div>
                <div class="form-popup" id="myForm">
                    <form action="<?php echo URLROOT; ?>/animauxC/addAnimauxC" class="form-container" method="POST">

                        <h2> Ajouter un animal</h2>
                        <br>

                        <div class="formCss">
                            <input placeholder="nom animal" type="text" id="nomAnimal" name="nomAnimal" required>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorNomAnimal"></div>

                        <div class="formCss">
                        <select name="type" id="type" required>
                                <option value="0">choisir un type</option>
                                <option value="amphibiens">amphibiens </option>
                                <option value="oiseaux">oiseaux </option>
                                <option value="mammifere">mammifère </option>
                                <option value="reptiles"> reptiles </option>
                            </select>
                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorType"></div>

                        <div class="formCss">
                            <input placeholder="age" type="number" id="age" name="age" required>
                        </div>

                        <div class="formCss">
                            <input placeholder="pays de naissance" type="text" id="pays" name="pays" required>
                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorPays"></div>

                        <div class="formCss">
                            <select name="status" id="status" required>
                                <option value="0">choisir Le statut de conservation</option>
                                <option value="stable">stable </option>
                                <option value="Menacé">Menacé </option>
                                <option value="endanger">en danger </option>
                            </select>
                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorStatus"></div>

                        <div class="formCss">

                            <select id="regimeAlimentaire" name="regimeAlimentaire">
                                <option value="0">choisir id regime</option>
                                <?php if (isset($data['idRegime'])) {
                                    echo $data["idRegime"];
                                } ?>

                            </select>

                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorRegimeAlimentaire"></div>

                        <div class="formCss">
                            <input type="file" name="image" id="image" required>
                        </div>

                       


                        <!-- <div class="error-table">
                            <p>error : <?php if (isset($data['errorAdd'])) {
                                            echo $data["errorAdd"];
                                        } ?></p>
                        </div> -->

                        <input type="submit" class="buttonStyle" value="Ajouter" id="ajouterAnimal">
                        <button type="button" class="buttonStyle" onclick="closeForm()" value="annuler">Close</button>

                    </form>

                </div>
                <!-- start table -->

                <table class="styled-table" id="tableAnimaux">
                    <thead>
                        <tr> 
                            <th>id</th>  
                            <th>Nom animaux </th>
                            <th>type</th>
                            <th>age</th>
                            <th>pays</th>
                            <th>status</th>
                            <th>regime Alimentaire</th>
                            <th>image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php if (isset($data['tab'])) {
                        echo $data['tab'];
                    } ?>


                </table>
                <!-- MODIFIER HEREEEEEEE -->
                <div class="form-popup" id="myForm1">
                    <form action="<?php echo URLROOT; ?>/animauxC/deleteUpdateTabAnimal" class="form-container" method="POST">


                        <i class="fas fa-times" id="closeButton" onclick="closeFormModifier()"></i>
                        <h2> modifier un animal</h2>

                        <br>
                        <div class="formCss">
                            <input type="text" id="id" name="id" readonly>
                        </div>
                        <div class="formCss">
                            <input placeholder="nom animal" type="text" id="nomAnimal1" name="nomAnimal" required>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorNomAnimal1"></div>

                        <div class="formCss">
                        <select name="type" id="type1" required>
                                <option value="0">choisir un type</option>
                                <option value="amphibiens">amphibiens </option>
                                <option value="oiseaux">oiseaux </option>
                                <option value="mammifere">mammifère </option>
                                <option value="reptiles"> reptiles </option>
                            </select>
                        </div>
                        <!--erreur-->
                        <div class="errormsg" id="errorType1"></div>

                        <div class="formCss">
                            <input placeholder="age" type="number" id="age1" name="age" required>
                        </div>

                        <div class="formCss">
                            <input placeholder="pays de naissance" type="text" id="pays1" name="pays" required>
                        </div>

                         <!--erreur-->
                         <div class="errormsg" id="errorPays1"></div>

                        <div class="formCss">
                        <select name="status" id="status1" required>
                                <option value="0">choisir Le statut de conservation</option>
                                <option value="stable">stable </option>
                                <option value="Menacé">Menacé </option>
                                <option value="endanger">en danger </option>
                            </select>
                        </div>

                        <!--erreur-->
                        <div class="errormsg" id="errorStatus1"></div>

                        <div class="formCss">

                            <select id="regimeAlimentaire1" name="regimeAlimentaire">
                                <option value="0">choisir id regime</option>
                                <?php if (isset($data['idRegime'])) {
                                    echo $data["idRegime"];
                                } ?>

                            </select>

                        </div>

                         <!--erreur-->
                         <div class="errormsg" id="errorRegimeAlimentaire1"></div>

                        <div class="formCss">
                            <input type="file" name="image" id="image1" required >
                        </div>

                        <!-- <div class="error-table">
                            <p>error : <?php if (isset($data['errorUpdate'])) {
                                            echo $data["errorUpdate"];
                                        } ?></p>
                        </div>  -->

                        <input name="update" type="submit" class="buttonStyle" value="modifier" id="modifierAnimal">
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
    <script src="<?php echo URLROOT ?>/public/js/animaux.js"></script>
</body>