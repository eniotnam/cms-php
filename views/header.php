<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Filles des temps modernes</title>


        <link rel="shortcut icon" href="img/logo.png">
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


        <!-- Main Font -->
        <link rel="stylesheet" href="css/style.css">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css"  href="css/fonts.css">

    </head>
    <body>
        <header>
            <nav id="navigation" class="col-xs-12 col-md-12  col-sm-12" >
                <ul class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 list" >
                    <li id="first" class="col-xs-1 col-md-2  col-sm-2" >
                        <a href="index.php">Accueil</a>
                    </li>.
                    <?php 
                    const PAGES_apropos = ['/temps_moderne/apropos.php']; 
                    const PAGES_contact = ['/temps_moderne/contact.php']; 
                    const PAGES_blog = ['/temps_moderne/allcat.php'];

                    if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_blog)) {
                    ?>
                    <li  class="col-xs-2 col-md-2  col-sm-2 ">
                        <a href="allcat.php">blog</a>
                    </li>
                    <?php } 
                    else{ 
                    ?><li  class="col-xs-2 col-md-2  col-sm-2 active">
                    <a href="allcat.php">blog</a>
                    </li>
                    <?php } ?>

                    <li id="img" class="col-xs-3 col-md-3  col-sm-3 img" >
                        <a href="index.php"><img width="100%;" src="img/logo.png"/></a>
                    </li>
                    <?php if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_apropos)) {

                    ?> <li class="col-xs-3 col-md-3  col-sm-3">
                    <a href="apropos.php">À propos</a>

                    </li><?php }else{ ?>
                    <li class="col-xs-3 col-md-2  col-sm-3 active">
                        <a href="apropos.php">À propos</a>

                    </li><?php } ?>
                    <?php if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_contact)) {
                    ?> 

                    . 


                    <li class="col-xs-1 col-md-2  col-sm-2">
                        <a href="contact.php">contact</a>
                    </li>
                    <?php }
                    else{
                    ?> <li class="col-xs-1 col-md-2  col-sm-2 active">
                    <a href="contact.php">contact</a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>



            <nav id="navigation2" class="col-xs-12 col-md-12  col-sm-12" >

                <div class="col-xs-12  col-md-12  col-sm-12 listg">
                    <div class="burger ">
                        <a href="#" class="burger__button" id="burger-button">
                            <span class="burger__button__icon"></span>
                        </a>
                        <div class="burger__wrapper">

                            <div class="container">
                                <ul class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-10 col-md-offset-1 list" >

                                    <?php 
                                    const PAGES_accueil = ['/temps_moderne/index.php','/temps_moderne/home.php']; 

                                    if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_accueil)) {
                                    ?>
                                    <li  class="col-xs-4 col-md-2  col-sm-2 ">
                                        <a href="home.php">ACCUEIL</a>
                                    </li>
                                    <?php } 
                                    if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_blog)) {
                                    ?>
                                    <li  class="col-xs-3 col-md-2  col-sm-2 ">
                                        <a href="allcat.php">blog</a>
                                    </li>
                                    <?php } 

                                    if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_contact)) {
                                    ?> 
                                    <li class="col-xs-4 col-md-2  col-sm-2">
                                        <a href="contact.php">contact</a>
                                    </li>
                                    <?php } 

                                    if (!in_array($_SERVER['SCRIPT_NAME'], PAGES_apropos)) {

                                    ?> <li class="col-xs-6 col-md-2  col-sm-2">
                                    <a href="apropos.php">À propos</a>

                                    </li><?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1  page" style="text-align:right; ">
                        <?php 
                        const PAGES_allart = ['/temps_moderne/allarticle.php'];
                        const PAGES_artby = ['/temps_moderne/articlebycat.php'];
                        const PAGES_art = ['/temps_moderne/article.php'];
                        if (in_array($_SERVER['SCRIPT_NAME'], PAGES_artby)) {
                        ?>

                        <h3 style="display:inline-block;"><a><?php echo $_GET['name'];?></a></h3>

                        <?php } 
                        if (in_array($_SERVER['SCRIPT_NAME'], PAGES_accueil)) {
                        ?>

                        <h3 style="display:inline-block;padding-right:20px;"> <a href="home.php">Accueil</a></h3>

                        <?php } 
                        if (in_array($_SERVER['SCRIPT_NAME'], PAGES_blog)) {
                        ?>

                        <h3 style="display:inline-block;padding-right:20px;"><a href="allcat.php">Blog</a></h3>

                        <?php } 

                        if (in_array($_SERVER['SCRIPT_NAME'], PAGES_contact)) {
                        ?> 

                        <h3 style="display:inline-block;margin-top:25px;padding-right:20px;">    <a href="contact.php">Contact</a></h3>

                        <?php } 

                        if (in_array($_SERVER['SCRIPT_NAME'], PAGES_apropos)) {

                        ?> 
                        <h3 style="display:inline-block;margin-top:25px;">    <a href="apropos.php">À propos</a></h3>

                        <?php }if (in_array($_SERVER['SCRIPT_NAME'], PAGES_art)) {

                        ?> 
                        <h3 style="display:inline-block;">    <a href="apropos.php">Article</a></h3>

                        <?php } if (in_array($_SERVER['SCRIPT_NAME'], PAGES_allart)) {

                        ?> 
                        <h3 style="display:inline-block;">    <a href="apropos.php">Tous les articles</a></h3>

                        <?php } ?>
                    </div>
                    <div id="img" class="col-xs-3 col-xs-offset-1  col-sm-2 col-sm-offset-1 img" >
                        <a href="index.php"><img width="100%;" src="img/logo.png"/></a>
                    </div>
                </div>
            </nav>
        </header>
        <script>
            var burger = document.getElementById('burger-button');
            burger.addEventListener('click', function (e) {
                e.preventDefault();
                document.body.classList.toggle('open');
                burger.classList.toggle('open');

            });
        </script>