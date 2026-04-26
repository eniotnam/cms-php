<?php

require_once('./models/user.php');
require_once('./models/article.php');
require_once('./models/commentaire.php');
require_once('./models/vote.php');

if (!empty($_SESSION['connected'])){
    $iduser = $_SESSION['id'];
   
}


    $user = new user;
    $vote = new vote;
    $com = new commentaire;
    $article = new article;
    $detail = $user->getUserInfo($iduser);
    $comentaire = $user->getUserCommentaireProfil($iduser);

?>
<!-- Top Header -->
<head>
    <link rel="stylesheet" href="css/home.css"/>
   
</head>
<div class="header-spacer"></div>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-lg-5 col-md-5 ">
							</div>
							<div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
							</div>
						</div>

						<div class="control-block-button">

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="icons/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<?php if($iduser == $_SESSION['id']){ ?>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-profil-photo">Modifier la photo de profil</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Modifier la banniere</a>
									</li>
									<li>
										<a href="#">Parametre du compte</a>
									</li>
									
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Signaler</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
							<img src="img/<?php echo $details['photoprofil']? $detail['photoprofil']:"marianne3.png"?>" class="author-thumb" alt="author">
						<div class="author-content">
							<a href="02-ProfilePage.html" class="h4 author-name"><?php echo $detail['pseudo']; ?></a>
							<div class="country"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header -->



<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div id="newsfeed-items-grid">

				<div class="ui-block">
                <?php for($i = 0 ; $i < count($comentaire) ; $i++){ ?>
					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="img/author-page.jpg" alt="author">

							<div class="author-date">
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
                                    <p><?php echo $comentaire[$i]['date']; ?></p>
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Signaler</a>
									</li>
								</ul>
							</div>

						</div>

                        <p style="color: grey;"><b><i><?php echo $detail['pseudo']; ?>  <?php
                        $idarticle = $comentaire[$i]['id_article']; ?> à commenter <a href=""><?php 
    $art = $article->getArticleWID($idarticle);
    echo $art['titre']; ?></a></i></b>
						</p>
                        <?php echo $comentaire[$i]['comm']; ?>

					</article>
                <?php } ?>
				</div>

			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col-xl-3 pull-xl-6 col-lg-6 pull-lg-0 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title stat">
					<h6 class="title">Vos stats :</h6><br>
					
				</div>

                <i class="glyphicon glyphicon-comment" aria-hidden="true"></i><?php $com->countCommentaireuser($_SESSION['id']); ?><br>
                <i class="glyphicon glyphicon-ok" aria-hidden="true"></i><?php $vote->countvoteyes($_SESSION['id']); ?>
                <i class="glyphicon glyphicon-minus" aria-hidden="true"></i><?php $vote->countvoteneutre($_SESSION['id']); ?>
                <i class="glyphicon glyphicon-remove" aria-hidden="true"></i><?php $vote->countvotenon($_SESSION['id']); ?>
               
			</div>
		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
			

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Vos Badges</h6>
				</div>
				<div class="ui-block-content">

					<ul class="widget w-badges">
						<li>
							<a href="#">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li><li>
							<a href="#">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li><li>
							<a href="#">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li><li>
							<a href="#">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li>
					</ul>

				</div>
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>


<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Modifier la banniere</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Choisissez votre photo</h6>
			<span>Depuis votre ordinateur.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="icons/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choisissez votre photo</h6>
			<span>Depuis une URL</span>
		</a>
	</div>
</div>

<!-- Window-popup Update profile Photo -->

<div class="modal fade" id="update-profil-photo">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Header Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Choisissez votre photo</h6>
			<span>Depuis votre ordinateur.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="icons/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choisissez votre photo</h6>
			<span>Depuis une URL</span>
		</a>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->


<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo">
A FAIRE !
</div>

<!-- ... end Window-popup Choose from my Photo -->
