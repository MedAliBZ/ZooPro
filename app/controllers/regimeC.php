<?php
class regimeC extends Controller
{
    public function __construct()
    {
        $this->regimeModel = $this->model('regimeM');
    }

    public function afficherList()
    {
         $tab = $this->regimeModel->afficherRegime();
           $data = [
            'tab' => ''
        ];


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<div class="table-head">
            <div class="serial">'. $value[0] .'</div>
            <div class="country">'. $value[1] .'</div>
            <div class="visit">'. $value[2] .'</div>
            <div class="visit">'. $value[3] .'</div>
            <div class="visit">'. $value[4] .'</div>
            </div>';
        }

        $this->view('regime',$data);
    }

}









