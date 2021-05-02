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


                 {if ($this->typeModel->findTypeByID($data['id'])) {
                    $data['errorAdd'] = 'ID is already taken.';
                } }  


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

}
     
