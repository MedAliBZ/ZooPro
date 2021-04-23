<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'errorSignUp' => ''
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
                'errorSignUp' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['errorSignUp'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['errorSignUp'] = 'Name can only contain letters and numbers.';
            } else {
                if ($this->userModel->findUserByUsername($data['username'])) {
                    $data['errorSignUp'] = 'Username is already taken.';
                }
            }

            //Validate email
            if (empty($data['email'])) {
                $data['errorSignUp'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['errorSignUp'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['errorSignUp'] = 'Email is already taken.';
                }
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['errorSignUp'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['errorSignUp'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['errorSignUp'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['errorSignUp'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['errorSignUp'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['errorSignUp'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/index');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('index', $data);
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
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    if (isset($_POST['rememberMe'])) {
                        session_destroy();
                        ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
                        ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
                        session_name('dashboard');
                        session_start();
                        session_regenerate_id(true);
                    } else {
                        session_destroy();
                        session_name('dashboard');
                        session_start();
                        session_regenerate_id(true);
                    }
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
            $this->userModel->deleteAccount($_SESSION['id']);
            $this->logout();
        } elseif (isset($_POST['update'])) {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
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
                    'error' => ''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";

                if ($this->userModel->login($_SESSION['username'], $data['password'])) {
                    if (empty($data['username'])) {
                        $data['error'] = 'Please enter username.';
                    } elseif (!preg_match($nameValidation, $data['username'])) {
                        $data['error'] = 'Name can only contain letters and numbers.';
                    } elseif ($this->userModel->findUserByUsernameUpdate($data['username'], $_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }

                    if (empty($data['email'])) {
                        $data['error'] = 'Please enter email address.';
                    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                        $data['error'] = 'Please enter the correct format.';
                    } else {
                        if ($this->userModel->findUserByEmailUpdate($data['email'], $_SESSION['id'])) {
                            $data['error'] = 'Email is already taken.';
                        }
                    }
                    if (empty($data['error'])) {
                        if ($this->userModel->update($data)) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['email'] = $data['email'];
                            //Redirect to the same page
                            header('location: ' . URLROOT . '/pages/usersV');
                        } else {
                            die('Something went wrong.');
                        }
                    } else {
                        $errorTab = explode(" ", $data['error']);
                        $err = implode("-", $errorTab);
                        $this->afficherList("err-" . $err);
                    }
                } else {
                    $data['error'] = "Password does not match";
                    $errorTab = explode(" ", $data['error']);
                    $err = implode("-", $errorTab);
                    $this->afficherList("err-" . $err);
                }
            } else
                $this->view('usersV');
        } else
            $this->view('usersV');
    }

    public function afficherList($error = '')
    {
        if(!$this->userModel->findUserByUsername($_SESSION['username']))
            $this->logout();

        $tab = $this->userModel->afficher();
        $data = [
            'tab' => '',
            'error' => '',
            'errorUpdate' => '',
            'errorPass' => ''
        ];
        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['error'] = implode(" ", $errorTab);
            } else if ($errorTab[0] == 'errUp') {
                array_shift($errorTab);
                $data['errorUpdate'] = implode(" ", $errorTab);
            } else if ($errorTab[0] == 'errPs') {
                array_shift($errorTab);
                $data['errorPass'] = implode(" ", $errorTab);
            } else {
                $data['error'] = '';
                $data['errorUpdate'] = '';
                $data['errorPass'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Username">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Email">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Role">' . $value[3] . '</div>
                    <div class="col col-5">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
        }
        $this->view('usersV', $data);
    }

    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->userModel->deleteAccount($_POST['id']);
            if ($_POST['id'] == $_SESSION['id'])
                $this->logout();
            else header('location:' . URLROOT . '/pages/usersV');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'username' => '',
                'email' => '',
                'admin' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'admin' => trim($_POST['admin']),
                    'errorUpdate' => ''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";

                if (empty($data['username'])) {
                    $data['errorUpdate'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['errorUpdate'] = 'Name can only contain letters and numbers.';
                } else {
                    if ($this->userModel->findUserByUsernameUpdate($data['username'], $data['id'])) {
                        $data['errorUpdate'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['errorUpdate'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['errorUpdate'] = 'Please enter the correct format.';
                } else {
                    if ($this->userModel->findUserByEmailUpdate($data['email'], $data['id'])) {
                        $data['errorUpdate'] = 'Email is already taken.';
                    }
                }
                if (empty($data['errorUpdate'])) {
                    //update user from model function
                    if ($this->userModel->updateP($data)) {
                        if ($_POST['id'] == $_SESSION['id']) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['email'] = $data['email'];
                            if ($_POST['admin'] == 0)
                                $this->logout();
                        }
                        //Redirect to the same page
                        header('location: ' . URLROOT . '/pages/usersV');
                    } else {
                        die('Something went wrong.');
                    }
                } else {
                    $errorTab = explode(" ", $data['errorUpdate']);
                    $err = implode("-", $errorTab);
                    $this->afficherList("errUp-" . $err);
                }
            } else {
                $this->view('usersV', $data);
            }
        } else
            $this->view('usersV');
    }

    public function updatePass()
    {
        $data = [
            'password' => '',
            'confirmPassword' => '',
            'oldPassword' => '',
            'errorPass' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'oldPassword' => trim($_POST['oldPassword']),
                'errorPass' => ''
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if ($this->userModel->login($_SESSION['username'], $data['oldPassword'])) {
                if (empty($data['password'])) {
                    $data['errorPass'] = 'Please enter password.';
                } elseif (strlen($data['password']) < 6) {
                    $data['errorPass'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['errorPass'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['errorPass'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['errorPass'] = 'Passwords do not match, please try again.';
                    }
                }

                if (empty($data['errorPass'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if ($this->userModel->updatePass($data)) {
                        //Redirect to the same page
                        header('location: ' . URLROOT . '/pages/usersV');
                    } else {
                        die('Something went wrong.');
                    }
                } else {
                    $errorTab = explode(" ", $data['errorPass']);
                    $err = implode("-", $errorTab);
                    $this->afficherList("errPs-" . $err);
                }
            } else {
                $data['errorPass'] = "Password does not match old pass";
                $errorTab = explode(" ", $data['errorPass']);
                $err = implode("-", $errorTab);
                $this->afficherList("errPs-" . $err);
            }
        } else
            $this->view('usersV');
    }


    public function chercherEmail()
    {
        $data = [
            'username' => '',
            'email' => '',
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => '',
                'error' => ''
            ];

            if ($this->userModel->findUserByUsername($data['username'])) {
                $data['email'] = $this->userModel->findEmailByUsername($data['username']);
                //creation code
                $key = $this->userModel->createPassKey($data['username']);
                if ($key) {
                    //envoie mail
                    mail($data['email'][0], 'Password Reset', 'You code is: ' . $key, 'From: zooproresetpass@gmail.com');
                    //redirection
                    $this->view('changePass', $data);
                } else {
                    $data['error'] = "erreur inconnue!";
                    $this->view('resetPass', $data);
                }
            } else {
                $data['error'] = "username invalide!";
                $this->view('resetPass', $data);
            }
        } else
            header('location: ' . URLROOT . '/Pages/resetPass');
    }

    public function useKey()
    {
        $data = [
            'username' => '',
            'key' => '',
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'key' => trim($_POST['key']),
                'error' => ''
            ];
            if ($this->userModel->checkKey($data)) {
                $this->view('changePass', $data);
            } else {
                $data['key'] = '';
                $data['error'] = 'invalid key!';
            }
        }
        $this->view('changePass', $data);
    }

    public function changePassbyKey()
    {
        $data = [
            'username' => '',
            'key' => '',
            'errorKey' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'key' => trim($_POST['key']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'errorKey' => ''
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if (empty($data['password'])) {
                $data['errorKey'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['errorKey'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['errorKey'] = 'Password must be have at least one numeric value.';
            }

            if ($data['password'] != $data['confirmPassword'])
                $data['errorKey'] = 'Passwords does not match!';

            if (empty($data['errorKey'])) {
                if ($this->userModel->checkKey($data)) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if ($this->userModel->changePassWithKey($data)) {
                        $this->view('index');
                    } else
                        $data['errorKey'] = 'unexpected error';
                } else {
                    $data['errorKey'] = 'invalid key!';
                }
            }
        }
        $this->view('changePass', $data);
    }


    public function chercherUsername()
    {
        $data = [
            'username' => '',
            'email' => '',
            'errorEmail' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => '',
                'email' =>  trim($_POST['email']),
                'errorEmail' => ''
            ];

            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['username'] = $this->userModel->findUsernameByEmail($data['email']);
                //envoie mail
                mail($data['email'], 'Username Reset', 'Your username is: ' . $data['username'][0], 'From: zooproresetpass@gmail.com');
                //redirection
                header('location: ' . URLROOT . '/index');
            } else {
                $data['errorEmail'] = "email invalide!";
                $this->view('resetPass', $data);
            }
        } else
            header('location: ' . URLROOT . '/pages/resetPass');
    }

    public function trier($case='')
    {
        if(!$this->userModel->findUserByUsername($_SESSION['username']))
            $this->logout();

        $column = array("a" => "ID", "b" => "USERNAME", "c" => "EMAIL", "d" => "ROLE_ID");
        if (array_search($case, $column)) {
            $tab = $this->userModel->tri($case);
            $data = [
                'tab' => ''
            ];
            foreach ($tab as $key => $value) {
                $data['tab'] .= '<li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Username">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Email">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Role">' . $value[3] . '</div>
                    <div class="col col-5">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
            }
        }
        $this->view('usersV', $data);
    }

    public function filtrer($role='')
    {
        if(!$this->userModel->findUserByUsername($_SESSION['username']))
            $this->logout();

        $column = array("a" => "admin", "b" => "utilisateur");
        if (array_search($role, $column)) {
            $tab = $this->userModel->filter($role);
            $data = [
                'tab' => ''
            ];
            foreach ($tab as $key => $value) {
                $data['tab'] .= '<li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Username">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Email">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Role">' . $value[3] . '</div>
                    <div class="col col-5">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
            }
        }
        $this->view('usersV', $data);
    }
}
