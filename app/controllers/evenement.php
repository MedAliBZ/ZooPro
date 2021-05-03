<?php
class evenement extends Controller
{
    public function __construct()
    {
        $this->eventModel = $this->model('evenements');
    }

    public function afficherList($error = '')
    {
        $tab = $this->eventModel->afficher();
        $data = [
            'tab' => '',
            
        ];

      
        foreach ($tab as $key => $value) {
            
            $data['tab'] .= '
            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="'.URLROOT.'/assets/img/event/'.$value[4].'" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>Nombre de places: '.$value[3].'</h3>
                                        <p>'.$value[2].'</p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="blog_details.html">
                                        <h2 class="blog-head" style="color: #2d2d2d;">'.$value[1].'</h2>
                                    </a>
                                    <p>'.$value[5].'</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                    <div class="container box_1170 border-top-generic">
                                    <div class="button-group-area mt-10">
                                    <form action="'.URLROOT.'/participation/addparticipation" method="POST">
                                        <input type="hidden" name="id_user"  value="'.$_SESSION["id"].'" />
                                        <input type="hidden" name="id_event"   value="'.$value['id'].'" />
                                        <input type="number" name="nb" min ="0" style="width:100px;"/>

                                        <input type="submit" class="genric-btn success-border id="part">
                                    </form>
                                    </div>     
                                    </div>
                                    

                                </div>
                            </article>
                                ';
        }
        $this->view('evenement', $data);
    }
}