<?php
class sponsor extends Controller
{
    public function __construct()
    {
        $this->sponModel = $this->model('sponsors');
    }

    public function addsponsor()
    {
        $data = [
            'nom' => '',
            'email' => '',
            'nb' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom' => trim($_POST['nom']),
                'email' => trim($_POST['email']),
                'nb' => trim($_POST['nb']),
                'errorAdd' => ''
            ];



            
 
            //Validate nom
            if (empty($data['nom'])) { //check if name is empty or not
              $data['errorAdd'] = 'Please enter your comapny name.';
             } else {
                if ($this->sponModel->findnom($data['nom'])) {
                    $data['errorAdd'] = 'nom est déja existe.';
                }
            }

            
            //validation numéro
             $numeroValidation = "/^[0-9]{8}$/";
             if (empty($data['nb'])) {
                  $data['errorAdd'] = 'merci d entrer le numéro de téléphone.';
                }elseif(!preg_match($numeroValidation, $data['nb'])) {
                 $data['errorAdd'] = 'merci de respecter la format.';
             } else {
                 if ($this->sponModel->findnum($data['nb'])) {
                     $data['errorAdd'] = 'numéro est déja existé.';
                 }
             }

             //Validate email
             if (empty($data['email'])) {
                $data['errorAdd'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['errorAdd'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->sponModel->findEmail($data['email'])) {
                    $data['errorAdd'] = 'Email is already taken.';
                }
            }

             // Make sure that errors are empty
             if (empty($data['errorAdd'])) {

                 //add employe from model function
                 if (!$this->sponModel->addsponsor($data)) {
                     die('Something went wrong.');
                 }
             }
        }
        $this->view('sponsor', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->sponModel->afficher();
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
            <div class="col col-2" data-label="NOM DE SOCIETE">' . $value[1] . '</div>
            <div class="col col-3" data-label="NUMERO DE TELEPHONE">' . $value[2] . '</div>
            <div class="col col-4" data-label="ADRESSE EMAIL">' . $value[3] . '</div>
            <div class="col col-5">
                <div class="col-buttons">
                    <button class="tab-btn"><i data-feather="edit"></i></button>
                </div>
            </div>
        </li>';
        }

        $this->view('sponsor', $data);
    }

    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->sponModel->deletesponsor($_POST['id']);
            header('location:' . URLROOT . '/pages/sponsor');

        } elseif (isset($_POST['update'])) {
            $data = [
                'id' => '',
                'nom' => '',
                'nb' => '',
                'email' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),                                    
                    'email' => trim($_POST['email']),
                    'nom' => trim($_POST['nom']),
                    'nb' => trim($_POST['nb']),
                    'errorUpdate' => ''
                ];

                
       //Validate nom
       if (empty($data['nom'])) { //check if name is empty or not
        $data['errorAdd'] = 'Please enter your comapny name.';
       } else {
          if ($this->sponModel->findnom($data['nom'])) {
              $data['errorSignUp'] = 'nom est déja existe.';
          }
      }

      
      //validation numéro
       $numeroValidation = "/^[0-9]{8}$/";
       if (empty($data['nb'])) {
            $data['errorAdd'] = 'merci d entrer le numéro de téléphone.';
          }elseif(!preg_match($numeroValidation, $data['nb'])) {
           $data['errorSignUp'] = 'merci de respecter la format.';
       } else {
           if ($this->sponModel->findnum($data['nb'])) {
               $data['errorSignUp'] = 'numéro est déja existé.';
           }
       }

       //Validate email
       if (empty($data['email'])) {
          $data['errorSignUp'] = 'Please enter email address.';
      } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['errorSignUp'] = 'Please enter the correct format.';
      } else {
          //Check if email exists.
          if ($this->sponModel->findEmail($data['email'])) {
              $data['errorSignUp'] = 'Email is already taken.';
          }
      }
    
               
    
                if (empty($data['nb'])) {
                    $data['errorUpdate'] = 'Please enter place number.';
                } elseif (!is_numeric($data['nb'])) {
                    $data['errorUpdate'] = 'salary can only contain numbers.';
                }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add employe from model function
                    if (!$this->sponModel->updateP($data)) {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('sponsor', $data);
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
                $loggedInUser = $this->sponModel->login($data['username'], $data['password']);

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
            $this->sponModel->deleteAccount($_SESSION['id']);
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
                    if ($this->sponModel->findUserByUsernameUpdate($data['username'], $_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['error'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = 'Please enter the correct format.';
                } else {
                    if ($this->sponModel->findUserByEmailUpdate($data['email'], $_SESSION['id'])) {
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
                    if ($this->sponModel->update($data)) {
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
