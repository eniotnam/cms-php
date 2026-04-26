<?php
require_once 'models/mail.php';
$email = new email;
if(isset($_POST['send'])){
    $name=htmlentities($_POST['name']);
    $phone=htmlentities($_POST['phone']);
    $subject=htmlentities($_POST['subject']);
    $mail=htmlentities($_POST['mail']);
    $message=htmlentities($_POST['message']);
   $email->contact($name,$phone,$subject,$mail,$message);
   
    $erreur = "<span class='col-md-4 col-md-offset-4' style='color:green'>Votre message à bien été envoyé</span>";
    

}
?>
<head>

    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<div class="header-spacer"></div>

<div class="col-sm-12 col-md-12 grdpic">
    <img width="100%" src="img/contact.jpg" />
</div>
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 title">

    <h1>Conctatez nous</h1> 
   Glissez nous vos mots doux (ou pas) par ici : 
   <?php if(isset($erreur)){
    echo $erreur;
} ?>
</div>

<form method="POST" class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
  <div class="col-sm-12 col-md-12 shadow">
   <div class="col-sm-6  col-md-6 box"><input placeholder="Prénom et nom" name="name" class="col-sm-12 col-md-12 "/></div>
    <div class="col-sm-6 col-md-6 box"> <input placeholder="Téléphone" name="phone" class="col-sm-12 col-md-12"/></div>
    <div class="col-sm-6 col-md-6 box"> <input placeholder="Sujet" name="subject" class="col-sm-12 col-md-12"/></div>
    <div class="col-sm-6 col-md-6 box"> <input placeholder="E-MAIL" type="email" name="mail" class="col-sm-12 col-md-12"/></div>

    <div class="col-sm-12 col-md-12 box"> <textarea placeholder="Votre message" name="message" class="col-sm-12 col-md-12 message"></textarea></div>
    </div>
    <div class="col-sm-12 col-md-12 box"> <input type="submit" value="Nous contacter" name="send" class="col-sm-12 col-md-12 send"/></div>
</form>
