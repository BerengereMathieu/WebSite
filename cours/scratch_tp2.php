<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href=../css/bootstrap.css rel="stylesheet">
  
  
  <link href=../css/main_css_sheet.css rel="stylesheet">

  <link href=../css/cours_css_sheet.css rel="stylesheet">


  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/common.js"> </script>
</head>
<body>

<?php include('../headerPortefolio.html'); ?>

   <div class="class=container-fluid content">
  

    <h1 class="text-center">Scratch : initiation à l'algorithmique</h1>
    <h2 class="text-center">TP2 : Les boucles</h2>    <br></br>
    
    <div class="row">
      <div class="col-sm-8 text-justify">      
	<div class="cv_part_border">
	
	  <div class="cv_part">
	    <h2>Mise en place</h2>
	    <ul>
	      <li>Récupérez votre travail du tp1, sauvegardé dans le fichier
		<kbd>TP1_exo1</kbd> : <kbd>Fichier -> importer depuis votre ordinateur</kbd> </li>

	      <li> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
			  dans un fichier nommé <kbd>asteroides_TP2_exo1</kbd>.</li>

	    </ul>
	    </div>
	  </div>

	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Déplacement du vaisseau</h2>
	      <p> Pour le moment notre vaisseau se contente de se déplacer selon un circuit connu d'avance
	      (un L ou un carré), ce qui n'est pas très intéressant pour un jeu vidéo. Nous allons permettre
	      au joueur de déplacer le vaisseau à appuyant sur les touches directionnelles.
	      </p>
	      <ul>
		<li>Supprimez le programme du TP1 : <kbd>clic droit -> supprimer</kbd></li>
		<li>Sélectionnez la catégorie de scripts <kbd>Evènements</kbd></li>
		<li>Sélectionnez le bloc <img src="images/button_pressed.jpg"></img></li>
	      </ul>
	      <p>
	      Ce bloc possède un menu défilant qui liste une partie des touches du clavier. Celles qui nous intéressent
	      sont :
	      <ul>
		<li>flèche haut</li>
		<li>flèche bas</li>
		<li>flèche droite</li>
		<li>flèche gauche</li>
	      </ul>
	      </p>
	      <p>
	      Lorsque l'utilisateur appuie sur une touche du clavier, les actions en dessous
	      du bloc s'exécutent. Par exemple avec le code suivant :
	      <br></br><img src="images/tp2_exemple_01.jpg"></img>
	      <br></br>
	      le personnage est placé au centre de la zone d'affichage puis avance
	      de 100 pixels, chaque fois que l'utilisateur appuie sur <kbd>flèche haut</kbd>.
	      </p>
	      <p>
	      Pour la suite de ce TP vous aurez égalements besoin des blocs du menu <kbd>Mouvement</kbd>. Comme
	      vous avez déjà utilisé ces blocs dans le TP précédent, nous ne rappellerons
	      pas leur comportement. Si vous avez un trou de mémoire, n'hésitez pas à
	      consulter la colonne de droite.
	      </p>
	    </div>
	  </div>
	  
	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Exercice 1</h2>
	      <ul>
		<li>Créez le programme permettant de positionner le vaisseau aux coordonnées (0,0) lorsque le joueur clique sur le drapeau vert</li>
		<li>Ajoutez les instructions nécessaires pour :
		  <ul>
		  <li>déplacer le vaisseau vers le haut, quand le joueur appuie sur flèche haute ;
		  <li>déplacer le vaisseau vers le bas, quand le joueur appuie sur flèche bas ;
		  <li>déplacer le vaisseau vers la droite, quand le joueur appuie sur flèche droite ;
		  <li>déplacer le vaisseau vers la gauche, quand le joueur appuie sur flèche gauche.
		  </ul>
		</li>
		<li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
		dans un fichier nommé <kbd>asteroides_TP2_exo1"</kbd>.</li>
	      </ul>
	    </div>
	  </div>
	  
	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Exercice 2</h2>
	      <p>
		Pour le moment, lorsque le joueur n'appuie sur aucune touche le vaisseau reste immobile. Nous allons modifier un peu ce comportement pour que:
		<ul>
		    <li>le vaisseau continue à avancer même quand le joueur n'appuie sur aucun bouton ; </li>
		    <li>le vaisseau change de direction lorsque le joueur appuie sur l'une des flèches directionnelles ; </li>
		    <li>le vaisseau rebondisse lorsqu'il touche un bord de la zone de jeu.</li>
		</ul>
		Pour cela nous allons utiliser un nouveau type de bloc : les blocs de <kbd>contrôle</kbd> et plus particulièrement le bloc <kbd>répéter indéfiniment</kbd>.
		Si vous déposez ce bloc dans votre éditeur, vous vous rendez compte qu'il peut contenir d'autres blocs, à l'intérieur de lui. Ces blocs seront répétés
		indéfiniment. En algorithmique, vous avez étudié le concept de <kbd>boucle</kbd> : le bloc <kbd>répéter indéfiniment</kbd> est une boucle
		infinie.
	      </p>
	      <ul>
		<li>
		Analysez le programme suivant et expliquez comment le vaisseau va se déplacer :<br/>
		<img src="images/tp2_exo2.jpg"></img></li>
		<li>
		À votre avis, pourquoi le programme suivant est-il bien meilleur ?<br/>
		<img src="images/tp2_exo2_bis.jpg"></img></li>
		<li>Si ce n'est pas déjà fait, recopiez le programme précédent.</li>
		<li>Ajoutez les instructions nécessaires pour que le vaisseau change de direction lorsqu'une touche directionnelle est pressée</li>
		<li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
			  dans un fichier nommé <kbd>asteroides_TP2_exo1"</kbd>.</li>
	      </ul>
	    </div>
	  </div>


	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Exercice 3</h2>
	      <p>
		Maintenant que notre vaisseau se déplace et que l'utilisateur peut le contrôler,
		il est temps d'ajouter un peu de difficulté en créant des ennemis. Nous allons commencer
		par un premier type d'ennemi : une horrible soucoupe volante. Nous allons écrire le programme lui permettant de se déplacer.
	      </p>
	      <ul>
		<li>Téléchargez l'image suivante et enregistrez-là dans le répertoire <kbd>Images_Asteroides</kbd> :  <img src="images/ovni.png"></img>
		<li>Dans Scratch, en bas de la zone d'affichage,
		    cliquez sur le bouton suivant : <img src="images/create_sprite_from_file.jpg"></img></li>
		<li>Sélectionnez l'image que vous venez d'enregistrer</li>
	      </ul>
	      <p>
		A côté de notre vaisseau, en bas de la zone d'affichage, vous voyez
		apparaître un nouveau personnage qui correspond à la soucoupe volante.
		  Bon d'accord, ce n'est pas vraiment une soucoupe, plûtot un vaisseau très
		  moche. Mais rien ne vous empêche de choisir une autre image.

		Autre souci, tout le code précédent semble avoir disparu : pas de panique, vous pouvez le retrouver en cliquant
		sur l'image du vaisseau. En fait le code du vaisseau et le code de la soucoupe volante sont séparés.
		Pour écrire le code correspondant à la soucoupe volante, cliquez dessus.
	      </p>

	      <ul>
		<li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,  dans un fichier nommé <kbd>asteroides_TP2_exo3</kbd>.</li>
	      </ul>
	      <p>
		Vous allez maintenant écrire le programme permettant de déplacer en continu la soucoupe volante, dès que le
		joueur clique sur le drapeau vert.
	      </p>
	      <ul>
		<li>La première chose à faire est de réduire la taille de la soucoupe volante à 25%
		de sa taille initiale. Besoin d'aide ? C'est un bloc du menu <kbd>Apparence</kbd>
		qu'il vous faut utiliser...</li>
		<li>Ensuite, à l'intérieur d'une boucle infinie, placez les blocs pour :
		  <ul>
		    <li>déplacer la soucoupe de 5 pixels ;
		    <li>le tourner de 1° dans le sens des aiguilles d'une montre;</li>
		    <li>rebondir si un bord de la zone d'affichage est atteint.</li>
		  </ul>
		</li>
		<p>Vous pouvez vous aider de l'exercice 2, qui est très similaire </p>
	      </ul>
	      <ul>
	      <li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
			dans un fichier nommé <kbd>asteroides_TP2_exo3</kbd>.</li>
	      </ul>
	    </div>
	  </div>	
	</div><!--End col 1 -->
      
	<div class="col-sm-4">
	  <div class="well">
	    <h3>Blocs à utiliser</h3>
	  </div>

	  <div class="well">
	    <h4>Menu évènements</h4>

	    <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>évènements</kbd>.</p>
	    <img src="./images/events_menu.jpg" ></img>

	    <br></br>
	    <ul>
	    <li><img src="images/start.jpg"></img> : première instruction pour démarrer le programme
	      lorsque l'utilisateur clique sur le drapeau vert</li>
	    <li><img src="./images/button_pressed.jpg" ></img> : exécute un programme lorsqu'une touche
	    est pressée par l'utilisateur</li>
	    </ul>
	  </div>

	    <div class="well">
	      <h4>Menu mouvement </h4>
	      <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>mouvement</kbd>.</p>
	      <img src="./images/motion_menu.jpg" ></img>
	      <br></br>
	      <ul>
	      <li><img src="images/move_to.jpg"></img> : positionne le vaisseau</li>
	      <li><img src="images/move.jpg"></img> : avance le vaisseau</li>
	      <li><img src="images/set_dir.jpg"></img> : positionne le vaisseau dans
	      une direction spécifique(droite, gauche, haut,bas)</li>
	      <li><img src="images/turn_clock.jpg"></img> : tourne le vaisseau dans le sens
	      des aiguilles d'une montre</li>
	      <li><img src="images/turn_unclock.jpg"></img> : tourne le vaisseau dans le sens
	      inverse des aiguilles d'une montre</li>

	      </ul>
	    </div>



	    <div class="well">
	      <h4>Menu contrôle </h4>
	      <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>contrôle</kbd>.</p>
	      <img src="./images/control_menu.jpg" ></img>
	      <br></br>
	      <ul>
	      <li><img src="images/endless_loop.jpg"></img> : répète une liste d'actions, sans s'arrêter</li>
	      </ul>
	    </div>

	    <div class="well">
	      <h4>Menu apparence</h4>
	      <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>apparence</kbd>.</p>
	      <img src="./images/apperance_menu.jpg" ></img>
	      <br></br>
	      <ul>
	      <li><img src="images/size.jpg"></img> : donnez la taille d'un objet</li>
	      </ul>
	    </div>
	  </div>
	</div>
      </div> <!-- end row-->
      
      <div class="text-center ">
	<ul class="pagination">
	  <li><a href="./scratch_tp1.php">TP1</a></li>
	  <li class="active"><a href="#">TP2</a></li>
	  <li><a href="./scratch_tp3.php">TP3</a></li>
	</ul>
      </div> <!-- End pagination -->
      
   </div> <!-- end content-->

<?php include('../footerLevel2.html'); ?>
  </div>

</body>

</html>

