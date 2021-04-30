
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
            'image ' => '',
            'idespece ' => '',
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
                'image' => trim($_POST['image']),
                'idespece' => trim($_POST['idespece']),
                'errorAdd' => ''
            ];

            //Validate nom_plante
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            }

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'entrer la longevite du plante.';
            } 

            if (empty($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine du plante.';
            } 

            if (empty($data['taille'])) {
                $data['errorAdd'] = 'entrer une taille.';
            } 

            if (empty($data['famille'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer la famille de la plante.';
            } 

            if (empty($data['image'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer limage de la plante.';
            } 

            if (empty($data['idespece'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer l id de lespece de la plante.';
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
            'idespece' => '',
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5]."-".$value[6]."-".$value[7].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td> <img src="../public/img/' . $value[6] . '" width = "75" height = "50"/></td>
            
            <td>'. $value[7] .'</td>
           
            
            <td> <i class="fas fa-edit updateButton" onclick="openFormModifier()"  >
        </tr>';
        }

        $idespece = $this->planteModel->listespeceID();
        foreach ($idespece as $key => $value)
        {
            $data['idespece'] .= '<option value="'.$value[0].'">'.$value[0].'</option>';
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
                'image' => '',
                'idespece' => '',
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
                    'image' => trim($_POST['image']),
                    'idespece' => trim($_POST['idespece']),
                   
                    'errorUpdate' => ''
                ];

              
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } 

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'enter la longevite.';
            }

            if (empty($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine geographique.';
            } 

            if (empty($data['taille'])) {
                $data['errorAdd'] = ' entrer la taille du plante.';
            } 

            if (empty($data['famille'])) {
                $data['errorAdd'] = ' entrer la famille de la plante.';
            } 

            if (empty($data['image'])) {
                $data['errorAdd'] = ' entrer l image de la plante.';
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


    public function sortplante($error = '')
    {
        $tab = $this->planteModel->sortplanteByTaille();
        $data = [
            'tab' => '',
            'idespece' => '',
            'errorAdd' => ''
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5]."-".$value[6]."-".$value[7].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td>'. $value[6] .'</td>
            <td>'. $value[7] .'</td>
            
            <td> <i class="fas fa-edit updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $idespece = $this->planteModel->listespeceID();
        foreach ($idespece as $key => $value)
        {
            $data['idespece'] .= '<option value="'.$value[0].'">'.$value[0].'</option>';
        }


        $this->view('plante', $data);
    }
   

    public function getplante()
    {       
    if(isset($_POST['search_plante'])) {
        $tab = $this->planteModel->getplanteByID($_POST['idP']);
    }

       $data = [
            'tab' => '',
            'idespece' => '',
            'errorAdd' => ''
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5]."-".$value[6]."-".$value[7].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td>'. $value[6] .'</td>
            <td>'. $value[7] .'</td>
            
            <td> <i class="fas fa-edit updateButton" onclick="openFormModifier()" >
        </tr>';
        }

        $idespece = $this->planteModel->listespeceID();
        foreach ($idespece as $key => $value)
        {
            $data['idespece'] .= '<option value="'.$value[0].'">'.$value[0].'</option>';
        }


        $this->view('plante', $data);
    }

    

}