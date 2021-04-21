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
  <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/img/logo.png" type="image/x-icon">
</head>

<body>
  <div class="container <?php if (isset($data['errorSignUp'])) {
                          echo "sign-up-mode";
                        } ?>">
    <div class="forms-container">
      <div class="signin-signup">

        <form class="sign-in-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
          <h2 class="title">Se connecter</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="username" required />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Mot de passe" name="password" id="login-password" required />
          </div>
          <div>
            <input type="checkbox" name="rememberMe" />
            <label for="rememberMe">Se souvenir de moi</label>
          </div>
          <p id="error-msg"><?php if (isset($data['error'])) {
                              echo $data['error'];
                            } ?></p>
          <input type="submit" id="login" value="Connexion" class="btn solid" />
          <a id="mdpOub" href="<?php echo URLROOT; ?>/Pages/resetPass">Mot de passe oublié ?</a>
        </form>


        <form class="sign-up-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
          <h2 class="title">S’inscrire</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="username" required />
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Mot de passe" name="password" required />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirmer le mot de passe" name="confirmPassword" required />
          </div>
          <p id="error-msg-signup" style="text-align: center;"><?php if (isset($data['errorSignUp'])) {
                                                                  echo $data['errorSignUp'];
                                                                } ?></p>
          <input type="submit" class="btn" value="S'inscrire" name="sign-up" />
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="<?php echo URLROOT ?>/public/img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
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