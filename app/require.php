<?php
    //Require libraries from folder libraries
    require_once 'libraries/Core.php'; //call controllers from url
    require_once 'libraries/Controller.php'; //call view and model
    require_once 'libraries/Database.php'; //connection and querries

    require_once 'helpers/session_helper.php'; //keep you logged in

    require_once 'config/config.php'; //global variables

    //Instantiate core class
    $init = new Core();
