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
            $data['tab'] .= '
                <div class="affichagePics">
                <img src="../public/Images/' . $value[7] . '" class="picStyle img-pop-up"  />
                 <a href="'.URLROOT.'/Pages/regime" class="textStyle">' . $value[1] . '</a> 
                 </div>
            ';
        }



        $this->view('animaux', $data);
    }
}
