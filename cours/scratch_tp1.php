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
    <h2 class="text-center">TP1 : Découverte de Scratch</h2>
    <br></br>
    
    <div class="row">
      <div class="col-sm-8 text-justify">
	<div class="cv_part_border">
	  <div class="cv_part">
	      <h2 >Objectif</h2>
	      <p>Scratch est un langage de programmation graphique qui permet de réaliser
		rapidement des petits jeux vidéos et des décors animés. Nous allons l'utiliser
		pour créer une version simplifiée d'un très vieux jeu vidéo, Asteroids, édité par Atari
		en 1979.
	      </p>
	      <p>
		Le joueur contrôle un vaisseau spatial, qui doit affronter astéroïdes et soucoupes volantes. Le but est de survivre le plus longtemps possible. L'aire de jeu est intégralement représentée à l'écran. Le joueur peut :
		<ul>
		  <li>faire pivoter le vaisseau à droite</li>
		  <li>faire pivoter le vaisseau à gauche</li>
		  <li>accélérer</li>
		  <li>tirer</li>
		  <li>se téléporter aléatoirement, à ses risques et périls</li>
		</ul>
		Lorsqu'un asteroïde est touché, il se divise en deux astéroïdes de taille moyenne, qui chacun se diviseront en deux petits astéroides lesquels peuvent être détruits.
	      </p>
	      <p>
		Les soucoupes volantes sont de deux tailles, les plus imposantes peuvent tirer mais rapportent davantage de points. Une fois tous les asteroïdes détruits, le joueur passe au niveau suivant....qui contient davantage d'asteroïdes.
	      </p>
	    </div>
	  </div>

	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2 >Utilisation de Scratch</h2>
	      <p>Scratch est accessible en ligne, à l'adresse :
		<a href="https://scratch.mit.edu/projects/editor/?tip_bar=getStarted" target="_blank">
		  https://scratch.mit.edu/projects/editor/?tip_bar=getStarted
		</a>
	      </p>
	    </div>
	  </div>
	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Interface</h2>
	      <p>Lorsqu'on accède à l'application Scratch, on obtient le contenu suivant:</p>
	      <img src="images/interface.jpg" width="100%"></img>
	      <p>Cette fenêtre comporte 3 zones importantes :
		<ul>
		  <li>Une zone d'affichage : c'est là où vous verrez le résultat produit
		    par votre programme.</li>
		  <li>Une zone dans laquelle se trouvent les blocs d'actions élémentaires
		  classés en différentes catégories. C'est en associant ces blocs entre eux,
		  que vous allez créer vos programmes. Les blocs utiles au TP sont
		  listés dans la colonne de droite. </li>
		  <li>L'éditeur, c'est-à-dire là où vous allez déposer les blocs
		  élémentaires pour implémenter votre algorithme.</li>
		</ul>

		Un clic droit permet de supprimer, dupliquer ... les blocs.
	      </p>
	    </div>
	  </div>

	  <div class="cv_part_border">
	    <div class="cv_part">
	      <h2>Attention</h2>
	      <p> Pensez à sauvegarder régulièrement votre travail :
		<kbd>Fichier->Télécharger dans votre ordinateur</kbd>.
	      </p>
	    </div>
	  </div>

	  <div class="cv_part_border">
	    <div class="cv_part">
	    <h2>Perdu dans l'espace</h2>
	    <ul>
	      <li>Créer un répertoire "TP_Asteroides" qui contiendra tous les fichiers
		relatifs à ce TP</li>
	      <li>Revenez sur la page web de Scratch</li>
	      <li>Commencez par choisir un fond pour votre jeu, en cliquant sur le bouton
	      <img src="./images/load_background.jpg"/>, à gauche</li>
	      
	      <img class="img-responsive center-block" src="./images/load_background_location.jpg"/>
	      <li>Vous pouvez prendre le fond "stars"</li>
	      <li>Le fond se rajoute dans la liste des arrière-plans, à droite de la
		zone d'affichage.</li>
	      <li>Supprimez le premier arrière-plan tout blanc (backdrop1) en cliquant sur la croix en haut à droite </li>
	      <li>Au milieu de la zone d'affichage et en bas, vous voyez une image de chat
		: c'est un personnage dont on peut coder le comportement. En ce qui nous concerne
		nous voulons un vaisseau spatial plutôt qu'un chat.</li>
	      <li>Dans le répertoire <kbd>TP_Asteroides<kbd>, créez un répertoire <kbd>Images_Asteroides</kbd>.</li>
	      <li>Téléchargez l'image suivante et enregistrez-la dans le répertoire <kbd>Images_Asteroides</kbd> que
		  vous venez de créer :  <img src="images/vaisseau.png"></img>
	      <li>Cliquez sur le chat puis ouvrez son menu <kbd>Costume</kbd></li>
	      <li>Dans ce menu, cliquez sur le bouton <img src="images/load.jpg"></img> pour ajouter un nouveau costume, à partir d'un fichier stocké sur votre ordinateur</li>
	      <img class="img-responsive center-block" src="./images/load_costume.jpg"/>
	      <li>Sélectionnez l'image que vous venez d'enregistrer</li>
	      <li> Supprimez les costumes de chat, en cliquant sur la croix en haut à droite </li>
	      
	      <img class="img-responsive center-block" src="./images/delete_costume.jpg"/>
	      
	    </ul>

	      <p>
	      Un vaisseau apparaît, à peu près au milieu de l'écran.
	      Commençons par créer un programme qui le positionne correctement et
	      diminue un peu sa taille.
	      </p>
	      <ul>
		<li>Quittez le menu <kbd>Costumes</kbd> et sélectionnez le menu <kbd>Scripts</kbd>
		<li>Sélectionnez la catégorie de scripts <kbd>Evènements</kdb></li>
		<li>Sélectionnez le bloc<img src="images/start.jpg"></img>. Ce bloc indique que le
		  code doit être exécuté quand l'utilisateur clique sur le drapeau vert</li>
		<li>Sélectionnez la catégorie de scripts <kbd>Apparence</kdb></li>
		<li>Sélectionnez le bloc <img src="images/size.jpg"></img>, qui précise
		  la taille du vaisseau. Pour le moment cette taille correspond à 100% de
		  la taille initiale. Réduisez-la à 80%.</li>
		<li>Cliquez sur le drapeau vert pour vérifier que la taille du vaisseau diminue bien</li>
	      </ul>
	  </div>
	</div>

	<div class="cv_part_border text-justify">
	  <div class="cv_part">
	    <h2>Exercice 1</h2>
	    
	    <p> Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>Mouvement</kbd>. Plusieurs
	      blocs apparaissent, qui permettent de faire avancer le vaisseau ou de changer sa direction
	    en le tournant.
	    Nous allons les utiliser pour faire bouger le vaisseau. Pensez à consulter
	    la colonne de droite, pour voir lesquels nous vous recommandons.
	    </p>
	    <ul>
	      <li>Positionnez le vaisseau au centre de l'écran, c'est-à-dire au point
	      de coordonnées (0,0)</li>
	      <li>Orientez le vaisseau vers la droite</li>
	      <li>Faites-le avancer de 100 pixels</li>
	      <li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
		dans un fichier nommé <kbd>"asteroides_TP1_exo1"</kbd>  et appelez votre enseignant pour évaluez votre travail.</li>
	    </ul>
	    <p> Vous allez sans doute remarquer qu'il n'est pas évident de voir le
	    déplacement du vaisseau. Nous allons utiliser le pinceau pour tracer le déplacement
	    du vaisseau, histoire de s'assurer que tout se passe bien.
	    </p>
	    <p>
	    Pour le jeu final, nous enlèverons ces tracés qui ne sont pas jolis. Cette
	    étape intermédiaire qui vise à chercher les erreurs dans un programme est primordiale
	    (vous n'avez pas envie de prendre l'avion en espérant que les informaticiens n'aient
	    pas commis d'erreurs...) et s'appelle le <code>debogage</code>.
	    Un bon informaticien n'est pas quelqu'un qui ne commet pas d'erreur, c'est
	    quelqu'un qui sait les trouver avant que le client ne teste son programme :-).
	    </p>
	    <ul>
	      <li>Allez dans la catégorie de scripts <kbd>Stylo</kbd></li>

	      <li>Avant que le vaisseau ne commence à avancer, donnez-lui une taille de 10 </li>
	      <li>Avant que le vaisseau ne commence à avancer, donnez-lui  une couleur de 0 (rouge)</li>
	      <li>Avant que le vaisseau ne commence à avancer, mettez le stylo en position d'écriture </li>
	      <li>Testez votre programme</li>
	      <li>Tournez votre vaisseau vers le haut et testez</li>
	      <li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
		dans un fichier nommé <kbd>"asteroides_TP1_exo1"</kbd>.</li>
	    </ul>
	    <p>
	    Si vous n'avez pas effacé votre précédent tracé, vous le voyez qui reste
	    à l'écran et perturbe le débogage. Pensez à effacer l'écran, pour y voir plus clair,
	    par exemple juste avant de positionner le vaisseau.
	    </p>
	    <ul>
	      <li>Ecrivez le programme permettant au vaisseau de tracer un L.</li>
	      <li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
		dans un fichier nommé <kbd>asteroides_TP1_L"</kbd>  et appelez votre enseignant pour évaluez votre travail.</li>
	      <li>Ecrivez le programme permettant au vaisseau de tracer un carré.</li>
	      <li class="text-danger"> Sauvegardez votre travail dans le répertoire <kbd>TP_Asteroides</kbd>,
		dans un fichier nommé <kbd>asteroides_TP1_carre</kbd>. </li>
	    </ul>
	  </div>
	</div>
      </div>
      
      
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
              lorsque l'utilisateur clique sur le drapeau vet</li>
          </ul>
        </div>

        <div class="well">
          <h4>Menu mouvement </h4>
          <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>mouvement</kbd>.</p>
          <img src="./images/motion_menu.jpg" ></img>
          <br></br>
          <ul>
            <li><img src="images/move_to.jpg"></img> : postionne le vaisseau</li>
            <li><img src="images/move.jpg"></img> : avance le vaisseau</li>
            <li><img src="images/set_dir.jpg"></img> : positionne le vaisseau dans
            une direction spécifique(droite, gauche, haut, bas)</li>
            <li><img src="images/turn_clock.jpg"></img> : tourne le vaisseau dans le sens
            des aiguilles d'une montre</li>
            <li><img src="images/turn_unclock.jpg"></img> : tourne le vaisseau dans le sens
            inverse des aiguilles d'une montre</li>

          </ul>
        </div>



        <div class="well">
          <h4>Menu stylo </h4>
          <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>stylo</kbd>.</p>
          <img src="./images/pen_menu.jpg" ></img>
          <br></br>
          <ul>
            <li><img src="images/pen_clean.jpg"></img> : efface tout ce qui a été dessiné avec le stylo</li>
            <li><img src="images/pen_up.jpg"></img> : lève le stylo pour qu'il n'écrive pas sur la zone d'affichage</li>
            <li><img src="images/pen_write.jpg"></img> : le stylo écrit sur la zone d'affichage</li>
            <li><img src="images/pen_size.jpg"></img> : spécifie la taille du stylo</li>
            <li><img src="images/pen_color.jpg"></img> : spécifie la couleur du stylo</li>
          </ul>
        </div>

        <div class="well">

          <h4>Menu apparence</h4>

          <p>Dans l'onglet <kbd>Scripts</kbd>, sélectionnez la catégorie <kbd>apparence</kbd>.</p>
          <img src="./images/apperance_menu.jpg" ></img>
          <br></br>
          <ul>
            <li><img src="images/size.jpg"></img> : modifie la taille d'un objet</li>
          </ul>
        </div>

      </div>
    </div><!--End row -->
    <div class="text-center ">
      <ul class="pagination">
	<li class="active"><a href="#">TP1</a></li>
	<li><a href="./scratch_tp2.php">TP2</a></li>
	<li><a href="./scratch_tp3.php">TP3</a></li>
      </ul>
    </div> <!-- End pagination -->
   </div><!-- End content -->
   
         
  <?php include('../footerLevel2.html'); ?>
  </div>
 
  
</body>

</html>

