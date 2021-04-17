<?php
class Employes extends Controller
{
    public function __construct()
    {
        $this->employeModel = $this->model('Employe');
    }

    public function addEmployes()
    {
        $data = [
            'cin' => '',
            'nom' => '',
            'prenom' => '',
            'dateNaissance' => '',
            'salaire' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'cin' => trim($_POST['cin']),
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'dateNaissance' => trim($_POST['dateNaissance']),
                'salaire' => trim($_POST['salaire']),
                'errorAdd' => ''
            ];



            //Validate cin on numbers
            if (empty($data['cin'])) {
                $data['errorAdd'] = 'Please enter cin.';
            } elseif (!is_numeric($data['cin'])) {
                $data['errorAdd'] = 'Cin can only contain numbers.';
            } else {
                if ($this->employeModel->findUserByCin($data['cin'])) {
                    $data['errorAdd'] = 'Cin is already taken.';
                }
            }

            //Validate nom
            if (empty($data['nom'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter your name.';
            } elseif (!ctype_alpha($data['nom'])) { //check name regex
                $data['errorAdd'] = 'Please enter your real name.';
            }

            if (empty($data['prenom'])) {
                $data['errorAdd'] = 'Please enter your surname.';
            } elseif (!ctype_alpha($data['prenom'])) {
                $data['errorAdd'] = 'Please enter your real surname.';
            }

            if (empty($data['salaire'])) {
                $data['errorAdd'] = 'Please enter a salary.';
            } elseif (!is_numeric($data['salaire'])) {
                $data['errorAdd'] = 'salary can only contain numbers.';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                if (!$this->employeModel->addEmployes($data)) {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('employes', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->employeModel->afficher();
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
            $data['tab'] .= '<li class="table-row">
            <div class="col col-1" data-label="ID">' . $value[0] . '</div>
            <div class="col col-2" data-label="CIN">' . $value[1] . '</div>
            <div class="col col-3" data-label="Nom">' . $value[2] . '</div>
            <div class="col col-4" data-label="Prenom">' . $value[3] . '</div>
            <div class="col col-5" data-label="Date de naissance">' . $value[4] . '</div>
            <div class="col col-6" data-label="Salaire">' . $value[5] . '</div>
            <div class="col col-7">
                <div class="col-buttons">
                    <button class="tab-btn"><i data-feather="edit"></i></button>
                </div>
            </div>
        </li>';
        }

        $this->view('employes', $data);
    }

    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->employeModel->deleteEmploye($_POST['id']);
            header('location:' . URLROOT . '/pages/employes');

        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'cin' => '',
                'nom' => '',
                'prenom' => '',
                'dateNaissance' => '',
                'salaire' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'cin' => trim($_POST['cin']),
                    'nom' => trim($_POST['nom']),
                    'prenom' => trim($_POST['prenom']),
                    'dateNaissance' => trim($_POST['dateNaissance']),
                    'salaire' => trim($_POST['salaire']),
                    'errorUpdate' => ''
                ];

                if (empty($data['cin'])) {
                    $data['errorUpdate'] = 'Please enter cin.';
                } elseif (!is_numeric($data['cin'])) {
                    $data['errorUpdate'] = 'Cin can only contain numbers.';
                } else {
                    if ($this->employeModel->findUserByCinUpdate($data['cin'],$data['id'])) {
                        $data['errorUpdate'] = 'Cin is already taken.';
                    }
                }
    
                //Validate nom
                if (empty($data['nom'])) { //check if name is empty or not
                    $data['errorUpdate'] = 'Please enter your name.';
                } elseif (!ctype_alpha($data['nom'])) { //check name regex
                    $data['errorUpdate'] = 'Please enter your real name.';
                }
    
                if (empty($data['prenom'])) {
                    $data['errorUpdate'] = 'Please enter your surname.';
                } elseif (!ctype_alpha($data['prenom'])) {
                    $data['errorUpdate'] = 'Please enter your real surname.';
                }
    
                if (empty($data['salaire'])) {
                    $data['errorUpdate'] = 'Please enter a salary.';
                } elseif (!is_numeric($data['salaire'])) {
                    $data['errorUpdate'] = 'salary can only contain numbers.';
                }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add employe from model function
                    if (!$this->employeModel->updateP($data)) {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('employes', $data);
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
