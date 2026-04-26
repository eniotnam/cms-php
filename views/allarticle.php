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
$allart=$nb->getArticlelimit(3);
$allarts=$nb->getArticlelimit(10);
?>
<head>
    <link rel="stylesheet" href="css/articlebycat.css" type="text/css">
</head>
<div class="header-spacer"></div>
<div class="col-xs-12 col-sm-12 col-md-12 ">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php  if(count($allart)>1){ for($i = 0 ; $i < count($allart) ;$i++){
    if($i == 0){?> 
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li><?php }else { ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>

            <?php } }} ?>
        </ol>
        <div class="carousel-inner " role="listbox">
            <?php 
            for($i = 0 ; $i < count($allart) ;$i++){
                $sli = json_decode($allart[$i]['slider']);
                if($i == 0){?> 
            <div class="carousel-item active carou">
                <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[0];?>" >

            </div>
            <?php }else{ ?> <div class="carousel-item  carou">
            <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[0];?>" >

            </div><?php } } ?>

        </div>
    </div>
</div>
<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 nam">
        <h1 >Tous les articles</h1>
    </div>
</div>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 boxid"style="padding-left:0;">
    <?php
    for($l = 0;$l<sizeof($art);$l++){
        for($k = 0;$k<(sizeof($art)/9);$k++){?>
    <div class="col-xs-12 col-sm-12 col-md-12" >
        <?php   
            for($j = 0;$j<9;$j++){
                if($l<sizeof($art)){
                    $texts =json_decode($art[$l]['texte']);
                    $text = $nb->premiers_mots(20,$texts[0]);
                    $titre =$art[$l]['titre'];
                    $auteur =$art[$l]['auteur'];
                    $date =$art[$l]['date'];
                    $id =$art[$l]['id'];
                    $img = json_decode($art[$l]['img']);
                    $sli = json_decode($art[$l]['slider']);
                    $cat = json_decode($art[$l]['categorie']);
                    $photoilust = json_decode($art[$l]['photoillustre']);
        ?>

        <div class="col-xs-4 col-sm-4 col-md-4 article">

            <div class="col-xs-12 col-sm-12 col-md-12 boxarticle" >
                <a  class="col-xs-12 col-sm-12 col-md-12 pic" href="article.php">
<!--                    <img width="100%"  src="img/<?php echo ($j==1||$j==6||$j==8)?$photoilust[1]:$photoilust[0]; ?>">-->
                     <img width="100%"  src="img/<?php echo $photoilust[0]; ?>">
                    <a href="article.php" class="col-xs-3 col-sm-3 col-md-3  butcatl"><?php echo $auteur; ?></a></a>
                <div class="col-xs-12 col-sm-12 col-md-12 text">
                    <h4 class="col-xs-12 col-sm-12 col-md-12 titre"><?php echo $titre; ?></h4>
                    <h5 class="col-xs-12 col-sm-12 col-md-12 date"><?php echo $date; ?></h5>
                    <p class="col-xs-12 col-sm-12 col-md-12 " ><?php echo $text; ?></p>
                    <a class="col-xs-4 col-sm-4 col-md-4 plus" href="article.php?id=<?php echo $id;?>">lire  <i class="fa fa-angle-right" ></i></a>
                </div>
            </div>
        </div>
        <?php $l++; 
                }       } ?>
    </div>
    <?php

        }
    }
    ?>

</div>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 boxs" >
  
    <?php
    for($l = 0;$l<sizeof($allarts);$l++){
       

                if($l<sizeof($allarts)){
                    $texts =json_decode($allarts[$l]['texte']);
                    $text = $nb->premiers_mots(20,$texts[0]);
                    $titre =$allarts[$l]['titre'];
                    $auteur =$allarts[$l]['auteur'];
                    $date =$allarts[$l]['date'];
                    $id =$allarts[$l]['id'];
                    $img = json_decode($allarts[$l]['img']);
                    $sli = json_decode($allarts[$l]['slider']);
                    $cat = json_decode($allarts[$l]['categorie']);
                    $photoilust = json_decode($allarts[$l]['photoillustre']);
    ?>

    <div class="col-5 col-md-4 article">

        <div class="col-xs-12 col-sm-12 col-md-12 boxarticle" >
            <a  class="col-xs-12 col-sm-12 col-md-12 pic" href="article.php">
                <img width="100%"  src="img/<?php echo $photoilust[0]; ?>">
                <a href="article.php" class="col-xs-3 col-sm-3 col-md-3  butcatl"><?php echo $auteur; ?></a></a>
            <div class="col-xs-12 col-sm-12 col-md-12 text">
                <h4 class="col-xs-12 col-sm-12 col-md-12 titre"><?php echo $titre; ?></h4>
                <h5 class="col-xs-12 col-sm-12 col-md-12 date"><?php echo $date; ?></h5>
                <p class="col-xs-12 col-sm-12 col-md-12 " ><?php echo $text; ?></p>
                
            </div>
            <a class="col-xs-4 col-sm-4 col-md-4 plus" href="article.php?id=<?php echo $id;?>">lire  <i class="fa fa-angle-right" ></i></a>
        </div>
    </div>
  <?php 
                }       } 
        
  
    ?>
<!--<a href="#" class="col-md-2" style="height:fit-content;" >VOIR PLUS</a>-->
</div>



<!--  BLOC ALL VOIR PLUS
<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 boxd" style="overflow:auto;">
    <?php
    for($l = 0;$l<sizeof($art);$l++){
       

                if($l<sizeof($art)){
                    $texts =json_decode($art[$l]['texte']);
                    $text = $nb->premiers_mots(20,$texts[0]);
                    $titre =$art[$l]['titre'];
                    $auteur =$art[$l]['auteur'];
                    $date =$art[$l]['date'];
                    $id =$art[$l]['id'];
                    $img = json_decode($art[$l]['img']);
                    $sli = json_decode($art[$l]['slider']);
                    $cat = json_decode($art[$l]['categorie']);
                    $photoilust = json_decode($art[$l]['photoillustre']);
    ?>

    <div class="col-xs-4 col-sm-4 col-md-4 article">

        <div class="col-xs-12 col-sm-12 col-md-12 boxarticle" >
            <a  class="col-xs-12 col-sm-12 col-md-12 pic" href="article.php">
                <img width="100%"  src="img/<?php echo $photoilust[0]; ?>">
                <a href="article.php" class="col-xs-3 col-sm-3 col-md-3  butcatl"><?php echo $auteur; ?></a></a>
            <div class="col-xs-12 col-sm-12 col-md-12 text">
                <h4 class="col-xs-12 col-sm-12 col-md-12 titre"><?php echo $titre; ?></h4>
                <h5 class="col-xs-12 col-sm-12 col-md-12 date"><?php echo $date; ?></h5>
                <p class="col-xs-12 col-sm-12 col-md-12 " ><?php echo $text; ?></p>
                <a class="col-xs-4 col-sm-4 col-md-4 plus" href="article.php?id=<?php echo $id;?>">lire  <i class="fa fa-angle-right" ></i></a>
            </div>
        </div>
    </div>
    
  <?php 
                }       } 
        
  
    ?>
    

</div>
-->
<script > 
    
    $('.boxs').hide();
    if(window.innerWidth < 768){
         $('.boxid').hide();
         $('.boxs').show();
    }
    $('.boxd').hide();
  
    function hideall(){
        $('.boxs').hide();
        $('.boxd').hide();
         $('.boxid').hide();
    }
    function Showarticle(){
        hideall();
        $('.boxd').show();

    }
</script>
<!--
<div class="col-xs-12 col-sm-12 col-md-12 boxbut" >
<a href="" class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 more">plus de posts</a>
</div>
-->
