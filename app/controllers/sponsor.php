<?php
class sponsor extends Controller
{
    public function __construct()
    {
        $this->sponModel = $this->model('sponsors');
    }

    public function afficherList($error = '')
    {
        $tab = $this->sponModel->afficher();
        $data = [
            'tab' => '',
            
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= '
                   <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cases mb-40">
                            <div class="cases-img">
                                <img src="'.URLROOT.'/assets/img/spons/'.$value[4].'" alt="">
                            </div>
                            <div class="cases-caption">
                                <h3><a href="#">' . $value[1] . '</a></h3>
                                <p><b>Numéro de téléphone: </b>' . $value[3] . '</p>
                                <p><b>email: </b>' . $value[2] . '</p>
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
                                </div>
                                </div>
                                ';
                            }
                            
                            
                            $this->view('sponsor', $data);
                        }
                    
                    }
        