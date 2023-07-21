<style>
    @import url("css/home.css");
   .Acceuil1{
        background-image: url("<?php echo $data['img_acceuil'] ?>");
    }
</style>
<div class="acceuil">

    <div class="primary">
        <h1>Acceuil</h1>
    </div>
    <div class="mybar"></div><br>
        <div class="Acceuil1">
            <div class="IdUniversite">
                <!--A cet endroit est inclus la photo d'acceuille du site dabs le CSS -->
            </div>
        </div>
        <?php
        /*
            try{
                $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }catch(Exception $e){
                die('ERREUR :'.$e->getMessage());
            }
        */
        ?>
        <div class="InfoDeroulant">
            <div class="one">
                <div class="two">
                    Note de service : Le port des masques  est indispensable avant d'acceder aux amphi de l'ifri. Tous ensemble, luttons contre le covid-19 en respectant les gestes barrières.
                </div>
            </div>
            
        </div>
        
        <?php
            $req1=$bdd->query('CREATE TEMPORARY TABLE tempProfAdmin
                              SELECT id_admin AS id, nom_admin AS nom, prenom_admin AS prenom FROM `admin`
                              UNION
                              SELECT id_prof, nom_prof, prenom_prof FROM professeur;');
            if($req1)
            {
                $req2=$bdd->query('SELECT pub.titre_pub, pub.messages, pub.date_envoie, auth.nom, auth.prenom, auth.id
                                    FROM publication pub INNER JOIN tempProfAdmin auth
                                    ON pub.id_publisher=auth.id
                                    ORDER BY date_envoie DESC');
            }
            
            if(!empty($req2))
            {
                while($pub=$req2->fetch())
                {
            ?>
                <div class="communiquer">
                    <p class="pub-title"><?php echo $pub['titre_pub']; ?></p>
                    <p class="msg">
                        <?php echo $pub['messages']; ?>
                    </p>
                    <p>
                        <span class="pub-date pub-i"><?php echo substr($pub['date_envoie'], -19, -9); ?></span>
                        <span style="word-wrap: break-word;" class="pub-author">By <span <?php if(strpos($pub['id'], 'ADM')!==FALSE){ echo 'style="color: rgb(69,54,121)"; '; } ?> class="color-author"><?php echo $pub['nom'].' '.$pub['prenom']; ?></span> </span>
                    </p>
                </div>

            <?php

                }
            }
            else
            {
            ?>
            <div class="communiquer">
                <p class="pub-title">SUPPORT GESTIO</p>
                <p class="msg">
                    Aucune publication n'est disponible pour le moment.
                </p>
                <p>
                    <span class="pub-date"><?php echo date('Y-m-d H:i:s'); ?></span>
                    <span class="pub-author">By <span class="color-author">gestioBot</span> </span>
                </p>
            </div>

        <?php
            }
        ?>

    <!--
        <div class="MiniComBoite">
            <div class="miniCommuniquer">
                
            </div>
            <div class="miniCommuniquer">
                
            </div>
        </div>


    
    <div class="list-news">
        <div class="box-news box-bar">
            <img src="img/pt.jpg" alt="">
            <div class="news">
                <div class="news-deposit">
                    <span>@username:grade</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>





        <div class="box-news box-bar">
            <img src="img/pt2.jpg" alt="">
            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>

        <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>
            <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>        <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>        <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>        <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>        <div class="box-news box-bar">

            <div class="news">
                <div class="news-deposit">
                    <span>@username</span>
                </div>
                <div class="news-messages">
                    Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit.
                </div>
            </div>
            <div class="suppr-mod">
                <a href="#">
                <i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
            </div></div>
            -->

    </div>

</div>