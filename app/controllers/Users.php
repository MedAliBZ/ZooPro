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
                    if ($this->userModel->findUserByUsernameUpdate($data['username'],$_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['error'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = 'Please enter the correct format.';
                } else {
                    if ($this->userModel->findUserByEmailUpdate($data['email'],$_SESSION['id'])) {
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
                    if ($this->userModel->update($data)) {
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

    public function afficherList($error = '')
    {
        $tab = $this->userModel->afficher();
        $data = [
            'tab' => '',
            'error' => '',
            'errorUpdate' => ''
        ];
        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['error'] = implode(" ", $errorTab);
            } else if ($errorTab[0] == 'errUp') {
                array_shift($errorTab);
                $data['errorUpdate'] = implode(" ", $errorTab);
            } else {
                $data['error'] = '';
                $data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Username">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Email">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Admin">' . $value[3] . '</div>
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
                    if ($this->userModel->findUserByUsernameUpdate($data['username'],$data['id'])) {
                        $data['errorUpdate'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['errorUpdate'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['errorUpdate'] = 'Please enter the correct format.';
                } else {
                    if ($this->userModel->findUserByEmailUpdate($data['email'],$data['id'])) {
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
                }
            }
            $this->view('usersV', $data);
        }
    }
}