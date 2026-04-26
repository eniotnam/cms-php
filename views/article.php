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
$art =$nb->getArticlebyid($_GET['id']);
if(!$art){
    header('location:index.php');
}
$text =json_decode($art['texte']);
$titre =$art['titre'];
$auteur =$art['auteur'];
$adminf = $us->getAdminmore($auteur);
$date =$art['date'];
$id =$_GET['id'];
$message =$art['mesperso'];
$img = json_decode($art['img']);
$sli = json_decode($art['slider']);
$cat = json_decode($art['categorie']);
$photoilust = json_decode($art['photoillustre']);?>
?>
<head>
    <link type="text/css" rel="stylesheet" href="css/article.css">

</head>


<div class="header-spacer"></div>
<div class="col-xs-12 col-sm-12 col-md-12 ">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php  if(count($sli)>1){ for($i = 0 ; $i < count($sli) ;$i++){
    if($i == 0){?> 
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li><?php }else { ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>

            <?php } }} ?>
        </ol>
        <div class="carousel-inner " role="listbox">
            <?php 
            for($i = 0 ; $i < count($sli) ;$i++){

                if($i == 0){?> 
            <div class="carousel-item active carou">
                <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[$i];?>" >

            </div>
            <?php }else{ ?> <div class="carousel-item  carou">
            <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[$i];?>" >
            <div class="carousel-caption d-none d-md-block " style="background:rgba(0, 0, 0, 0.58)">

            </div> 
            </div><?php } } ?>

        </div>
    </div>
</div>
<div class="col-xs-12  col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 articles">
    <div class="col-xs-10 col-sm-10 col-md-10 title">
        <h1><?php echo $titre; ?></h1>
        <h5>
            <span><?php echo $date; ?></span>
            <span><?php foreach($cat as $cate){echo $cate;} ?></span>
<!--            <span>nb commentaires</span>-->
        </h5>
        <div class="col-xs-12 col-sm-12 col-md-12 text">
            <p><?php echo $nb->autolink($text[0]); ?></p>
            <?php for($p=0;$p<count($img);$p++){?>
            <div class="col-xs-12 col-sm-12 col-md-12 artidesc">
                <img width="100%" src="img/<?php echo $img[$p]; ?>">
                <p><?php echo $nb->autolink($text[$p+1]);?></p>
            </div> 
            <?php }?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 auteurs">
            <p><?php echo $message; ?></p>
            <div class="col-xs-12 col-sm-12 col-md-12 auteur">
                <div class="col-xs-1 col-sm-1 col-md-1 pic"> <img width="100%" src="img/<?php echo $adminf['img'] ;?>"></div>
                <h4 class="col-xs-1 col-sm-2 col-md-2"><?php echo ucfirst($auteur) ;?></h4>


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 share">
            <h3 class="col-xs-4 col-sm-1 col-md-1">Share :</h3>
            <div class="col-xs-6 col-sm-3 col-md-3 rese">
                <a class="col-xs-4 col-sm-2 col-md-2 res" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://cataclysmic-cosal.000webhostapp.com<?php echo $_SERVER['SCRIPT_NAME']."?id=".$_GET['id']; ?>"><img width="100%"  src="img/facebook.png" alt="facebook"></a>
                <a class="col-xs-4 col-sm-2  col-md-2 res" target="_blank" href=" https://twitter.com/intent/tweet/?url=https://cataclysmic-cosal.000webhostapp.com<?php echo $_SERVER['SCRIPT_NAME']."?id=".$_GET['id']; ?>"><img  width="100%" src="img/twitter.png" alt="twitter"></a>
            </div>
        </div>

<!--
        <div class="col-sm-12 col-md-12 comment">
            <h4>Commentaires</h4>
            <div class="col-sm-12 col-md-12 commentaires">
                <span class="col-sm-12 col-md-12">
                    <h5 class="col-sm-1 col-md-1">NOM</h5> 
                    <h5 class="col-sm-1 col-sm-offset-9col-md-1 col-md-offset-9">Date</h5> 
                    <h5 class="col-sm-1 col-md-1">répondre</h5> 
                </span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur doloremque animi earum, autem deleniti distinctio, iure ad doloribus recusandae atque, quasi repellendus similique illum placeat a quas voluptatum sequi odio.</p>
                <div class="col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4 reponse">
                    <span class="col-sm-12 col-md-12">
                        <h5 class="col-sm-1 col-md-1">NOM</h5> 
                        <h5 class="col-sm-1 col-sm-1col-md-1 col-md-offset-8">Date</h5> 
                        <h5 class="col-md-1 col-md-offset-1">répondre</h5> 
                    </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur doloremque animi earum, autem deleniti distinctio, iure ad doloribus recusandae atque, quasi repellendus similique illum placeat a quas voluptatum sequi odio.</p>
                </div>
            </div>
        </div>
-->

<!--
        <form class="col-md-11 form">
            <h4>Leave a Comment:</h4>
            <div class="col-md-12 shadow">
                <div class="col-md-6 box"><input placeholder="name" name="name" class="col-md-12 "/></div>
                <div class="col-md-6 box"> <input placeholder="E-MAIL" type="email" name="mail" class="col-md-12"/></div>

                <div class="col-md-12 box"> <textarea placeholder="your message" name="message" class="col-md-12 message"></textarea></div>
            </div>
            <div class="col-md-4 box"> <input type="submit" value="commenter"name="send" class="col-md-12 send"/></div>
        </form>
-->

    </div>

    <div class="col-xs-2  col-sm-1 col-sm-offset-1  col-md-1 col-md-offset-1 listcat">
        <h5>Categorie:</h5>
        <ul>
            <?php foreach($categorie as $categ){?>
            <li><a href="articlebycat.php?name=<?php echo $categ['nom']; ?>"><?php echo $categ['nom'] ;?></a></li>

            <?php } ?>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 next">
        <?php 
        $idnext=$nb->NextArt($id);
        $idprec=$nb->PreArt($id);

        echo ($idprec[0])? "<a href='article.php?id=".$idprec[0]."'class='col-xs-5 col-sm-2 col-md-2' style='float:left;'><i class='fa fa-angle-left'></i> articles précédent</a>":"";
        echo ($idnext)? "<a href='article.php?id=".$idnext['id']."'class='col-xs-5 col-sm-2 col-md-2' style='float:right;'>articles suivant <i class='fa fa-angle-right'></i></a>":"";

        ?>


    </div>
</div>
