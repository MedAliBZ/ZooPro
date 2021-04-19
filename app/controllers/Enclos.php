<?php
class Enclos extends Controller
{
    public function __construct()
    {
        $this->encloModel = $this->model('Enclo');
    }

    public function addEnclos()
    {
        $data = [
            'appellation' => '',
            'localisation' => '',
            'taille' => '',
            'dateConstruction' => '',
            'capaciteMaximale' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'appellation' => trim($_POST['appellation']),
                'localisation' => trim($_POST['localisation']),
                'taille' => trim($_POST['taille']),
                'dateConstruction' => trim($_POST['dateConstruction']),
                'capaciteMaximale' => trim($_POST['capaciteMaximale']),
                'errorAdd' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

             //Validate appellation
                if (empty($data['appellation'])) { //check if name is empty or not
                    $data['errorAdd'] = 'Please enter the name.';
                } elseif (!ctype_alpha($data['appellation'])) { //check name regex
                    $data['errorAdd'] = 'Please enter the real name.';
                }

             //Validate localisation
                if (empty($data['localisation'])) { //check if location is empty or not
                    $data['errorAdd'] = 'Please enter the location.';
                } elseif (!ctype_alpha($data['localisation'])) { //check location regex
                    $data['errorAdd'] = 'Please enter the real location.';
                }
              //Validate taille
                 if (empty($data['taille'])) {
                    $data['errorAdd'] = 'Please enter the size.';
                } elseif (!is_numeric($data['taille'])) {
                    $data['errorAdd'] = 'size can only contain numbers.';
                }
              //Validate capacite
                 if (empty($data['capaciteMaximale'])) {
                    $data['errorAdd'] = 'Please enter the capacity.';
                } elseif (!is_numeric($data['capaciteMaximale'])) {
                    $data['errorAdd'] = 'capacity can only contain numbers.';
                }



            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //Register user from model function
                if ($this->encloModel->addEnclos($data)) {
                 $this->view('enclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
        $this->view('enclos', $data);
    }

    
    public function afficherList($error = '')
    {
        $tab = $this->encloModel->afficher();
        $data = [
            'tab' => '',
            'errorAdd' => ''
        ];
        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['errorAdd'] = implode(" ", $errorTab);
            }
             else if ($errorTab[0] == 'errUp') {
                 array_shift($errorTab);
                 $data['errorUpdate'] = implode(" ", $errorTab);
            } 
            else {
                $data['errorAdd'] = '';
                 $data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= ' <li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Appellation">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Localisation">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Taille">' . $value[3] . '</div>
                    <div class="col col-5" data-label="Date de construction">' . $value[4] . '</div>
                    <div class="col col-6" data-label="Capacite maximale">' . $value[5] . '</div>


                    <div class="col col-7">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
        }

        $this->view('enclos', $data);
    }

    
    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->encloModel->deleteEnclo($_POST['id']);
            header('location:' . URLROOT . '/pages/enclos');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'appellation' => '',
                'localisation' => '',
                'taille' => '',
                'dateConstruction' => '',
                'capaciteMaximale' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'appellation' => trim($_POST['appellation']),
                    'localisation' => trim($_POST['localisation']),
                    'taille' => trim($_POST['taille']),
                    'dateConstruction' => trim($_POST['dateConstruction']),
                    'capaciteMaximale' => trim($_POST['capaciteMaximale']),
                    'errorUpdate' => ''
                ];
                
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

             //Validate appellation
                if (empty($data['appellation'])) { //check if name is empty or not
                    $data['errorUpdate'] = 'Please enter the name.';
                } elseif (!ctype_alpha($data['appellation'])) { //check name regex
                    $data['errorUpdate'] = 'Please enter the real name.';
                }

             //Validate localisation
                if (empty($data['localisation'])) { //check if location is empty or not
                    $data['errorUpdate'] = 'Please enter the location.';
                } elseif (!ctype_alpha($data['localisation'])) { //check location regex
                    $data['errorUpdate'] = 'Please enter the real location.';
                }
              //Validate taille
                 if (empty($data['taille'])) {
                    $data['errorUpdate'] = 'Please enter the size.';
                } elseif (!is_numeric($data['taille'])) {
                    $data['errorUpdate'] = 'size can only contain numbers.';
                }
              //Validate capacite
                 if (empty($data['capaciteMaximale'])) {
                    $data['errorUpdate'] = 'Please enter the capacity.';
                } elseif (!is_numeric($data['capaciteMaximale'])) {
                    $data['errorUpdate'] = 'capacity can only contain numbers.';
                }



            // Make sure that errors are empty
            if (empty($data['errorUpdate'])) {

                //Register user from model function
                if ($this->encloModel->updateE($data)) {
                 $this->view('enclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
                
            $this->view('enclos', $data);
        }
    }

    

    public function login()
    {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'error' => ''
        ];

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'error' => ''
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['error'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['error'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['error'])) {
                $loggedInUser = $this->encloModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['error'] = 'Mot de passe ou nom d\'utilisateur est incorrect. Veuillez réessayer.';

                    $this->view('index', $data);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'error' => ''
            ];
        }
        $this->view('index', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/usersV');
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }

    public function deleteUpdate()
    {
        if (isset($_POST['delete'])) {
            $this->encloModel->deleteAccount($_SESSION['id']);
            $this->logout();
        } elseif (isset($_POST['update'])) {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'error' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'error' => ''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                //Validate username on letters/numbers
                if (empty($data['username'])) {
                    $data['error'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['error'] = 'Name can only contain letters and numbers.';
                } else {
                    if ($this->encloModel->findUserByUsernameUpdate($data['username'],$_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['error'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = 'Please enter the correct format.';
                } else {
                    if ($this->encloModel->findUserByEmailUpdate($data['email'],$_SESSION['id'])) {
                        $data['error'] = 'Email is already taken.';
                    }
                }
                // Validate password on length, numeric values,
                if (empty($data['password'])) {
                    $data['error'] = 'Please enter password.';
                } elseif (strlen($data['password']) < 6) {
                    $data['error'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['error'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['error'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['error'] = 'Passwords do not match, please try again.';
                    }
                }


                // Make sure that errors are empty
                if (empty($data['error'])) {
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //update user from model function
                    if ($this->encloModel->update($data)) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['email'] = $data['email'];
                        //Redirect to the same page
                        header('location: ' . URLROOT . '/pages/usersV');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('usersV', $data);
        }
    }

}
