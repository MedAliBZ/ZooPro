<?php
//require_once '../app/config/config.php';
require_once '../app/models/participations.php';
class participation extends Controller
{
    public function __construct()
    {
        $this->participationModel = $this->model('participations');
    }

    public function addparticipation()
    {
        $data = [
            'id_user' => '',
            'id_event' => '',
            'nb' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id_user' => trim($_POST['id_user']),
                'id_event' => trim($_POST['id_event']),
                'nb' => trim($_POST['nb']),
                'errorAdd' => ''
            ];
            
             $_SESSION['error'] = null ; 
            // Make sure that errors are empty
            //if (empty($data['errorAdd'])) {
                    
                //add employe from model function
                  if (!$this->participationModel->addparticipation($data)) {
                    $_SESSION['error']='nombre d evenement dépassé';
                    $this->view('evenement', $data);
                   
                  }
            //}
        }
       
        $this->view('evenement', $data);
    }
}