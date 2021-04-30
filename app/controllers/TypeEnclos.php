<?php
class TypeEnclos extends Controller
{
    public function __construct()
    {
        $this->typeModel = $this->model('TypeEnclo');
    }

    public function addTypes()
    {
        $data = [
            'id' => '',
            'label' => '',
            'structure' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => trim($_POST['id']),
                'label' => trim($_POST['label']),
                'structure' => trim($_POST['structure']),
                'errorAdd' => ''
            ];

                //$idValidation = "/^[a-zA-Z0-9]*$/";

                //Validate id on letters/numbers
                 {if ($this->typeModel->findTypeByID($data['id'])) {
                    $data['errorAdd'] = 'ID is already taken.';
                } }  

                // //Validate label
                // if (empty($data['label'])) { //check if label is empty or not
                //     $data['errorAdd'] = 'Please enter the label.';
                // } elseif (!ctype_alpha($data['label'])) { //check label regex
                //     $data['errorAdd'] = 'Please enter the real label.';
                // }

                // //Validate structure
                // if (empty($data['structure'])) { //check if structure is empty or not
                //     $data['errorAdd'] = 'Please enter the structure.';
                // } elseif (!ctype_alpha($data['structure'])) { //check structure regex
                //     $data['errorAdd'] = 'Please enter the real structure.';
                // }



            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //Register user from model function
                if ($this->typeModel->addTypes($data)) {
                 $this->view('typeEnclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
        $this->view('typeEnclos', $data);
    }

    
    public function afficherList($error = '')
    {
        $tab = $this->typeModel->afficher();
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
            //  else if ($errorTab[0] == 'errUp') {
            //      array_shift($errorTab);
            //      $data['errorUpdate'] = implode(" ", $errorTab);
            // } 
            else {
                $data['errorAdd'] = '';
                 //$data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Label">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Structure">' . $value[2] . '</div>
                    <div class="col col-4">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                   </li>';
        }

        $this->view('typeEnclos', $data);
    }

    
    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->typeModel->deleteType($_POST['id']);
            header('location:' . URLROOT . '/pages/types');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'label' => '',
                'structure' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'label' => trim($_POST['label']),
                    'structure' => trim($_POST['structure']),
                    'errorUpdate' => ''
                ];
                
                 //$idValidation = "/^[a-zA-Z0-9]*$/";

                //Validate id on letters/numbers
                // if (empty($data['id'])) {
                //     $data['errorUpdate'] = 'Please enter id.';
                // } elseif (!preg_match($idValidation, $data['id'])) {
                //     $data['errorUpdate'] = 'id can only contain letters and numbers.';
                // }   

                //Validate label
                // if (empty($data['label'])) { //check if label is empty or not
                //     $data['errorUpdate'] = 'Please enter the label.';
                // } elseif (!ctype_alpha($data['label'])) { //check label regex
                //     $data['errorUpdate'] = 'Please enter the real label.';
                // }

                // //Validate structure
                // if (empty($data['structure'])) { //check if structure is empty or not
                //     $data['errorUpdate'] = 'Please enter the structure.';
                // } elseif (!ctype_alpha($data['structure'])) { //check structure regex
                //     $data['errorUpdate'] = 'Please enter the real structure.';
                // }



            // Make sure that errors are empty
            if (empty($data['errorUpdate'])) {

                //Register user from model function
                if ($this->typeModel->updateT($data)) {
                 $this->view('typeEnclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
                
            $this->view('typeEnclos', $data);
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
