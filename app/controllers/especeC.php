<?php
class especeC extends Controller
{
    public function __construct()
    {
        $this->especeModel = $this->model('especeM');
    }

    public function afficherList()
    {
        $tab = $this->especeModel->findespeceByID($_POST['idE'] );
           $data = [
            'tab' => ''
        ];


        foreach ($tab as $key => $value) {
            $data['tab'] .= '
            <h3 class="change_color">lespece vegetale corréspondante :</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
            <div class="table-head">
            <div class="serial">idE</div>
            <div class="country">Nom espece</div>
            <div class="visit">hauteur potentiel</div>
            

            </div>

            <div class="table-head">
            <div class="serial">'. $value[0] .'</div>
            <div class="country">'. $value[1] .'</div>
            <div class="visit">'. $value[2] .'</div>
            
            </div>
            </div>
            ';
        }

        $this->view('detailplante',$data);
    }

}









