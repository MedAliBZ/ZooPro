<?php
if (isset($_SESSION['id']))
    header('location: ' . URLROOT . '/pages/usersV');
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
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form class="sign-in-form" action="<?php echo URLROOT; ?>/users/chercherEmail" method="POST">
                    <h2 class="title" style="text-align: center;margin-bottom:2%;">Retrouvez votre mot de passe</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur" name="username" id="login-username" required />
                    </div>
                    <p id="error-msg"><?php if (isset($data['error'])) {
                                            echo $data['error'];
                                        } ?></p>
                    <input type="submit" id="login" value="Chercher" name="chercher" class="btn solid" />
                    <p style="text-align: center;">Vous souvenez de votre mot de passe ? <a id="mdpOub" href="<?php echo URLROOT; ?>/Pages/index">Se connecter</a></p>
                </form>


                <form class="sign-up-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                    <h2 class="title" style="text-align: center;margin-bottom:2%;">Retrouvez votre nom d'utilisateur</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" id="login-username" required />
                    </div>
                    <p id="error-msg-signup"><?php if (isset($data['errorSignUp'])) {
                                                    echo $data['errorSignUp'];
                                                } ?></p>
                    
                        <input style="margin-right: 2%;" type="submit" id="login" value="Chercher" name="chercher" class="btn solid" />
                        <p style="text-align: center;">Vous souvenez de votre nom d'utilisateur ? <a id="mdpOub" href="<?php echo URLROOT; ?>/Pages/index">Se connecter</a></p>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nom d'utilisateur oublié ?</h3>
                    <p>
                        Cliquer ici pour retrouver votre nom d'utilisateur
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Retrouver
                    </button>
                </div>
                <img src="<?php echo URLROOT ?>/public/img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Mot de passe oublié ?</h3>
                    <p>
                        Cliquer ici pour retrouver votre mot de passe
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Retrouver
                    </button>
                </div>
                <img src="<?php echo URLROOT ?>/public/img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/login.js"></script>
</body>

</html>