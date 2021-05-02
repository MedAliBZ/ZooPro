<?php
class regimeC extends Controller
{
    public function __construct()
    {
        $this->regimeModel = $this->model('regimeM');
    }

    public function addRegimeC()
    {
        $data = [
            'nom_regime ' => '',
            'type_nourriture ' => '',
            'quantite_par_repas ' => '',
            'nombre_de_repas ' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom_regime' => trim($_POST['nom_regime']),
                'type_nourriture' => trim($_POST['type_nourriture']),
                'quantite_par_repas' => trim($_POST['quantite_par_repas']),
                'nombre_de_repas' => trim($_POST['nombre_de_repas']),
                'errorAdd' => ''
            ];

            //Validate nom_regime
            if (empty($data['nom_regime'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nom_regime'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['type_nourriture'])) {
                $data['errorAdd'] = 'Please enter the type of food.';
            } elseif (!ctype_alpha($data['type_nourriture'])) {
                $data['errorAdd'] = 'Please enter the type.';
            }

            if (empty($data['nombre_de_repas'])) {
                $data['errorAdd'] = 'Please enter a number of meals.';
            } elseif (!is_numeric($data['nombre_de_repas'])) {
                $data['errorAdd'] = 'number of meals can only contain numbers.';
            }

            if (empty($data['quantite_par_repas'])) {
                $data['errorAdd'] = 'Please enter the quantity.';
            } elseif (!is_numeric($data['quantite_par_repas'])) {
                $data['errorAdd'] = 'the quantity can only contain numbers.';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                if (!$this->regimeModel->addRegimeC($data)) {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('regime', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->regimeModel->afficherRegime();
        $data = [
            'tab' => '',
            'errorAffiche' => '',
            'herbivore' => '',
            'omnivore' => '',
            'frugivore' => '',
            'carnivore' => '',
            'granivore' => ''


        ];
        //stat elements

        $herbivore = $this->regimeModel->getHerbivore();
        $data['herbivore'] = $herbivore[0][0];

        $omnivore = $this->regimeModel->getOmnivore();
        $data['omnivore'] = $omnivore[0][0];

        $frugivore = $this->regimeModel->getFrugivore();
        $data['frugivore'] = $frugivore[0][0];


        $carnivore = $this->regimeModel->getCarnivore();
        $data['carnivore'] = $carnivore[0][0];

        $granivore = $this->regimeModel->getGranivore();
        $data['granivore'] = $granivore[0][0];

        //

        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['errorAdd'] = implode(" ", $errorTab);
            } else if ($errorTab[0] == 'errUp') {
                array_shift($errorTab);
                $data['errorUpdate'] = implode(" ", $errorTab);
            } else {
                $data['errorAdd'] = '';
                $data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . '>
            <td >' . $value[0] . '</td>
            <td>' . $value[1] . '</td>
            <td>' . $value[2] . '</td>
            <td>' . $value[3] . '</td>
            <td>' . $value[4] . '</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('regime', $data);
    }

    public function deleteUpdateTabRegime()
    {
        if (isset($_POST['delete'])) {
            $this->regimeModel->deleteRegime($_POST['id']);
            header('location:' . URLROOT . '/pages/regime');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'nom_regime' => '',
                'type_nourriture' => '',
                'quantite_par_repas' => '',
                'nombre_de_repas' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'nom_regime' => trim($_POST['nom_regime']),
                    'type_nourriture' => trim($_POST['type_nourriture']),
                    'quantite_par_repas' => trim($_POST['quantite_par_repas']),
                    'nombre_de_repas' => trim($_POST['nombre_de_repas']),
                    'errorUpdate' => ''
                ];

                

                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {

                    //add employe from model function
                    if (!$this->regimeModel->updateRegime($data)) {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('regime', $data);
        }
    }

    public function trierParID()
    {
        $tab = $this->regimeModel->triID();
        $data = [
            'tab' => '',
            'herbivore' => '',
            'omnivore' => '',
            'frugivore' => '',
            'carnivore' => '',
            'granivore' => ''


        ];
        //stat elements

        $herbivore = $this->regimeModel->getHerbivore();
        $data['herbivore'] = $herbivore[0][0];

        $omnivore = $this->regimeModel->getOmnivore();
        $data['omnivore'] = $omnivore[0][0];

        $frugivore = $this->regimeModel->getFrugivore();
        $data['frugivore'] = $frugivore[0][0];


        $carnivore = $this->regimeModel->getCarnivore();
        $data['carnivore'] = $carnivore[0][0];

        $granivore = $this->regimeModel->getGranivore();
        $data['granivore'] = $granivore[0][0];

        //

        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . '>
            <td >' . $value[0] . '</td>
            <td>' . $value[1] . '</td>
            <td>' . $value[2] . '</td>
            <td>' . $value[3] . '</td>
            <td>' . $value[4] . '</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('regime', $data);
    }

    public function trierParNombreRepas()
    {
        $tab = $this->regimeModel->triNombreRepas();
        $data = [
            'tab' => '',
            'herbivore' => '',
            'omnivore' => '',
            'frugivore' => '',
            'carnivore' => '',
            'granivore' => ''


        ];
        //stat elements

        $herbivore = $this->regimeModel->getHerbivore();
        $data['herbivore'] = $herbivore[0][0];

        $omnivore = $this->regimeModel->getOmnivore();
        $data['omnivore'] = $omnivore[0][0];

        $frugivore = $this->regimeModel->getFrugivore();
        $data['frugivore'] = $frugivore[0][0];


        $carnivore = $this->regimeModel->getCarnivore();
        $data['carnivore'] = $carnivore[0][0];

        $granivore = $this->regimeModel->getGranivore();
        $data['granivore'] = $granivore[0][0];

        //


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . '>
            <td >' . $value[0] . '</td>
            <td>' . $value[1] . '</td>
            <td>' . $value[2] . '</td>
            <td>' . $value[3] . '</td>
            <td>' . $value[4] . '</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('regime', $data);
    }

    public function trierParNomRegime()
    {
        $tab = $this->regimeModel->triNomregime();
        $data = [
            'tab' => '',
            'herbivore' => '',
            'omnivore' => '',
            'frugivore' => '',
            'carnivore' => '',
            'granivore' => ''


        ];
        //stat elements

        $herbivore = $this->regimeModel->getHerbivore();
        $data['herbivore'] = $herbivore[0][0];

        $omnivore = $this->regimeModel->getOmnivore();
        $data['omnivore'] = $omnivore[0][0];

        $frugivore = $this->regimeModel->getFrugivore();
        $data['frugivore'] = $frugivore[0][0];


        $carnivore = $this->regimeModel->getCarnivore();
        $data['carnivore'] = $carnivore[0][0];

        $granivore = $this->regimeModel->getGranivore();
        $data['granivore'] = $granivore[0][0];

        //


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . '>
            <td >' . $value[0] . '</td>
            <td>' . $value[1] . '</td>
            <td>' . $value[2] . '</td>
            <td>' . $value[3] . '</td>
            <td>' . $value[4] . '</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('regime', $data);
    }
}
