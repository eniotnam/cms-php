<?php

require_once 'models/article.php';
require_once 'models/user.php';
require_once 'models/mail.php';
require_once 'models/query.php';
require_once 'models/vote.php';
require_once 'models/commentaire.php';

$query = new query;
$pseudo = $_SESSION['pseudo'];
$mail = new email;
$nb = new article;
$us = new user;
$categorie =$nb->getcat();
$auteur = $us->getAdmininfo();
?>
<!-- Top Header -->
<head>
    <link rel="stylesheet" href="css/apropos.css"/>

</head>
<div class="header-spacer"></div>

<div class="col-sm-12 col-md-12 grdpic">
    <img width="100%" src="img/apropos.jpg" />
</div>
<div  class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 title">

    <h1 >Qui sommes nous</h1> 
     
Filles des temps modernes ? C'est un coup de foudre amical entre deux parisiennes déjantées : Juliette la grande brune ténébreuse et Camille la tête d’ange sans filtres. Passionnées et curieuses mais séparées par leurs études, elles vous relatent leur histoire à travers leurs coups de coeur et leurs coups de gueule.  Bref, Filles des temps modernes c’est deux univers opposés qui se rassemblent.  

</div>
<div id="prof" class="col-xs-12 col-md-12  col-sm-12 fdtm">
        <hr class="col-xs-2 col-md-4  col-sm-2">	
        &#x25c6;<h3  >WE ARE FDTM</h3>&#x25c6;
        <hr class="col-xs-2 col-md-4  col-sm-2">
    </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 profil" >
        <div class="col-xs-12 col-md-4 col-sm-12 profj" >
           
            <img  src="img/<?php echo $auteur[0]['img'];?>" width="100%" >

            <h1><?php echo $auteur[0]['Pseudo'];?></h1> 
            <hr>
          <p>
              <?php echo $auteur[0]['description'];?></p>
          <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <a target="_blank" href="https://www.instagram.com/juliettebatte/" class="col-md-6 col-xs-6 col-sm-6"><img width="100%" src="img/incon-insta.png"></a>
             <a target="_blank" href="https://www.pinterest.fr/juliettebatte/boards/" class="col-md-6 col-xs-6 col-sm-6"><img width="100%" src="img/icon-pinterest.png"></a>
          </div>
        </div> 
        <div class="col-xs-12  col-sm-12 col-md-4 col-md-offset-4 profca" >
            <img src="img/<?php echo $auteur[1]['img'];?>"  width="100%">
            <h1><?php echo $auteur[1]['Pseudo'];?></h1> 
            <hr>
         <p> <?php echo $auteur[1]['description'];?></p>
              <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <a target="_blank" href=" https://www.instagram.com/camillefdtm" class="col-md-6 col-xs-6 col-sm-6"><img width="100%" src="img/incon-insta.png"></a>
             <a target="_blank" href="https://www.pinterest.co.uk/camilleFillesdestempsmodernes/" class="col-md-6 col-xs-6 col-sm-6"><img width="100%" src="img/icon-pinterest.png"></a>
          </div>
        </div>

    </div>
     <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 news">
            <hr class="hrf">
            <h1>Newsletter</h1>
            Restez connecté(e)s à Camille & Juliette pour suivre tous leurs coups de coeur et coups de gueulz avec la newsletter de Filles des Temps Modernes : 
            <form class="col-xs-12 col-md-12  col-sm-12 boxmail"id="forms">
                <input class="col-xs-11 col-md-11  col-sm-11" id="mail" type="email" placeholder="e-mail" required/><button class="col-xs-1 col-md-1  col-sm-1 send" id="send" ><i class="fa fa-angle-right" ></i></button>
            </form>
            <div class="historique"></div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script src="js/mail.js"></script>