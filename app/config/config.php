<?php
    //Database params
    define('DB_HOST', 'localhost'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', ''); //Add your DB pass
    define('DB_NAME', 'zoo_pro'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://localhost/Zoo');

    //Sitename
    define('SITENAME', 'Login & Register script');

    function getConnexion () {
        $servername = 'localhost';	
        $username = 'root';	
        $password = '';       
        $dbname = 'zoo_pro';	
        try {
            $pdo = new PDO(
                "mysql:host=$servername;dbname=$dbname", 
                $username, 
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
 
            return $pdo;
        }
        catch(PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }
