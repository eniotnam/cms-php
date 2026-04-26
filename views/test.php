<?php
require_once ('./models/article.php');
$article = new article;
$testotas = $article->getLastNews();
?>

<head>
    <style>
        .pub{
            text-align: center;
        }
         .sorting-container{
            overflow: auto!important ;
            height:600px!important;
        }
        .sorting-container::-webkit-scrollbar {									
            background:rgba(255, 255, 255, 0)!important;
        }
        article{
            margin: auto;
            display:flex;
        }
        article img{
            height:200px;
        }
    </style>
</head>
<div class="header-spacer"></div>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="clients-grid">

                <ul class="cat-list-bg-style align-center sorting-menu">
                    <li class="cat-list__item active" data-filter="*"><a href="#" class="">Tout les projets</a></li>
                    
                    <?php for($i = 0 ; $i < count($testotas) ; $i++){  ?>
                    
                    <li class="cat-list__item" data-filter=".<?php echo $testotas[$i]['categorie'];?>" >
                    <a href="#" class=""> <?php echo $testotas[$i]['categorie'];?></a>
                    </li>

                    <?php  } ?>
                </ul>


                <div class="col-md-8 col-md-offset-3 sorting-container " id="clients-grid-1" data-layout="masonry">
                    <?php for($i = 0 ; $i < count($testotas) ; $i++){  ?>
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 sorting-item ecommerce <?php echo $testotas[$i]['categorie'];?>">
                        <div class="ui-block " >
                            <article class="hentry post ">



                                <div class="col-md-6 ">
                                    <img src='img/<?php echo $testotas[$i]['categorie']; ?>.png' style='width:100%;border:1px solid black'>
                                </div>
                                <div class='col-md-6' style="text-align:center;">
                                    <h1> <?php echo $testotas[$i]['titre'];?></h1><br>
                                    <h4><?php echo $testotas[$i]['date'];?> </h4><br>
                                    <h5> <?php echo $testotas[$i]['descri'];?></h5><br>


                                    <div>
                                        <div class="col-md-12" style="position:absolute;bottom:0;text-align:center;">
                                            <a href="<?php echo "article/".$testotas[$i]['lien']; ?>" target="_blank">Lire la suite</a><br>
                                            <form>
                                            <a href='#' class="glyphicon glyphicon-ok" style="padding:5px;border-radius:20%;border:1px solid #0861a2;"></a>
                                           
                                            <a href='#' class="glyphicon glyphicon-option-horizontal"style="padding:5px;border-radius:20%;border:1px solid #0861a2;"></a>
                                            <a href='#' class="glyphicon glyphicon-remove"style="padding:5px;border-radius:20%;border:1px solid #0861a2;"></a>
                                            </form>
                                            </div>



                                    </div>
                                </div>


                            </article>
                        </div>
                    </div>
                    <?php } ?>



                </div>

            </div>
        </div>
    </div>
</div>