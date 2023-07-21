<style>
    @import url("css/courses.css");
</style>
<?php
    /*
    $bdd = new PDO('mysql:host=localhost;dbname=gestioDB','root','', array(PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION) );
    */
    $req=$bdd->query('SELECT DISTINCT id_mat, m.nom_mat , h.paths 
                      FROM matiere m 
                      INNER JOIN historique_cours h
                      ON m.id_mat=h.code_mat
                      ORDER BY date_envoie DESC');
    if($showEcu==11)
    {
       echo '
        <div class="BoiteUE BoiteUE1">
            <p>Mathematiques générales </p>';
            while($donne=$req->fetch()){
        echo '
            <p><a href="'.$donne['paths'].'">'.$donne['nom_mat'].' <i class="fa fa-download angleBas">  </i></a></p>
            <!--p><a href="#">Probabilité <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Algèbre Matriciel <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Algèbre de boole <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Numeration <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Quatre Opérations <i class="fa fa-download angleBas">  </i></a></p-->';
            }
        echo '    
        </div>
        ';
    }
    elseif($showEcu==12)
    {
        echo '
        <div class="BoiteUE BoiteUE1">
            <p>Physique quantique </p>
            <p><a href="#">Theorie des cordes <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Cinematique <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Dynamique aerienne <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Theorie des mêmes <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Theorie de la relativité <i class="fa fa-download angleBas">  </i></a></p>
            
        </div>
        ';
    }
    elseif($showEcu==13)
    {
        echo '
        <div class="BoiteUE BoiteUE1">
            <p>Chimie élémentaire </p>
            <p><a href="#">Chimie medicale <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Anatomie générale <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Chimie organique <i class="fa fa-download angleBas">  </i></a></p>
            <p><a href="#">Radioactivité et fusion nucleaire <i class="fa fa-download angleBas">  </i></a></p>
            
        </div>
        ';
    }
    
?>
