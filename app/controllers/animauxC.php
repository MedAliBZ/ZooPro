<?php
class animauxC extends Controller
{
    public function __construct()
    {
        $this->animauxModel = $this->model('animauxM');
    }



    public function afficherList()
    {
        $tab = $this->animauxModel->afficherAnimaux();
        $data = [
            'tab' => '',
        ];

        foreach ($tab as $key => $value) {
            
            $data['tab'] .= 
             '   
                 <div class="affichagePics"  >
                 <img src="../public/Images/' . $value[7] . '" class="picStyle img-pop-up"  />
                 <a  class="tblRows textStyle" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . "-" . $value[5] . "-" . $value[6] . "-" . $value[7] . ' href="'.URLROOT.'/Pages/detailAnimal" data-label="Nom" >' . $value[1] . '</a> 
                 </div>
            
            ';
            

        }



        $this->view('animaux', $data);
    }
}
