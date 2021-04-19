
<?php
class planteC extends Controller
{
    public function __construct()
    {
        $this->planteModel = $this->model('planteM');
    }

    public function addplanteC()
    {
        $data = [
            'nomP ' => '',
            'longevite ' => '',
            'origine ' => '',
            'taille ' => '',
            'famille ' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nomP' => trim($_POST['nomP']),
                'longevite' => trim($_POST['longevite']),
                'origine' => trim($_POST['origine']),
                'taille' => trim($_POST['taille']),
                'famille' => trim($_POST['famille']),
                'errorAdd' => ''
            ];

            //Validate nom_plante
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomP'])) { //check name regex
                $data['errorAdd'] = 'entrer un nom.';
            }

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'entrer la longevite du plante.';
            } elseif (!is_numeric($data['longevite'])) {
                $data['errorAdd'] = 'la longevite doit etre un numero.';
            }

            if (empty($data['taille'])) {
                $data['errorAdd'] = 'entrer une taille.';
            } elseif (!is_numeric($data['taille'])) {
                $data['errorAdd'] = 'la taille doit etre un numero.';
            }

            if (empty($data['famille'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer la famille de la plante.';
            } elseif (!ctype_alpha($data['famille'])) { //check name regex
                $data['errorAdd'] = 'entrer une famille .';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                 if (!$this->planteModel->addplanteC($data)) {
                     die('erreur.');
                }
           }
        }
        $this->view('plante', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->planteModel->afficherplante();
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('plante', $data);
    }

     public function deleteUpdateTabplante()
    {
        if (isset($_POST['delete'])) {
            $this->planteModel->deleteplante($_POST['idP']);
            header('location:' . URLROOT . '/pages/plante');

        } elseif (isset($_POST['update'])) {
            $data = [
                'idP',
                'nomP' => '',
                'longevite' => '',
                'origine' => '',
                'taille' => '',
                'famille' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'idP' => trim($_POST['idP']),
                    'nomP' => trim($_POST['nomP']),
                    'longevite' => trim($_POST['longevite']),
                    'origine' => trim($_POST['origine']),
                    'taille' => trim($_POST['taille']),
                    'famille' => trim($_POST['famille']),
                    'errorUpdate' => ''
                ];

                //Validate nom_regime
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomP'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'enter la longevite.';
            } elseif (!is_numeric($data['longevite '])) {
                $data['errorAdd'] = 'entrer la longevite.';
            }

            if (empty($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine geographique.';
            } elseif (!ctype_alpha($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine.';
            }

            if (empty($data['taille'])) {
                $data['errorAdd'] = ' entrer la taille du plante.';
            } elseif (!is_numeric($data['taille'])) {
                $data['errorAdd'] = 'entrer une taille.';
            }

            if (empty($data['famille'])) {
                $data['errorAdd'] = ' entrer la famille de la plante.';
            } elseif (!ctype_alpha($data['famille'])) {
                $data['errorAdd'] = 'entrer la famille.';
            }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add plante from model function
                    if (!$this->planteModel->updateplante($data)) {
                        die('erreur.');
                    }
                }
            }
            $this->view('plante', $data);
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