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
$adminf = $us->getAdmin($_SESSION['id']);
$categorie =$nb->getcat();
$art =$nb->getLastNews();
$lim=$nb->getArticlelimit(3);
$together = json_decode($categorie[0]['img']);
$lifestyle = json_decode($categorie[1]['img']);
$mode = json_decode($categorie[2]['img']);
$food = json_decode($categorie[3]['img']);
$paris = json_decode($categorie[4]['img']);
$angleterre = json_decode($categorie[5]['img']);
?>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/allcat.css">
   <link rel="stylesheet" type="text/css" href="css/articlebycat.css">
</head>

<div class="header-spacer"></div>


<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 allcat">

    <div class="col-xs-4 col-md-4 col-sm-4 a" >

        <a href="articlebycat.php?name=<?php echo $categorie[0]['nom']; ?>"> <img width="100%" src="img/<?php echo $together[1]; ?>"/>
            <a  href="articlebycat.php?name=<?php echo $categorie[0]['nom']; ?>" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 but"><?php echo $categorie[0]['nom']; ?></a></a>
    </div>

    <div class="col-xs-4 col-md-4 col-sm-4 c"  >

        <a href="articlebycat.php?name=<?php echo $categorie[2]['nom']; ?>"><img width="100%" src="img/<?php echo $mode[1]; ?>"/>
            <a href="articlebycat.php?name=<?php echo $categorie[2]['nom']; ?>" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  but"><?php echo $categorie[2]['nom']; ?></a></a>
    </div>
    <div class="col-xs-4 col-md-4 col-sm-4 ca"   >
       <a href="articlebycat.php?name=<?php echo $categorie[1]['nom']; ?>">
        <img width="100%" src="img/<?php echo $lifestyle[1]; ?>"/>
        <a href="articlebycat.php?name=<?php echo $categorie[1]['nom']; ?>" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  but"><?php echo $categorie[1]['nom']; ?></a></a>
    </div>
    <div class="col-xs-8 col-md-8 col-sm-8 d"  >
       <a href="articlebycat.php?name=<?php echo $categorie[5]['nom']; ?>">
        <img width="100%" src="img/<?php echo $angleterre[1]; ?>"/>
        <a href="articlebycat.php?name=<?php echo $categorie[5]['nom']; ?>" class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  but"><?php echo $categorie[5]['nom']; ?></a></a>
    </div>

    <div class="col-xs-6 col-md-6 col-sm-6 b">
        <a href="articlebycat.php?name=<?php echo $categorie[4]['nom']; ?>">
        <img width="100%" src="img/<?php echo $paris[1]; ?>"/>
         <a href="articlebycat.php?name=<?php echo $categorie[4]['nom']; ?>" class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  but"><?php echo $categorie[4]['nom']; ?></a></a>
    </div>
    <div class="col-xs-6 col-md-6 col-sm-6  b">
        <a href="articlebycat.php?name=<?php echo $categorie[3]['nom']; ?>">
        <img width="100%" src="img/<?php echo $food[1]; ?>"/>
         <a href="articlebycat.php?name=<?php echo $categorie[3]['nom']; ?>" class=" col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  but"><?php echo $categorie[3]['nom']; ?></a></a>
    </div>


</div>
<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 artthre" style="padding-left:0;">
   <?php
    for($l = 0;$l<count($lim);$l++){
    
                     $texts =json_decode($art[$l]['texte']);
                    $text = $nb->premiers_mots(10,$texts[0]);
                    $titre =$lim[$l]['titre'];
                    $auteur =$lim[$l]['auteur'];
                    $date =$lim[$l]['date'];
                    $id =$lim[$l]['id'];
                    $img = json_decode($lim[$l]['img']);
                    $sli = json_decode($lim[$l]['slider']);
                    $cat = json_decode($lim[$l]['categorie']);
                    $photoilust = json_decode($lim[$l]['photoillustre']);?>
   
       
        <div class="col-xs-4 col-md-4 col-sm-4 article">

            <div class="col-xs-12 col-md-12 col-sm-12 boxarticle" >
                <a  class=" col-xs-12 col-md-12 col-sm-12 pic" href="article.php">
                    <img width="100%"   src="img/<?php echo $photoilust[0]; ?>">
                    <a href="article.php" class="col-xs-5 col-sm-5 col-md-3  butcatl" ><?php for($p=0;$p<sizeof($cat);$p++){echo $cat[$p];}  ?></a></a>
                <div class="col-xs-12 col-md-12 col-sm-12 text">
                    <h4 class="col-xs-12 col-md-12 col-sm-12  titre"><?php echo $titre; ?></h4>
                     <p class="col-xs-12 col-sm-12 col-md-12 " ><?php echo $text; ?></p>
                   
                </div>
                 <a class="col-xs-5 col-md-4 col-sm-5  plus" href="article.php?id=<?php echo $id; ?>">lire  <i class="fa fa-angle-right" ></i></a>
            </div>
        </div>
 
    <?php

        
    }
    ?>
    
</div>