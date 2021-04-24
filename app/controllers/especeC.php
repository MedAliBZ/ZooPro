
<?php
class especeC extends Controller
{
    public function __construct()
    {
        $this->especeModel = $this->model('especeM');
    }

    public function addespeceC()
    {
        $data = [
            'nomE ' => '',
            'hauteur ' => '',
            
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nomE' => trim($_POST['nomE']),
                'hauteur' => trim($_POST['hauteur']),
                
                'errorAdd' => ''
            ];

            //Validate nom_espece
            if (empty($data['nomE'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer un nom.';
            } elseif (!ctype_alpha($data['nomE'])) { //check name regex
                $data['errorAdd'] = 'entrer un nom.';
            }

            if (empty($data['hauteur'])) {
                $data['errorAdd'] = 'entrer l hauteur potentiel d une espece.';
            } elseif (!is_numeric($data['hauteur'])) {
                $data['errorAdd'] = 'l hauteur doit etre un numero.';
            }

            

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                 if (!$this->especeModel->addespeceC($data)) {
                     die('erreur.');
                }
           }
        }
        $this->view('espece', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->especeModel->afficherespece();
        $data = [
            'tab' => '',
            'errorAffiche' => ''
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
           
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('espece', $data);
    }

     public function deleteUpdateTabespece()
    {
        if (isset($_POST['delete'])) {
            $this->especeModel->deleteespece($_POST['idE']);
            header('location:' . URLROOT . '/pages/espece');

        } elseif (isset($_POST['update'])) {
            $data = [
                'idE',
                'nomE' => '',
                'hauteur' => '',
               
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'idE' => trim($_POST['idE']),
                    'nomE' => trim($_POST['nomE']),
                    'hauteur' => trim($_POST['hauteur']),
                    
                    'errorUpdate' => ''
                ];

                //Validate nom_espece
            if (empty($data['nomE'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomE'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['hauteur'])) {
                $data['errorAdd'] = 'enter l hauteur.';
            } elseif (!is_numeric($data['hauteur '])) {
                $data['errorAdd'] = 'entrer l hauteur.';
            }

          
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add plante from model function
                    if (!$this->especeModel->updateespece($data)) {
                        die('erreur.');
                    }
                }
            }
            $this->view('espece', $data);
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
                $loggedInUser = $this->employeModel->login($data['username'], $data['password']);

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
            $this->employeModel->deleteAccount($_SESSION['id']);
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
                    if ($this->employeModel->findUserByUsernameUpdate($data['username'], $_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['error'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = 'Please enter the correct format.';
                } else {
                    if ($this->employeModel->findUserByEmailUpdate($data['email'], $_SESSION['id'])) {
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
                    if ($this->employeModel->update($data)) {
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