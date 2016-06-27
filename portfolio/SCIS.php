<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href=../css/bootstrap.css rel="stylesheet">
  
  
  <link href=../css/main_css_sheet.css rel="stylesheet">
  <link href=../css/portfolio_css_sheet.css rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/common.js"> </script>



     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  <script src="../css/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
  <script src="../css/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/l3_plugins_curtain.js"> </script>
</head>
<body>

<?php include('../headerPortefolio.html'); ?>

   <div class="class=container-fluid content">  
      <h1 class="text-center"> Filtre Gimp pour l'extraction d'éléments dans une image</h1>
      <br></br>
      <div class="cv_part">
	  <p>	  
	    Permettre de sélectionner simplement un élément précis, afin de lui appliquer un traitement spécifique, consitue un enjeu de longue date dans les logiciels de manipulation d'images. Les ciseaux intelligents, outil apparu ces dernières années sont l'une des innovations les plus importantes en la matière : l'utilisateur indique quelques points à à partir desquels le programme infère les contours de l'élément à sélectionner
	  </p>
	  <div class="text-center">
	  <img src="images/cis_int.jpg" class="img-responsive  center-block"></img>
	  <p class="small">Sélection d'un visage, grâce aux ciseaux intelligents du logiciel Gimp</p>
	  </div>
	  <p>
	    Bien qu'extrêmement pratique, cet outil peut encore bénéficier de nombreuses améliorations. En premier lieu, la désignation des points de contour se révèle souvent fastidieuse : que ces derniers ne soient pas assez nombreux ou bien que leur positionnement ne soit pas assez précis et le programme échoue à proposer un résultat pertinent. Par ailleurs il s'avère impossible d'extraire en un seul coup de ciseau plusieurs éléments similaires mais situés à différents endroits de la photographie. 
	  </p>
	  
	  <p>
	    Le greffon SCIS, conçu pour le logiciel <a href="https://www.gimp.org/" target="_blank">Gimp</a>, résout ces différents problèmes. A partir de quelques coups de pinceaux donnés par un utilisateur, il découpe l'image en plusieurs zones, aisémment sélectionnables. 
	  </p>
      </div>
      <div class="cv_part_border">
	<div class="cv_part">
	
	  <h2>Installation : </h2>
	    <h3>Linux</h3>
	      <ul>
		<li>Installez les paquets <kbd>gimp</kbd> et <kbd>libgimp2.0-dev</kbd>
		<li>Téléchargez le <a href="https://github.com/BerengereMathieu/SCIS" target="_blank"> code source de SCIS</a></li>
		<li>Utilisez l'outil <strong>Gimptool</strong> pour compiler et installer SCIS :
		  <kbd>CC=gcc CFLAGS="-v -ansi" LIBS=-lm gimptool-2.0 --install SCIS.c</kbd></li>
		</ul>
	    <h3>Apple Mac OS X</h3>
		<ul>
		  <li>Afin de disposer de l'outil <strong>Gimptool</strong> qui gère l'ajout de nouveaux greffons, vous devez installer Gimp au moyen d'un gestionnaire de paquets, tel que <strong>MacPort</strong>.</li>
		<li>Téléchargez le <a href="https://github.com/BerengereMathieu/SCIS" target="_blank"> code source de SCIS</a></li>
		<li>Utilisez l'outil <strong>Gimptool</strong> pour compiler SCIS :
		  <kbd>CC=gcc CFLAGS="-v -ansi" LIBS=-lm gimptool-2.0 --build SCIS.c</kbd></li>
		 <li>Déplacez le greffon dans le repertoir <strong>plug-in</strong> de Gimp(généralement <strong>/opt/local/lib/gimp/2.0/plug-in</strong>). </li>
		  </ul>
		  <p>Si vous ne trouvez pas le répertoire plugin de Gimp, vous pouvez tenter de localiser le fichier <strong>file-jpeg.exe</strong>, qui devrait s'y trouver. 
		  </p>
	    <h3>Windows</h3>
		  <ul>
		    <li>Récupérez <a href="./scis_win32.exe" target="_blank">l'executable pour SCIS</a>.</li>
		    <li>Copiez le dans le répertoire plug-in de Gimp (généralement <strong>C:\Program Files\GIMP 2\lib\gimp\2.0\plug-ins</strong>) </li>
		    <li>Lancez Gimp : dans le menu <strong>filtre</strong>, vous devriez avoir un sous-menu <strong>Segmentation</strong> dans lequel se trouve <strong>SCIS</strong>.
		   </ul>
		  <p>Si vous ne trouvez pas le répertoire plugin de Gimp, vous pouvez tenter de localiser le fichier <strong>file-jpeg.exe</strong>, qui devrait s'y trouver. 
		  </p>
	</div>
      </div>
      <div class="cv_part_border">
	<div class="cv_part">
	<h2>Utilisation</h2>
	 <ul>
	    <li>Ouvrez l'image sur laquelle vous souhaitez travailler.</li>
	    <li>Créez un nouveau claque, transparent.</li>
	    <li>Configurez l'outil <strong>crayon</strong> pour qu'il trace des traits de couleur uniforme.</li>
	    <li>Indiquez les différents éléments que vous souhaitez extraire, en traçant sur le second calque des traits de couleurs : 
	      <ul>
		<li>utilisez une couleur par catégorie : par exemple bleu pour le ciel, vert pour les arbres, orange pour les batiments etc.</li>
		<li>répartissez vos traits de manière uniforme sur l'image : par exemple, si vous ne donnez aucune indication pour le quart supérieur gauche de la photographie, le résultat obtenu pour cette partie de l'image sera de piètre qualité.</li>
		<li>N'utilisez pas de noir</li>
	      </ul>
	      </li>
	      <li>Lancez SCIS : <kbd>Filtre -> Segmentation -> SCIS</kbd>.</li>
	      <li>Le résultat s'affiche sous la forme d'un troisième calque où les différentes zones trouvées corespondent à des aplats de couleur uniforme.</li>	
	  </ul>
	  <h3>Exemple de configuration du crayon</h3>
	  <div class="row">
	    <div class="col-sm-6">
	      <p><strong>Mode : </strong>Normal</p>
	      <p><strong>Opacité : </strong>100%</p>
	      <p><strong>Brosse : </strong>2. Hardness 100</p>
	      <p><strong>Dynamique de la brosse : </strong>dynamics off</p>
	    </div>
	    <div class="col-sm-6">
	      <img src="images/scis_conf_pinceau.jpg" class="img-responsive" width="200px" >  </img>
	    </div>
	  </div>
	  
	  <h3>Démonstration</h3>
	  <div class="row">
	    <div class="col-sm-4">	
		  <img src="images/use_scis_01.jpg" class="img-responsive" ></img>
		  <p>Image original, disponible <a href="https://commons.wikimedia.org/wiki/File:FlowerHmong_Vietnam_%28pixinn.net%29.jpg" target="_blank">ici</a></p>
	    </div>
	    <div class="col-sm-4">
		  <img src="images/use_scis_02.jpg" class="img-responsive" ></img>
		  <p>Indications pour extraire les différentes parties de l'image</p>
	    </div>
	    <div class="col-sm-4">
		  <img src="images/use_scis_03.jpg" class="img-responsive" ></img>
		  <p>Zones trouvées par SCIS</p>
	    </div>
	  </div>
	

	</div>
      </div>
      
   </div> <!-- end content-->
     
   

<?php include('../footerLevel2.html'); ?>
  </div>
  
  
   
   
</body>

</html>

