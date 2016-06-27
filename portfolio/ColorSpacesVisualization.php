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
  
  <style>
  .centerCaroussel {
    margin: auto;
    width: 512;
    padding: 10px;
}
  </style>
</head>
<body>


<?php include('../headerPortefolio.html'); ?>

   <div class="class=container-fluid content">  
      <h1 class="text-center"> Exploration des espaces colorimétriques : VASCO</h1>
      <br></br>
      <div class="cv_part">
	  <p>	  
	 En marge des réprésentations standards que sont les modèles <a href="https://fr.wikipedia.org/wiki/Rouge_vert_bleu">RGB</a> et <a href="https://fr.wikipedia.org/wiki/Teinte_Saturation_Valeur">HSV</a>, il existe une miriade d'autres espaces colorimétriques, spécifiques à l'analyse d'images. Certains furent conçus pour se rapprocher de la perception humaine, d'autres pour satisfaire des propriétés statistiques particulières. Ces représentations restent souvent inconnues du grand public, n'étant pas proposées par les outils de manipulation d'images ou de sélection de couleurs.
	  </p>
	  <p>
Durant mon travail de recherche, j'ai mené des tests sur une dizaine d'espace colorimétriques : XYZ, RGB, HSI, LUV, LAB, AC1C2, YC1C2, A1A2A3, H1H2H3. Afin de vérifier et de comprendre les résultats obtenus, j'ai réfléchi à des manières de les visualiser. VASCO consitue une tentative de réprésentation en trois dimensions, chaque dimension géométrique correspondant à une composante colorimétrique. Par exemple pour une couleur exprimé dans l'espace HSI, sa teinte (H) correspond à sa position sur l'axe x, la saturation (S) à celle sur l'axe y et son intensité lumineuse (I) à a profondeur, z. En plus d'afficher l'intégralité d'un espace colorimétrique, VASCO (à l'envers et en anglais : COlor Space Atypical Visualization) permet de charger une image et d'observer comment ses couleurs se distribuent dans cet espace.</p>
      <p>
      Il m'a semblé intéressant de le mettre à disposition des curieux, capable de passer quelques minutes à explorer un monde de couleurs.
      </p>
      </div>      
      <div class="container-fluid content cv_part ">
	<br>
	<div id="myCarousel" class="carousel slide " data-ride="carousel">
	  <!-- Indicators -->
	  <ol  class="carousel-indicators ">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner " role="listbox">
	    <div class="item active">
	      <img class="center-block" src="images/ac1c2.jpg" alt="AC1C2">
	      <div class="carousel-caption">
		<p class="my_caption">Espace colorimétrique AC1C2 : vue globale</p>
	      </div>
	    </div>
	    <div class="item ">
	      <img  class="center-block" src="images/xyz.jpg" alt="XYZ">
	      <div class="carousel-caption">
		<p class="my_caption">Espace colorimétrique XYZ : zoom</p>
	      </div>
	    </div>    
	    <div class="item ">
	      <img class="center-block" src="images/Marc-blue-black_fox_luv.jpg" alt="LUV">
	      <div class="carousel-caption ">
		<p class="my_caption">Le tableau "Blue Black Fox", de Franz Mark, dans l'espace colorimétrique LUV</p>
	      </div>
	    </div>
	  </div>
	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	
      </div>

      
      <div class="cv_part_border">
	<div class="cv_part">
	
	  <h2>Installation : </h2>
	  <p>VASCO a été développé à l'aide d'OpenFramework. Il a été testé sur Unbuntu 14.04 LTS, Windows 7 et OSX Yosemite</p>
	  <ul>
	    <li><a href="http://openframeworks.cc/download/">Installez OpenFramework</a> </li>
	    <li><a href="https://github.com/BerengereMathieu/VASCO">Téléchargez le code source de VASCO</a></li>
	    <li>Si vous utilisez QT Creator</li>
	      <ul>
	      <li>Copiez le code dans le répertoire Apps/MyApps</li>
	      <li>Ouvrez VASCO depuis QT Creator</li>
	      <li>Compilez le code</li>
	      </ul>
	    <li>Sinon : </li>
	    <ul>
	      <li>Créez un nouveau projet avec votre IDE</li>
	      <li>Intégrez le code de VASCO</li>
	      <li>Compilez le code</li>
	    </ul>
	  </ul>
	  
	</div>
      </div>
      <div class="cv_part_border">
	<div class="cv_part">
	<h2>Utilisation</h2>
	<ul>
	  <li> <kbd>h</kbd> ou <kbd>H</kbd> : afficher / cacher l'aide</li>
	  <li> <kbd>a</kbd> ou <kbd>A</kbd> : afficher / acacher les axes</li>
	  <li> <kbd>i</kbd> ou <kbd>I</kbd> : charger une image et afficher ses couleurs</li>
	  <li> <kbd>RETURN</kbd> : afficher l'ensemble de l'espace colorimétrique (mode par défaut) </li>
	  <li> <kbd>F1</kbd> : afficher l'espace colorimétrique XYZ (mode par défaut)</li>
	  <li> <kbd>F2</kbd> : afficher l'espace colorimétrique LUV</li>
	  <li> <kbd>F3</kbd> : afficher l'espace colorimétrique LAB</li>
	  <li> <kbd>F4</kbd> : afficher l'espace colorimétrique AC1C2</li>
	  <li> <kbd>F5</kbd> : afficher l'espace colorimétrique YC1C2</li>
	  <li> <kbd>F6</kbd> : afficher l'espace colorimétrique HSI</li>
	  <li> <kbd>F7</kbd> : afficher l'espace colorimétrique A1A2A3</li>
	  <li> <kbd>F8</kbd> : afficher l'espace colorimétrique H1H2H3</li>
	</ul>

	</div>
      </div>
      
      <div class="cv_part_border">
	<div class="cv_part">
	<h2>Lecture</h2>
	<p>
        La chapitre 4 de la thèse de Sylvie Chambon, <a href="http://thesesups.ups-tlse.fr/5/1/Chambon_Sylvie.pdf"><em>Mise en correspondance stéréoscopique d'images couleur en présence d'occultations,</em></a> constitue une excellente introduction sur les différents espaces colorimétriques. 
        </p>
      
	</div>
      </div>
    
   </div> <!-- end content-->
     
   

<?php include('../footerLevel2.html'); ?>
  </div>
   
   
   
</body>

</html>

