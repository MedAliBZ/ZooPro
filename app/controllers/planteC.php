<?php
class planteC extends Controller
{
    public function __construct()
    {
        $this->planteModel = $this->model('planteM');
    }



    public function afficherList()
    {
        $tab = $this->planteModel->afficherplante();
        $data = [
            'tab' => '',
        ];

        foreach ($tab as $key => $value) {
            
            $data['tab'] .= 
             '   
                 <div class="affichagePics"  >
                 <img src="../public/Images/' . $value[6] . '" class="picStyle img-pop-up"  />
                 <a  class="tblRows textStyle" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . "-" . $value[5] . "-" . $value[6] . "-" . $value[7] . ' href="'.URLROOT.'/Pages/detailplante" data-label="nomP" >' . $value[1] . '</a> 
                 </div>
            
            ';
            

        }



        $this->view('plante', $data);
    }
}
