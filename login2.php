<?php
session_start();
require_once 'models/query.php';
$query = new query;


if(isset($_GET['formconnexion']))
{
    $mailconnect = $_GET['mailconnect'];
    $mdpconnect = $_GET['mdpconnect'];
    if(!empty($mailconnect) && !empty($mdpconnect) )
    {
        $pseudoconnect = htmlspecialchars($_GET['pseudoconnect']);
        $mdpconnect = sha1($_GET['mdpconnect']);

       $dbh = $query->getDb();
    
     $requser = $dbh->prepare("SELECT * FROM users WHERE pseudo = ? AND mdpcrypt = ? ");
        $requser->execute(array($pseudoconnect, $mdpconnect));


        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetchALL();
            $_SESSION['id'] = $userinfo[0]['id'];
            $_SESSION['pseudo'] = $userinfo[0]['pseudo'];
         
            $_SESSION['connected'] = true;
            $_SESSION['rank'] = $userinfo[0]['rank'];
           
            if($_SESSION['rank'] == 1){
                header('location: adm/index.php');
            }
            else    {
                header("Location:home.php");}
        }
        else
        {
           $erreur = "Mauvais mail ou mot de passe incorrect !";
            
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

if (isset($_GET['forminscription']))
{ 
    $pseudo = htmlspecialchars($_GET['pseudo']);

 $mdp = sha1($_GET['mdp']);
 $mdp2 = sha1($_GET['mdp2']);

 if(!empty($_GET['pseudo']) 
    AND !empty($_GET['mdp']) && !empty($_GET['mdp2']))
 {

    
             if(strlen($pseudo)>=3)
             {

                 $reqmail = $dbh->prepare("SELECT * FROM users WHERE pseudo = ? ");
                 $reqmail->execute(array($pseudo));
                 $pseudoexist= $reqmail->rowCount();
                 if($pseudoexist == 0)
                 {
                     if($mdp==$mdp2)
                     {
                         if(strlen($_GET['mdp'])>=8)
                         {
                             $rank = 0;
                             $insertmbr =$dbh->prepare("INSERT INTO users (pseudo, mdpcrypt,rank) VALUES (?, ?,?) ");
                             $insertmbr -> execute(array($pseudo, $mdp,$rank));
                             $ok = "Votre compte a été bien crée ! veuillez vous connecter";
                         }
                         else $erreurs = "mot de passe doit être composé de minimum 8 caractère";
                     }
                     else
                     {
                         $erreurs = "vos mot de passe ne sont pas identiques !";
                     }
                 }
                 else $erreurs ="pseudo déja pris";
             }
             else $erreurs ="pseudo doit être composé de minimum 3 caractères";
        
   
    

 }

}
?>

<html lang="fr"><head>
    <title>Vox Kratos </title>
    <meta charset="utf-8">
    <meta name="Description" CONTENT="Réseau social politique  grâce au quel vous pouvez prendre part à la politique de votre pays">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Vox Kratos" />
    <meta property="og:description" content="Le réseau social politique" />
    <meta property="og:url" content="voxkratos.com" />
    <meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20170919161736/recaptcha__fr.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <script type="text/javascript" src="js/mdp.js"></script>
    <link rel="stylesheet" href="">
    <script type="text/javascript" src=""></script>
    <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="426677975144-g8ufjgl5mv39jjnvogi5qudf4v5m5mrm.apps.googleusercontent.com">

  
    </head>
    <body>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '257736884666551',
                    xfbml      : true,
                    version    : 'v2.10'
                });
                FB.AppEvents.logPageView();
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=257736884666551";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <script>
            function onSuccess(googleUser) {
                console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
            }
            function onFailure(error) {
                console.log(error);
            }
            function renderButton() {
                gapi.signin2.render('my-signin2', {
                    'scope': 'profile email',
                    'width': 192.5,
                    'height': 28,
                    'longtitle': true,
                    'theme': 'dark',
                    'onsuccess': onSuccess,
                    'onfailure': onFailure
                });
            }
        </script>

        
        
        
        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <div class="background-image-fixed cover-image" style="background-image : url('img/background1.jpg'); width: 100%;  background-size: cover;   background-position: center;">
            <div id="home" class="cover">
                <div class="container">
                    <div class="row home" style="margin-top: 6%">
                        <div class="col-md-6 text-center border" style="background-color: transparent; margin-top: 10%">
                        
                            <h1 class="text-inverse" style="color: whitesmoke; font-size: 75px"><br>Vox Kratos</h1>
                            <p class="text-inverse" style="color: whitesmoke; font-size: 25px">Le réseau social politique</p>
                            <br>
                            <br> 

                            <a href="#plus" class="js-scrollTo btn btn-info btn-sm" style="font-size: 20px">En savoir plus</a>
                        </div>

                        <div class="container">
                            <br>
                            <div class="row loginbox">
                                <div class="col-md-6 rightsection loginform">
                                    <form id="login" action="/login?code=8094&amp;mail=magaud.sean@gmail.com" method="post">

  <?php
                                            if(isset($ok))
                                            {
                                                echo '<font color="green">'.$ok.'</font>';
                                            }
                                     
                                                if(isset($erreur))
                                                {
                                                    echo '<font color="red">'.$erreur.'</font>';
                                                }
                                                ?>
                                        <input type="hidden" name="_eventId" value="submit">
                                        <div class="form-group">
                                            <label class="sr-only" for="username">Votre adresse e-mail</label>
                                            <input type="email" required="" class="form-control" id="username" name="username" placeholder="E-mail" tabindex="1" data-original-title="" title="">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Votre mot de passe</label>
                                            <input type="password" required="" class="form-control" id="password" name="password" placeholder="Mot de passe" tabindex="2" data-original-title="" title="">
                                            <p class="text-danger" style="margin-top:5px;display:none;" id="capslock-on">
                                                <span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Verr. Maj. activé
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" style="width: 100%">
                                                Connexion
                                            </button>

                                        </div>
                                         </form>
                                        <!--  connect api google and facebook -->
                                        <div class="form-group">

                                            <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                        
                                            <div id="my-signin2" style="display: inline-block; text-align: right"></div>
                                       </div>

                                        <p class="morelinks" style="">
                                            <span><a id="passwordlost_link" href="#">Mot de passe oublié ?</a></span>
                                            <span style="color: whitesmoke">Pas encore de compte ? <a id= "inscription_link" href="#">Inscrivez-vous.</a></span>
                                        </p>
                                   
                                </div>
                                <div class="col-md-6 rightsection passwordlost">
                                    <form id="passwordlost" action="getToken" method="post">
                                        <p style="color: whitesmoke">Pour réinitialiser votre mot de passe, veuillez entrer votre adresse e-mail ci-dessous :</p>
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Votre adresse e-mail</label>
                                            <input type="email" required="" class="form-control" id="passwordlost_username" name="username" placeholder="E-mail">
                                        </div>

                                        <!-- Pour configurer le captcha, il faut faire en coté serveur =
Lorsque vos utilisateurs envoient le formulaire dans lequel vous avez intégré reCAPTCHA, vous recevez une chaîne de texte intitulée "g-recaptcha-response" parmi les données utiles. Pour savoir si cet utilisateur a été validé par Google, envoyez une demande POST avec les paramètres suivants :
URL : https://www.google.com/recaptcha/api/siteverify
secret (obligatoire)	6LcyEjMUAAAAAHcT34KUBY32HMX2TLdoq1rkrif5
response (obligatoire)	La valeur "g-recaptcha-response"
remoteip	Adresse IP de l'utilisateur final
--> 
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LcyEjMUAAAAAMxsnvGD7AxGcq0g9BOE1askL95B"><div style="width: 304px; height: 78px;"><div>
                                                <!-- c'est ici, apres le anchor?k="6LcyEjMUAAAAAHcT34KUBY32HMX2TLdoq1rkrif5"; j'arrive pas a le faire work--> 
                                                <iframe src="https://www.google.com/recaptcha/api2/anchor?k=6LcyEjMUAAAAAHcT34KUBY32HMX2TLdoq1rkrif5&amp;co=aHR0cHM6Ly9zc28ueW5vdi5jb206NDQz&amp;hl=fr&amp;v=r20170919161736&amp;size=normal&amp;cb=sytzyd14zdey" title="widget recaptcha" width="304" height="78" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                Réinitialiser mon mot de passe
                                            </button>
                                        </div>
                                        <p class="morelinks">
                                            <a style="color: whitesmoke" id="passwordlost_cancel" href="#"><i class="material-icons">keyboard_arrow_left</i> Retour</a>
                                        </p>
                                    </form>
                                </div>
                                <div class="col-md-6 rightsection inscription">
                                    <form id="inscription" action="getToken" method="post">
                                        <input type="hidden" name="_eventId" value="submit">
                                        <div class="form-group">
                                            <label class="sr-only" for="username">Votre pseudo</label>
                                            <input type="name" required="" class="form-control" id="username" name="name" placeholder="Pseudo" tabindex="1" data-original-title="" title="">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="username">Votre adresse e-mail</label>
                                            <input type="email" required="" class="form-control" id="username" name="username" placeholder="E-mail" tabindex="1" data-original-title="" title="">
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="password">Votre mot de passe</label>
                                            <input type="password" required="" class="form-control" id="password" name="password" placeholder="Mot de passe" tabindex="2" data-original-title="" title="">
                                            <p class="text-danger" style="margin-top:5px;display:none;" id="capslock-on">
                                                <span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Verr. Maj. activé
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                Inscription
                                            </button>
                                        </div>
                                        <p class="morelinks">
                                            <a style="color: whitesmoke" id="inscription_cancel" href="#"><i class="material-icons">keyboard_arrow_left</i> Retour</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="plus" class="section">
            <div class="container">
                <div class="row" >
                    <div class="col-md-6">
                        <img src="img/ilustratio.png"
                             class="img-responsive" style="margin-top: 50px">
                    </div>
                    <div class="col-md-6" style="line-height: 40px; text-align: center;  top: 50px">
                        <h1 class="text-primary">Toute l'information législative</h1>
                        <h3>Créez votre propre avis</h3>
                        <p style=" line-height: 1.42857143; text-align: justify">VoxKratos vous propose de lire les lois présentées, votées, oubliées et même celles qui restent à l'état de projet. Des videos débrief seront disponibles pour vous tenir au courant le plus briévement et impartialement possible. L'accessibilitée aux textes étant simplifiée pas de place pour les "fakes news", les faux debats inutiles télévisés ou radiodiffusés. Allons à l'essentiel, le contenu des lois.
                            Ce dernier vous sera décrypté par nos équipes mais les textes de loi avec le vocabulaire juridique resteront disponibles pour montrer la neutralité de nos traductions.<br><br>
                            VoxKratos le site qui vous présente l'actualité législative.</p>
                        <a href="home.php" class="col-md-4 col-md-offset-4 btn btn-info btn-sm" style="padding:10px;margin-top:40px;font-weight:bold;background-color: #5BC0EA; top: -30px">SE TENIR AU COURANT</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="line-height: 40px; text-align: center;  top: 50px">
                        <br><br>
                        <h1 class="text-primary">Communiquez et votez</h1>
                        <h3>Ayez un rôle</h3>
                        <p style=" line-height: 1.72857143; text-align: justify">On vous permet de donner votre avis sur les textes, de proposer des améliorations, de lire les avis des autres et d'y réagir (avec un respect démocratique nous y veillerons). Ne restez pas simple spectateur parlez mais votez aussi. Comme au parlement votez pour, contre ou neutre, tout vote sera pris en compte. Chaque semaine nos équipes essaierons de créer des groupes de débat sur des problèmatiques actuelles ou oubliées afin que tout sujet soit traité.<br><br>Voxkratos le site qui vous redonne du pouvoir.</p>
                        <a href="#home" class="col-md-4 js-scrollTo col-md-offset-4 btn btn-info btn-sm" style="padding:10px;margin-top:0px;font-weight:bold;background-color: #5BC0EA; top:    0px">AVOIR DU POUVOIR</a>

                    </div>
                    <div class="col-md-6 ">
                        <br><br>
                        <img src="img/ilustra.png" class="img-responsive" style="margin-top: 50px">
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.js-scrollTo').on('click', function() { // Au clic sur un élément
                    var page = $(this).attr('href'); // Page cible
                    var speed = 750; // Durée de l'animation (en ms)
                    $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
                    return false;
                });
            });
        </script>
</body></html>