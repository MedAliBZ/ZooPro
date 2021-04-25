<?php
class TypeEnclos extends Controller
{
    public function __construct()
    {
        $this->typeModel = $this->model('TypeEnclo');
    }

    public function afficherList()
    {
         $tab = $this->typeModel->afficherType();
           $data = [
            'tab' => '',
        ];


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<div class="table-head">
            <div class="serial">'. $value[0] .'</div>
            <div class="country">'. $value[1] .'</div>
            <div class="visit">'. $value[2] .'</div>
            </div>';
        }

        $this->view('detailEnclo',$data);
    } 

}









