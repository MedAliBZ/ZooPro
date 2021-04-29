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
            'email'=> ''
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

        $email = $this->animauxModel->findEmailByID();
        foreach ($email as $key => $value) {
            $data['email'] .= '
            <h3  id="email"> '. $value[0] .'</h3>
            ';
        }
        $this->view('animaux', $data);
    }

    public function SendEmail()
    {
        $data = ['email'=>''];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'email' =>  trim($_POST['email'])
        ];
        mail($data['email'],"donation","your donation is confirmed thank you","From: mhedhbi.meriamepb@gmail.com");

        
        $this->view('detailAnimal',$data);
    }
}
