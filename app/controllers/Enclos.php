<?php
class Enclos extends Controller
{
    public function __construct()
    {
        $this->encloModel = $this->model('Enclo');
    }



    public function afficherList()
    {
        $tab = $this->encloModel->afficherEnclos();
        $data = [
            'tab' => ''
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= '
                   <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cases mb-40">
                            <div class="cases-img">
                                <img src="../public/Images/' . $value[7] . '" alt="">
                            </div>
                            <div class="cases-caption">
                                <h3><a href="#">' . $value[1] . '</a></h3>
                                <p><b>Localisation : </b>' . $value[2] . '</p>
                                <p><b>Taille : </b>' . $value[3] . '</p>
                                <p><b>Date de construction : </b>' . $value[4] . '</p>
                                <p><b>Capacité maximale : </b>' . $value[5] . '</p>
                                <p><b>ID du Type : </b>' . $value[6] . '</p>
                                <p><b>Label du Type : </b>' . $value[9] . '</p>
                                <p><b>Structure du Type : </b>' . $value[10] . '</p>
                                <!-- Progress Bar -->
                            </div>

                                <div class="single-skill mb-15">
                                    <div class="bar-progress">
                                        <div id="bar1" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="80" style="background: rgb(9, 204, 127); width: 300px; transition: width 1s ease-in-out 0s;"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- / progress -->
                                <div class="prices">
                                    <p><span>animaux hébérgés</span></p>
                                </div>
                        </div>
                    </div>
            ';
        }
        
        
        $this->view('enclos', $data);
    }

}