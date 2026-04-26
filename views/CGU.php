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
    <link rel="stylesheet" href="css/CGU.css"/>

</head>
<div class="header-spacer"></div>

<div  class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 title">

    <h1 >C.G.U</h1> 
    <p>Conditions générales d'utilisation du site FillesdesTempsModernes.com</p>


</div>
<div  class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 text">
    <h3><span>ARTICLE 1 :</span> Objet</h3>
    <p>
        Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique de l’utilisation du site www.fillesdestempsmodernes.com et de ses services.<br><br>
        Ce contrat est conclu entre :<br><br>
        Les gérants du site internet, ci-après désigné Juliette Batté, Camille Petry et Antoine Marteau.<br><br>
        Toute personne physique ou morale souhaitant accéder au site et à ses services, ci-après appelé « l’Utilisateur ».<br><br>
        Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur, et son accès au site vaut acceptation de ces conditions.
    </p>
    
    <h3><span>ARTICLE 2 :</span> Mentions légales</h3>
    <p>Pour les personnes morales :<br><br>
        Le site fillesdestempsmodernes.com est édité par la société Juliette Batté Consulting, auto entrepreneur, dont le siège social est situé au 27 rue de Levis, 75017.<br><br>
        La société est représentée par Juliette Batté.<br><br>
        Pour les personnes physiques : <br><br>
        Le site fillesdestempsmodernes.com est édité par Juliette Batté et Camille Petry, domiciliés au 41 boulevard de la République, 92250, La Garenne Colombe.

    </p>
    
   
    
    <h3><span>ARTICLE 3 :</span> Responsabilité de l’Utilisateur</h3>
    <p>
        L'Utilisateur est responsable des risques liés à l’utilisation de son identifiant de connexion et de son mot de passe.<br><br> 
        Le mot de passe de l’Utilisateur doit rester secret. En cas de divulgation de mot de passe, l’Éditeur décline toute responsabilité.
        L’Utilisateur assume l’entière responsabilité de l’utilisation qu’il fait des informations et contenus présents sur le site fillesdestempsmodernes.com.<br><br>
        Tout usage du service par l'Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l'objet d'une indemnisation au profit du site.<br><br>
        Le site permet aux membres de publier sur le site :
        <li>Commentaires.</li><br>
        Le membre s’engage à tenir des propos respectueux des autres et de la loi et accepte que ces publications soient modérées ou refusées par l’Éditeur, sans obligation de justification. <br><br>
        En publiant sur le site, l’Utilisateur cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé.<br><br>
        L’Éditeur s'engage toutefois à citer le membre en cas d’utilisation de  sa publication.

    </p>
    
    <h3><span>ARTICLE 4 :</span> Responsabilité de l’Éditeur</h3>
    <p>Tout dysfonctionnement du serveur ou du réseau ne peut engager la responsabilité de l’Éditeur.<br><br>
        De même, la responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d'un tiers.<br><br>
        Le site fillesdestempsmodernes.com s'engage à mettre en œuvre tous les moyens nécessaires pour garantir la sécurité et la confidentialité des données. Toutefois, il n’apporte pas une garantie de sécurité totale.<br><br>
        L’Éditeur se réserve la faculté d’une non-garantie de la fiabilité des sources, bien que les informations diffusées sur le site soient réputées fiables.</p>
    <h3><span>ARTICLE 5 :</span> Propriété intellectuelle</h3>
    <p>Les contenus du site fillesdestempsmodernes.com (logos, textes, éléments graphiques, vidéos, etc.) sont protégés par le droit d’auteur, en vertu du Code de la propriété intellectuelle.<br><br>
        L’Utilisateur devra obtenir l’autorisation de l’éditeur du site avant toute reproduction, copie ou publication de ces différents contenus.
        Ces derniers peuvent être utilisés par les utilisateurs à des fins privées ; tout usage commercial est interdit.<br><br>
        L’Utilisateur est entièrement responsable de tout contenu qu’il met en ligne et il s’engage à ne pas porter atteinte à un tiers.<br><br>
        L’Éditeur du site se réserve le droit de modérer ou de supprimer librement et à tout moment les contenus mis en ligne par les utilisateurs, et ce sans justification.<br><br>
        Crédits photos : Lorène Lajun comme Photographe.
    </p>
    
    <h3><span>ARTICLE 6 :</span> Données personnelles</h3>
    <p>L’Utilisateur doit obligatoirement fournir des informations personnelles pour procéder à son inscription sur le site. <br><br>
        L’adresse électronique (e-mail) de l’utilisateur pourra notamment être utilisée par le site [nom de votre site] pour la communication d’informations diverses et la gestion du compte.<br><br>
        Fillesdestempsmodernes.com garantie le respect de la vie privée de l’utilisateur, conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés.<br><br>
        En vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit via :
        <li>Son espace personnel sur le site ;</li>
        <li>Un formulaire de contact ;</li>
        <li>Par mail à contact@fillesdestempsmodernes.com;</li>
<!--        <li>Par voie postale au Mme Batté Juliette, 41 boulevard de la République, La Garenne Colombe.</li>-->
    </p>
    
    <h3><span>ARTICLE 7 :</span> Liens hypertextes</h3>
    <p>Les domaines vers lesquels mènent les liens hypertextes présents sur le site n’engagent pas la responsabilité de l’Éditeur de fillesdestempsmodernes.com, qui n’a pas de contrôle sur ces liens.<br><br>
        Il est possible pour un tiers de créer un lien vers une page du site fillesdestempsmodernes.com sans autorisation expresse de l’éditeur.
    </p>
    
    <h3><span>ARTICLE 8 :</span> Évolution des conditions générales d’utilisation</h3>
    <p>Le site fillesdestempsmodernes.com se réserve le droit de modifier les clauses de ces conditions générales d’utilisation à tout moment et sans justification.
    </p>
    
    <h3><span>ARTICLE 9 :</span> Durée du contrat</h3>
    <p>
        La durée du présent contrat est indéterminée. Le contrat produit ses effets à l'égard de l'Utilisateur à compter du début de l’utilisation du service.</p>

    <h3><span>ARTICLE 10 :</span> Droit applicable et juridiction compétente</h3>
<p>Le présent contrat dépend de la législation française. <br><br>
En cas de litige non résolu à l’amiable entre l’Utilisateur et l’Éditeur, les tribunaux de Paris sont compétents pour régler le contentieux.</p>

    <h3><span>ARTICLE 11 :</span> Hébergement du site internet</h3>
<p>Notre site internet est hébergé par la société OVH France
    <li>SAS au capital de 10 000 000 €</li>
<li>RCS Lille Métropole 424 761 419 00045</li>
    <li>Code APE 6202A</li>
   <li> N° TVA : FR 22 424 761 419</li>
<li>Siège social : 2 rue Kellermann – 59100 Roubaix – France</li>
        </p>
<h3>    <span>ARTICLE 12 :</span> Cookies</h3>
<p>Lors de la consultation du site, des informations relatives à la navigation des Clients sont susceptibles d’être enregistrées dans des fichiers « Cookies » installés sur leur terminal (ordinateur, tablette, Smartphone).<br>
Ces cookies sont émis par fillesdestempsmodernes.com dans le but de faciliter la navigation sur le site et permettent de reconnaître le navigateur des Clients lorsqu’ils sont connectés au Site.<br><br>
Ces cookies sont émis afin de :
<li>Etablir des statistiques de fréquentation (nombre de visites, de pages vues, d’abandon dans le processus de commande)</li>
<li>Adapter la présentation du Site aux préférences d’affichage des terminaux,</li>
<li>Mémoriser des informations saisies dans des formulaires, gérer et sécuriser l’accès à des espaces réservés et personnels tels que le compte Client et à gérer le panier de Commande.</li>
 <li>fillesdestempsmodernes.com se réserve le droit d’implanter des cookies dans l’ordinateur du Client lors des visites sur le Site.</li><br>
Un cookie est un petit fichier qui est envoyé sur l’ordinateur du Client et stocké sur son disque dur. Si le Client est enregistré chez  fillesdestempsmodernes.com, son ordinateur stockera un cookie identifiant qui lui fera gagner du temps à chaque fois qu’il retournera sur le site  fillesdestempsmodernes.com car il se rappellera de l’adresse mail du Client.<br>
Un cookie ne permet pas d’identifier le Client mais a pour objet de signaler toute précédente visite du Client sur le Site afin d’aider  fillesdestempsmodernes.com à personnaliser ses services.<br>
Le Client peut effectuer des paramétrages afin que les cookies soient désactivés et éviter ainsi que des cookies soient installés, sans son accord exprès, dans son ordinateur.<br>
Tout paramétrage mis en œuvre par le Client sera susceptible de modifier la navigation sur Internet et les conditions d’accès à certains services du Site nécessitant l’utilisation de Cookies.<br>
Le Client peut exprimer et modifier à tout moment ses souhaits en matière de cookies, par les moyens décrits ci-dessous.<br>
Le Site utilise des applications informatiques émanant de tiers, qui permettent au Client de partager des contenus du Site avec d’autres personnes ou de faire connaître à ces autres personnes son opinion concernant un contenu du Site. (Réseaux sociaux tels que Facebook, « Google+ », »Twitter », etc).<br>
Lorsque le Client consulte une page du Site contenant un bouton « Partager » ou « J’aime », son navigateur établit une connexion directe avec les serveurs du réseau social concerné.<br>
S’il est connecté au réseau social lors de sa navigation, les boutons applicatifs permettent de relier les pages consultées à son compte.
S’il interagit au moyen des plug-ins, par exemple en cliquant sur le bouton « J’aime » ou en laissant un commentaire, les informations correspondantes seront transmises au réseau social concerné et publiées sur son compte.<br>
Si le Client ne souhaite pas que les réseaux sociaux relient les informations collectées par l’intermédiaire du Site à son compte, il doit se déconnecter du réseau social concerné avant de visiter le Site.<br>
 Fillesdestempsmodernes.com n’est en aucun cas responsable à quelque titre que ce soit du contenu ou du fonctionnement de l’un quelconque des réseaux sociaux, y compris ceux qui peuvent être reliés au Site.
</p>

    <h3><span>ARTICLE 13 :</span> Conception et réalisation (site web)</h3>
    <p>Le site a été réalisé par Antoine Marteau.</p>

</div>
