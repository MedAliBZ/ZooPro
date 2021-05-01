<?php
class AnimauxInEnclos extends Controller
{
    public function __construct()
    {
        $this->animauxModel = $this->model('AnimauxInEnclo');
    }

    

    public function afficherList()
    {
        $tab = $this->animauxModel->afficherAnimaux();
        $data = [
            'tab' => '',
            'errorAffiche' => '',
            'idRegime' => '',
            'stable' => '',
            'menace' => '',
            'endanger' => ''
 
        ];
        //stat elements

        $stable = $this->animauxModel->getStable();
        $data['stable'] = $stable[0][0];

        $menace = $this->animauxModel->getMenace();
        $data['menace'] = $menace[0][0];

        $endanger = $this->animauxModel->getEndanger();
        $data['endanger'] = $endanger[0][0];

        foreach ($tab as $key => $value) {
            $data['tab'] .= '
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="../public/Images/' . $value[7] . '" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>' . $value[0] . '</h3>
                                        <p>' . $value[1] . '</p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                <p><b>Type : </b>' . $value[2] . '</p>
                                <p><b>Age : </b>' . $value[3] . ' ans</p>
                                <p><b>Pays : </b>' . $value[4] . '</p>
                                <p><b>Status : </b>' . $value[5] . '</p>
                                <p><b>ID Regime Alimentaire : </b>' . $value[6] . '</p>
                                <p><b>Nom Regime Alimentaire : </b>' . $value[10] . '</p>
                                <p><b>Type nourriture: </b>' . $value[11] . '</p>
                                <p><b>Quantité par repas : </b>' . $value[12] . '</p>
                                <p><b>Nombre de repas: </b>' . $value[13] . '</p>

                                </div>
                            </article>   
                        </div>
                    </div>
            ';
        }


       

        $this->view('animauxInEnclos', $data);
    }

}