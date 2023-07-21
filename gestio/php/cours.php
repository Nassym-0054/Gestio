<style>
    @import url("css/courses.css");
</style>
<div class="schedule">

    <div class="primary">
        <h1>Cours - Notes cours</h1>
    </div>
    <div class="mybar"></div><br>
        <?php
            $showEcu=0;
            extract($_GET);
            switch($showEcu)
            {
                case 0: include('php/menu-matiere.php');
                    break;  
                default: include('php/ecu.php');
            }

        ?>


    <!--<div class="box-bar box-cour ">
            <span>Mathematiques générale</span>
        </div>-->


        <!--
        <div class="list-cours">
            <div class="box-bar box-cour">
                <div class="mat-notes">
                    <br>
                    <span class="matiere box">@SQL AVANCE</span>
                    <div class="name-dat">
                    <span><?php  
                        echo date('d') .'/'. date('m') .'/'.date('Y');
                    ?></span>
                </div>
                    <br><br>

                    <div class="descriptionEtTelechargement">
                        <div class="description_cour">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo minima quaerat magnam, optio quam pariatur laboriosam accusantium architecto necessitatibus hic natus unde non repellat cum distinctio, ullam eveniet labore laudantium.
                        </div>
                        <div class="suppr-mod">
                            <a href="#"><i class="fa fa-download"></i></a>
                        </div>
                    </div>
                   
                </div>
            </div>

            
        </div>
    -->
    </div>
    
</div>