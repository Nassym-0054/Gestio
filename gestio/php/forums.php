<style>
    
    .main-chat{
    height: 25em;
 }
#chat{
 width: 100%;
 height: 24.2em;
 overflow: hidden;
 overflow-y: scroll;

 
 background-color:#fff;
 display:flex;
 flex-direction:column;
                                    
 padding: 10px;/*
 margin-bottom: 3px;  */
}
.message-envoi{
 background: rgb(190, 38, 196);
 color: white;
 display: inline-flex;
 flex-direction:column !important;
 border-radius:  0 10px 1px 10px; 
 padding: 5px;
 /* justify-content: right; */
 max-width: 35em;
}
.message-recept{

 /* float: left; */
 max-width: 70%;
 background-color: #cccccc;
 color: black;
 border-radius: 0 10px 1px 10px;
 padding: 5px; 
}
.main-chat{
 display: flex;
 flex-direction: column;
 width: 100%;
 height: 43%;
 margin: auto;
}
#user{
 font-size: 13px;
 color: black;
}
#date{
 font-size: 10px;
 
 color: whitesmoke;
}
form .mess{
 outline: none;
 border: 1px solid #5555;
 width: 95%;
 height: 2.15em;
 overflow: hidden;
 overflow-y: scroll;
 font-size: 19px;
 padding: 9px 9px 9px 14px;
 font-family: sans-serif;
 border-radius: 20px 0 0 20px;
 justify-content: center;
}

#chat img{
    max-width: 100%;
    max-height: 100%;
}
.msg-envoi{
 margin-top: 10px;
 display: inline-flex;
 flex-direction:row;
 justify-content: flex-end;
 
}
.msg-recept{
    max-width: 50%;
 align-items: start;
 margin-top: 10px;
 display: flex;
 flex-direction: column;
 
}
.form2{
 display: flex;
 width: 100%;
 
 /* background: #cccccccc;
 justify-content: center;
 padding: 10px; */
}
.form2 input{
 border: none;
 background: rgb(190, 38, 196);
 color: whitesmoke;
 padding: 3px;
 border-radius: 0 15px 0px 0;
}
.form1 i{
 justify-content: center;
 width: 5%;
 height: 2.10em; 
 padding: 8px; 
 font-size: 19px;
}
.image-upload {
 position: center;
 background: whitesmoke;
 color: black;
 border-radius: 100%;
 margin: auto 10px auto auto;
 padding: 0;
 height: 2.1em;
}

.image-upload input
{
display: none;
}

.image-upload i
{
border-radius: 50%;
background: whitesmoke;
font-size: 17px;
padding: 0.5em;
color: #666;
cursor: pointer;
}
.file-input{
display: none;
}
.forms{
 display: flex;
 background: #cccccccc;
 justify-content: center;
 padding: 10px;
 
}
.kkk{
 display:flex;
 flex-direction:column;
 max-width: 40%;
}
</style>
<?php 
   /*
   define('HOST','localhost');
   define('DB_NAME','gestiodb');
   define('USER','root');
   define('PASS','');

try{
        $db = new PDO("mysql:host=". HOST . ";dbname=" . DB_NAME,USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e){
            echo $e;
    }
    */
    $req= $bdd->prepare('SELECT idUti, pseudo,message,date,image FROM forum ORDER BY idUti limit 200');
    $req->execute();
    $user_name=str_word_count($_SESSION['user_name'],1);
    $_SESSION['pseudo']= $user_name[0];
   ?>
<!-- <meta http_equiv="refresh" content="2"> -->
<div class="forum">
   <div class="primary">
        <h1>Forum</h1>
       </div>
        <div class="mybar"></div><br>
    <div class="main-chat">
          
            <div id="chat">
                <?php
                    while($mes_chat= $req->fetch()){
                        $mes_chat['message'] = $mes_chat['message'].trim(" ");
                        $date_message = date_create($mes_chat['date']);
                        $date_message = date_format($date_message, 'd M Y à H:i');

                        if($mes_chat["message"]){
                           if($mes_chat['pseudo']==$_SESSION['pseudo']){
                            ?>
                            <div class="msg-envoi">
                                <div class="kkk">
                                    <div id="user">
                                        Vous
                                    </div>
                                    <span class="message-envoi"><?php if(($mes_chat['image'])==1){?>
                                        <img src="<?=$mes_chat['message']?>"><?php }
                                        else{echo $mes_chat['message'];}?></br>
                                            <span id="date"><?= $date_message?></span>
                                    </span>
                                </div>
                            </div>
                            <?php
                        }else{ 
                            ?>
                             <div class="msg-recept">
                                <span id="user"><?= $mes_chat['pseudo']?></span>
                                        <span class="message-recept">
                                            <?php if(($mes_chat['image'])==1){?>
                                            <img src="<?=$mes_chat['message']?>"/>
                                         
                                        <?php }
                                        
                                        else{echo $mes_chat['message'];}?>
                                        
                                         </br>
                                        <span id="date"><?= $date_message?></span></span>
                             </div>
                                
                            
                    <?php 
                 }
                        
                        }
                    } 
                    
    if($_SESSION['pseudo']){
             ?>
                   
                </div>

                <script> document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;</script>

                <div class="forms">
                    
                    <form method="post" action="main.php" class="form1" enctype="multipart/form-data">
                                    
                                <div class="image-upload">
                                    <label for="file-input">
                                        <i class="fa fa-image"></i>
                                    </label>
                                        <input id="file-input" name="uploaded_file" type="file" onchange="this.form.submit();e.preventDefault();"/>
                                        <input type="text" name="valid" value="valider">
                                </div>
                    </form> 
                    
                    <form method="post" action="php/forum_post.php" class="form2" enctype="multipart/form-data">          
                             <input type="hidden" name="pseudo" value="<?=$_SESSION['pseudo']?>">          
                             <textarea name="mess" cols="10" class="mess" placeholder="Ecrire..."></textarea>
                             <input type="submit" value="Envoyer" name="valider"/>
                                            
                    </form>
                    
                </div>
                    
<!-- -----------------------------------------importation de photo(php)---------------------------------------------------- -->
                 <?php 
                //  if($_FILES['uploaded_file']){echo "OK";}else{echo 'non';}
                        
                //             if(isset($_POST['valid'])){
                //                     $maxSize= 900000;
                //                     $validExt = array('.jpg','.jpeg','.gif','.png');
                //                     if($_FILES['uploaded_file']['error'] > 0 ){
                //                     echo 'une erreur est survenue lors du transfert';
                //                     
                //                     die;
                //             }else{

                //             $filesize = $_FILES['uploaded_file']['size'];

                //             if($filesize > $maxSize){
                //                  echo "le fichier est trop gros";
                //                 
                //                 die;
                //                 }else{
                //                      $fileName = $_FILES['uploaded_file']['name'];
                //                 $fileExt = '.'. strtolower(substr(strrchr($fileName, '.'), 1));

                //             if(!in_array($fileExt, $validExt)){
                //                    "le fichier n'est pas une image";
                                 
                //                 }else{
                //                     $tmpName = $_FILES['uploaded_file']['tmp_name'];
                //                     $uniqueName = md5(uniqid(rand(),true));
                //                     $fileName = "upload/".$uniqueName.$fileExt;
                //                     $resultat = move_uploaded_file($tmpName, $fileName);
                                    
                //                     if($resultat){
                              
                //                 $req = $db->prepare('INSERT INTO forum(pseudo, message,image) VALUES (:pseudo, :message,:image)');
                //                     $req->execute([
                //                         'pseudo' => $_SESSION['pseudo'], 'message' => $fileName, 'image' => 1]);
                            ?>    <script> document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;</script>

                                <?php
                                
                    //           } 
                           
                    //       }
                            
                                
                    //     } 
                    //  }
                
             } 
                            
                           
                               
        ?>
     </div>
</div>
                                                                                                                                                                                                                                                                                                                                                                                              