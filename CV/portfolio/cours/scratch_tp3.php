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
    <div class="row">
      <div class="col-sm-8 text-justify">
      
      <div class="cv_part_border">
	<div class="cv_part">
	</div>
      </div>
      
      <div class="cv_part_border">
	<div class="cv_part">
      </div>
    </div>
    
  
	<div class="cv_part_border">
	  <div class="cv_part">
	    
	  </div>
	</div>
	

	<div class="cv_part_border">
	  <div class="cv_part">
	    <h2>Exercice 3</h2>
	      <p>
		Il nous reste à modifier le comportement de la soucoupe volante
		pour qu'elle disparaisse lorsqu'elle touche le projectile. C'est
		très simple : là aussi, il suffit de remplacer la boucle <kbd>répéter indéfiniment</kbd>
		par une boucle <kbd>jusqu'à</kbd> et de cacher la soucoupe volante, une fois
		que cette boucle est terminée.... Oui, c'est exactement la même chose que
		dans l'exercice 2 !
	      </p>
	      <ul>
		<li>Sélectionnez la soucoupe volante pour pouvoir modifier son programme</li>
		<li>Remplacez la boucle infinie, par une boucle <kbd>Jusqu'à projectile touché</kbd></li>
		<li>Cachez la soucoupe à la fin de la boucle</li>
		<li>Lorsque le programme se terminera, la soucoupe sera cachée. Il faut donc
		  ajouter le bloc permettant de la montrer, au tout début du programme, avant
		  de modifier sa taille : ajoutez le bloc <kbd>montrer</kbd>. Si vous n'ajoutez
		  pas ce bloc, votre soucoupe restera invisible lorsque vous relancerez
		  votre programme.
		<li>Testez votre programme</li>
		<li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>, dans un fichier nommé <kbd>asteroides_TP3_exo3"</kbd>.</li>
	      </ul>
	      <p>
		Malheureusement, il y a un  bug dans notre programme et il en plus il n'est pas facile à trouver. En fait, lorsque le projectile est caché, il est simplement invisible : la soucoupe volante peut toujours le percuter et mourir, alors que le joueur n'a pas tiré. Aussi, avant de cacher le projectile, nous allons le mettre très loin en dehors de la zone d'affichage,par exemple au point de coordonnées (1000,1000).
	      </p>
	      <ul>
		<li>Sélectionnez le projectile, pour modifier son programme</li>
		<li>Ajoutez aux bons endroits, le bloc permettant de placer
		le projectile à un endroit spécifique (indice : c'est un bloc de <kbd>mouvement</kbd>)</li>
		<li>Testez votre programme</li>
		<li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>, dans un fichier nommé <kbd>asteroides_TP3_exo3</kbd>.</li>
	      </ul>
	  </div>
	</div>


      </div> <!-- End row 1-->
      
      <div class="col-sm-4">
	<div class="well">
          <h3>Blocs à utiliser</h3>
         </div>
         
	<div class="well">
	  <h4 class="text-primary">Menu évènements</h4>

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
	  <h4 class="text-primary">Menu mouvement </h4>
	  <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>mouvement</kbd>.</p>
	  <img src="./images/motion_menu.jpg" ></img>
	  <br></br>
	  <ul>
	    <li><img src="images/move_to.jpg"></img> : positionne le vaisseau</li>
	    <li><img src="images/move.jpg"></img> : fais avancer le vaisseau</li>
	    <li><img src="images/set_dir.jpg"></img> : positionne le vaisseau dans
	    une direction spécifique(droite, gauche, haut,bas)</li>
	    <li><img src="images/turn_clock.jpg"></img> : tourne le vaisseau dans le sens
	    des aiguilles d'une montre</li>
	    <li><img src="images/turn_unclock.jpg"></img> : tourne le vaisseau dans le sens
	    inverse des aiguilles d'une montre</li>
	    <li><img src="images/goto.jpg"></img> : va vers un objet spécifique</li>

	  </ul>
	</div>
	
	<div class="well">
	  <h4 class="text-primary">Menu contrôle </h4>
	  <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>contrôle</kbd>.</p>
	  <img src="./images/control_menu.jpg" ></img>
	  <br></br>
	  <ul>
	    <li><img src="images/endless_loop.jpg"></img> : répète une liste d'actions, sans s'arrêter</li>
	      <li><img src="images/until.jpg"></img> : répète une liste d'actions, jusqu'à ce qu'une
	      condition soit satisfaite</li>
	  </ul>
	</div>

	<div class="well">
	  <h4 class="text-primary">Menu apparence</h4>
	  <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>apparence</kbd>.</p>
	  <img src="./images/apperance_menu.jpg" ></img>
	  <br></br>
	  <ul>
	    <li><img src="images/size.jpg"></img> : donne la taille d'un objet</li>
	    <li><img src="images/hide.jpg"></img> : cache un objet</li>
	    <li><img src="images/show.jpg"></img> : montre un objet caché</li>
	  </ul>
	</div>

	<div class="well">
	  <h4 class="text-primary">Menu capteurs</h4>
	  <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>capteurs</kbd>.</p>
	  <img src="./images/sensor_menu.jpg" ></img>
	  <br></br>
	  <ul>
	    <li><img src="images/bound_touched.jpg"></img> : signale si le personnage
	    a atteint les bords de l'image</li>
	  </ul>
	</div>
      </div>
    </div> <!-- end row-->
    
    <div class="text-center ">
      <ul class="pagination">
	<li><a href="./scratch_tp1.php">TP1</a></li>
	<li><a href="./scratch_tp2.php">TP2</a></li>
	<li class="active"><a href="#">TP3</a></li>
      </ul>
    </div> <!-- End pagination -->
   </div> <!-- end content-->
                                               
  <?php include('../footerLevel2.html'); ?>
  </div>
  
</body>

</html>

