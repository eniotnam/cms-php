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
$ar = new article;
$us = new user;
$categorie =$ar->getcat();
$auteur = $us->getAdmininfo();
$art=$ar->getArticlelimit(3);

//$mail = htmlentities($_GET['mail'])];

//$us->Newsletterinscription('test1');

?>
<head>

    <link rel="stylesheet" type="text/css" href="css/home.css">


</head>
<body>


    <div class="header-spacer"></div>
    <div class="col-md-12 col-xs-12 col-sm-12">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php  if(count($art)>1){ for($i = 0 ; $i < count($art) ;$i++){
    if($i == 0){?> 
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li><?php }else { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>

                <?php } }} ?>
            </ol>
            <div class="carousel-inner " role="listbox">
                <?php 
                for($i = 0 ; $i < count($art) ;$i++){
                    $sli = json_decode($art[$i]['slider']);
                    if($i == 0){?> 
                <div class="carousel-item active carou">
                    <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[0];?>" >

                </div>
                <?php }else{ ?> <div class="carousel-item  carou">
                <img class='d-block img-fluid' width='100%' src="img/<?php echo $sli[0];?>" >

                </div><?php } } ?>

            </div>
        </div>

        <a href="allcat.php" class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 univers" id="zone">
            Entrez dans notre univers...
        </a>
        <div class="col-xs-12
                    1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 cat">
            <?php for($i=0;$i<count($categorie);$i++){
    $img=json_decode($categorie[$i]['img']);?>
            <div  class="col-xs-6 col-sm-4 col-md-4 box"><div class="boxd"><a href="articlebycat.php?name=<?php echo $categorie[$i]['nom']?>"><img src="img/<?php echo $img[0];?>" width="100%;"/>
                <a  href="articlebycat.php?name=<?php echo $categorie[$i]['nom']?>" class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 but"><?php echo $categorie[$i]['nom']?></a></a></div>

            </div>
            <?php }?>



        </div>
        <a href="allarticle.php" class="col-xs-8 col-xs-offset-2 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5 butarticle">
            tous les articles
        </a>

        <div class="col-xs-12  col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 boxinsta">
            <div class="col-xs-12 col-md-12 col-sm-12 instag">

                <div class="col-xs-12 col-md-12 col-sm-12 instacam">
                    <script src="https://snapwidget.com/js/snapwidget.js"></script>
                    <iframe src="https://snapwidget.com/embed/494695" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
                    <div class="col-xs-3 col-md-3  col-sm-3 pic"><img src="img/fillesdestempsmodernes-insta-cam-2.jpg" width="100%;"/>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12  col-sm-12 instajul">
                    <div class="col-xs-3 col-md-3  col-sm-3 pic"><img src="img/fillesdestempsmodernes-insta-juliette-3.png" width="100%;"/>    

                    </div>

                   <script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/496209" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>

                </div>


            </div> 



        </div>
    </div>
    <div class="col-xs-12 col-md-12  col-sm-12 fdtm">
        <hr class="col-xs-2  col-md-4  col-sm-2">	
        &#x25c6;<h3  >WE ARE FDTM</h3>&#x25c6;
        <hr class="col-xs-2 col-md-4  col-sm-2">
    </div>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 profil" >
        <div class="col-xs-12 col-md-5  col-sm-12 profj" >
            <div class="col-md-12 pictprof">

                <img  src="img/<?php echo $auteur[0]['img'];?>" width="100%" >
            </div>

            <h1><?php echo $auteur[0]['Pseudo'];?></h1> 
            <hr>

            <?php echo $auteur[0]['shortdescription'];?>
            <a class="inf" href="apropos.php#prof">voir plus</a>
        </div> 
        <div class="col-xs-12  col-sm-12   col-md-5 col-md-offset-2 profca" >
            <div class="col-md-12 pictprof">
                <img src="img/<?php echo $auteur[1]['img'];?>"  width="100%"></div>
            <h1><?php echo $auteur[1]['Pseudo'];?></h1> 
            <hr>
            <?php echo $auteur[1]['shortdescription'];?>
            <a class="inf" href="apropos.php#prof">voir plus</a>
        </div>

    </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 news">
        <hr class="hrf">
        <h1>Newsletter</h1>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui dicta minus molestiae vel beatae natus eveniet ratione temporibus
        <form class="col-xs-12 col-md-12  col-sm-12 boxmail"id="forms">
            <input class="col-xs-11 col-md-11  col-sm-11" id="mail" type="email" placeholder="your e-mail" required/><div class="col-xs-1 col-md-1  col-sm-1 send" id="send" ><i class="fa fa-angle-right" ></i></div>
        </form>
        <div id="txtHint" class="historique"></div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="js/mail.js"></script>
</body>

