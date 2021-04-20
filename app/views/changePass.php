<?php
if (isset($_SESSION['id']))
    header('location: ' . URLROOT . '/pages/usersV');
if(!isset($data['username']))
    header('location: ' . URLROOT . '/Pages/resetPass');
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login.css" />
    <title>
        <?php echo SITENAME ?>
    </title>
</head>

<body>
    <div class="container <?php if (isset($data['key']) && !empty($data['key'])) {
                                echo "sign-up-mode";
                            } ?>">
        <div class="forms-container">
            <div class="signin-signup">

                <form class="sign-in-form" action="<?php echo URLROOT; ?>/users/useKey" method="POST">
                    <h2 class="title" style="text-align: center;margin-bottom:2%;">Ecrire le code reçu sur email</h2>
                    <input name="username" value="<?php echo $data['username'];  ?>" style="display: none;"/>
                    <div class="input-field">
                        <i class="fas fa-shield-alt"></i>
                        <input type="text" placeholder="Code" name="key" required />
                    </div>
                    <p id="error-msg"><?php if (isset($data['error'])) {
                                            echo $data['error'];
                                        } ?></p>
                    <div style="display: flex;">
                        <input style="margin-right: 2%;" type="submit" id="login" value="Valider" class="btn solid" />
                    </div>
                </form>


                <form class="sign-up-form" action="<?php echo URLROOT; ?>/users/changePassbyKey" method="POST">
                    <h2 class="title" style="text-align: center;margin-bottom:2%;">Changer votre mot de passe</h2>
                    <input name="username" value="<?php echo $data['username'];  ?>" style="display: none;"/>
                    <input name="key" value="<?php if(isset($data['key'])) {echo $data['key'];}  ?>" style="display: none;"/>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" name="password" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirmer le mot de passe" name="confirmPassword" required />
                    </div>
                    <p id="error-msg-signup"><?php if (isset($data['errorKey'])) {
                                                    echo $data['errorKey'];
                                                } ?></p>
                    <div style="display: flex;">
                        <input style="margin-right: 2%;" type="submit" id="login" value="Changer" class="btn solid" />
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Vous avez bien reçu un code sur votre email.</h3>
                    <p>
                        Veuillez sasir votre code pour continuer 
                    </p>
                </div>
                <img src="<?php echo URLROOT ?>/public/img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Changer votre mot de passe</h3>
                    <p>
                        Veuillez remplir les champs pour changer votre mot de passe
                    </p>
                </div>
                <img src="<?php echo URLROOT ?>/public/img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/login.js"></script>
</body>

</html>