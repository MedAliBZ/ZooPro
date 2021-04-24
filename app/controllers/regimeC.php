<?php
class regimeC extends Controller
{
    public function __construct()
    {
        $this->regimeModel = $this->model('regimeM');
    }

    public function afficherList()
    {
        $tab = $this->regimeModel->findRegimeByID($_POST['id'] );
           $data = [
            'tab' => ''
        ];


        foreach ($tab as $key => $value) {
            $data['tab'] .= '
            <h3 class="change_color">le régime alimentaire corréspondant :</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
            <div class="table-head">
            <div class="serial">id</div>
            <div class="country">Nom régime</div>
            <div class="visit">type</div>
            <div class="visit">quantité par repas(kg)</div>
            <div class="visit">nombre de repas(jour)</div>

            </div>

            <div class="table-head">
            <div class="serial">'. $value[0] .'</div>
            <div class="country">'. $value[1] .'</div>
            <div class="visit">'. $value[2] .'</div>
            <div class="visit">'. $value[3] .'</div>
            <div class="visit">'. $value[4] .'</div>
            </div>
            </div>
            ';
        }

        $this->view('detailAnimal',$data);
    }

}









