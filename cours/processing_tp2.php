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
  

    <h1 class="text-center">Introduction à la programmation avec Processing</h1>
    <h2 class="text-center">TP3 : Manipulation d'images</h2>    
    <br></br>
      
    <div class="cv_part_border">
      <div class="cv_part">
  
	<h2>Objectif</h2>

	<p>Dans ce TP vous allez apprendre à afficher une image et chahuter ses pixels.</p>
      </div>
    </div>
    
    
      
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Afficher une image</h2>

	<p>Tout d'abord il va nous falloir une image. Comme cette première étape est <strong>essentielle</strong>
	au bon déroulement du TP, en voici une que j'aime bien:
	<img   class="img-responsive center-block" width="256px" src="./images/im.jpg" title="Photographie réalisée par Erik_Holmén" alt="Photographie réalisée par Erik_Holmén" />
	Je vous conseille de l'utiliser, comme ça vous aurez les mêmes résultats que moi et
	ça sera plus facile pour comparer.</p>

	<p>Nous allons commencer comme pour n'importe quel projet avec Processing, avec le
	code suivant :</p>

	<pre>
	void setup(){
	  size(displayWidth,displayHeight);
	  background(255,255,255);
	}

	void draw(){
	}
	</pre>


	<p>Pour rappel la fonction <code>setup()</code> contient des instructions qui ne seront exécutées
	qu'une seule fois, au lancement de notre programme, tandis que la fonction <code>draw()</code>
	est appellée plusieurs fois par seconde, tout le temps que notre programme fonctionne.</p>

	<p>Enregistrez le projet (vous pouvez lui donner un nom très original comme <strong>tp2</strong>). Processing
	va créer un répertoire du même nom que votre projet dans lequel vous trouvez un fichier <strong>.pde</strong> qui
	contient votre code. Juste à côté de ce fichier, copiez votre image. Pour la suite de ce tp, je supposerai
	qu'elle porte le doux nom de <strong>img.jpg</strong>.</p>

	<p>Pour pouvoir l'utiliser, nous allons stocker notre image dans une variable, de type PImage, que nous appellerons
	<strong>monImage</strong>.
	Modifiez juste un tout petit peu le programme précédent :</p>

	<pre>  
	PImage monImage; // La modification importante est ici !!!

	void setup(){
	  size(displayWidth,displayHeight);
	  background(240);
	}

	void draw(){
	}
	</pre>


	<p>Et maintenant attention, les choses sérieuses commencent ! Nous allons nous placer
	à l'intérieur de la fonction <code>setup</code> et écrire les lignes de code suivantes :</p>

	<ul>
	<li><code>monImage = loadImage("im.jpg");</code> : pour stocker notre image, dans la variable monImage</li>
	<li><code>copy(monImage,0,0,monImage.width,monImage.height,0,0,monImage.width,monImage.height);</code> : pour dessiner l'image.
	Vous devriez obtenir l'affichage suivant :</li>
	</ul>


	<p><img  class="img-responsive center-block" src="./images/resultat_01.jpg" title="Resultat" alt="" /></p>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	 <h2>Exercice 1</h2>

	<p>La dernière ligne de code est un peu obscure : </p>

	<ul>
	<li>Allez voir sa <a href="http://py.processing.org/reference/copy.html">documentation</a></li>
	<li>Comment faire pour que le coin supérieur gauche de notre image se situe au pixel de coordonnée (50,10) ?</li>
	<li>Comment faire pour diminuer par 2 la taille de notre image (parce que c'est pas pour dire, mais là, elle déborde un peu...) ?</li>
	</ul>

      </div>
    </div>  
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Pixels </h2>

	<p>Vous le savez sans doute, mais une image est une grille rectangulaire. Chaque
	élément de la grille est appelé pixel et possède une couleur.
	Concrètement cela veut dire qu'une PImage est composée d'au moins trois choses  :</p>

	<ul>
	<li>sa largeur : <code>monImage.width</code></li>
	<li>sa haureur : <code>monImage.height</code></li>
	<li>des pixels : <code>monImage.pixels</code></li>
	</ul>


	<p>La largeur correspond au nombre de pixels qu'on peut compter de la droite vers
	la gauche. La hauteur correspond au nombre de pixels qu'on peut compter du haut
	vers le bas. Par exemple voici une image de largeur 14 pixels et de hauteur 7 pixels.
	<img  class="img-responsive center-block" src="./images/pixelsStory.png" title="Resultat" alt="" /></p>

	<p>Nous allons voir comment parcourir les pixels d'une image pour les lire ou les modifier.
	Enlevez cette ligne :</p>

	<p><code>copy(monImage,0,0,monImage.width,monImage.height,0,0,monImage.width,monImage.height);</code>
	D'abord on va diviser par 2 la taille de notre image :</p>

	<pre>
	monImage.resize(monImage.width/2,monImage.height/2);
	</pre>


	<p>Nous allons noter <strong>y</strong> le numéro de ligne du pixel et <strong>x</strong> son numéro de colonne.
	Dans notre PImage, les pixels sont tous entassés les uns à la suite des autres, d'abord
	les pixels de la première ligne, ensuite les pixels de la seconde ligne etc. De plus le premier pixel
	a le numéro 0, le deuxième le numéro 1 et ainsi de suite.  Un peu compliqué ? Heureusement, processing dispose d'une fonction <strong>get</strong> qui permet de récupérer facilement la couleur du pixel : </p>

	<pre>
	color c = monImage.get(x,y);
	int rouge = red(c);
	int vert = vert(c);
	int bleu = bleu(c);
	</pre>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">

	<h2>Exercice 2</h2>

	<p>Maintenant à vous de travailler</p>

	<ul>
	  <li>Écrivez la boucle permettant de parcourir toutes lignes de l'image</li>
	  <li>À l'intérieur de la boucle, lisez la couleur du premier pixel de la ligne</li>
	  <li>Utilisez ses valeurs de rouge, de vert et de bleu pour préciser la couleur
	  de contour et des formes à tracer avec les fonctions <code>stroke</code> et <code>fill</code></li>
	  <li>Tracez un rectangle qui commence au point de coordonnée (0,y), dont la largeur est de 500 et la hauteur de 1, avec la fonction
	  <a href="https://processing.org/reference/rect_.html" title="rect"></a></li>
	  <li>Vous devriez obtenir
	  quelque chose comme ça:<br/>
	  <img  class="img-responsive center-block" src="./images/resultat2.jpg" title="Resultat" alt="" /></li>
	</ul>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 3</h2>

	<p>La même chose, mais cette fois-ci en parcourant les colonnes !
	<ul>
	  <li>Tracez un rectangle qui commence au point de coordonnée (x,0), dont la largeur est de 1 et la hauteur de 500, avec la fonction
	<a href="https://processing.org/reference/rect_.html" title="rect"></a></li>
	</li> Vous devriez obtenir ceci :</li>
	<img  class="img-responsive center-block"  src="./images/resultat3.jpg" title="Resultat" alt="" /></p>
      </div>
    </div>
      
      
      	
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 4</h2>

	<p>On va voir si vous suivez : que fait ce bout de code ?</p>

	<pre>  
	monImage.resize(monImage.width/2,monImage.height/2);
	int y=0;
	int i=0;
	while( y < monImage.height ){
	  int x=0;
	  while( x < monImage.width ){
	    color c = monImage.get(x,y);
	    fill(c);
	    stroke(c);
	    rect(x,y,1,1);
	    x = x + 1;
	  }
	  y = y + 1;
	}
	</pre>
      </div>
    </div>
    
    	
    <div class="cv_part_border">
      <div class="cv_part">

	<h2>Exercice 5</h2>

	<ul>
	<li>Modifiez le code de l'exercice 4 pour n'afficher qu'un pixel sur 10 et tracer
	des rectangles de taille 10*10.</li>
	<li>Remplacez les rectangles par des cercles en utilisant la fonction <strong>ellipse</strong></li>
	</ul>
      </div>
    </div>
    
        <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 6</h2>

	<ul>
	<li>Testez le code suivant</li>
	</ul>


	<pre>
	PImage monImage;

	void setup() {
	  size(displayWidth, displayHeight);
	  background(255);
	  monImage = loadImage("im.jpg");


	  monImage.resize(monImage.width/4, monImage.height/4);

	  int yDessin = 0;
	  int y = 0;
	  int i = 0;
	  while ( y < monImage.height ) {
	    int x = 0;
	    int xDessin = 0;
	    while ( x < monImage.width ) {	     
	      color c = monImage.get(x,y);
	      fill(red(c),green(c),blue(c));
	      stroke(red(c),green(c),blue(c));
	      int r = int(random(1,7));
	      ellipse(xDessin, yDessin,r,r);
	      xDessin = xDessin + 7;
	      x = x + 1;
	    }
	    yDessin = yDessin + 7;
	    y = y + 1;
	  }
	}

	void draw() {
	}

	void keyPressed() {
	  save("resultat.png");
	}
	</pre>


	<ul>
	<li>Quelles sont les différences avec le programme de l'exercice 5 ? </li>
	</ul>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exerice 7 : de la couleur</h2>

	<p>Il ne vous aura pas échappé que notre image est un peu particulière : elle
	n'a pas de couleurs. Il s'agit d'une <strong>image en niveaux de gris</strong>,
	parce que chaque pixel de l'image est en fait une teinte de gris particulière. En fait,
	c'est parce que pour ce type d'image il n'y a pas vraiment de couleur, juste
	une intensité lumineuse allant du noir (0) au blanc (255). C'est exactement ce qui se
	passe avec les tous premiers appareils photographiques : ils ne captent que la lumière, toute
	l'image est construite à partie des contrastes entre les ombres et les zones éclairées.
	Et c'est précisément pour cette raison que j'aime beaucoup cette photographie : parce qu'on
	peut la découper facilement en trois types de zones :</p>

	<h6>des zones sombres, avec des pixels ayant un niveau de gris entre 0 et 77 :</h6>

	<p><img class="img-responsive center-block"  src="./images/zone1.jpg" title="Resultat" alt="" /></p>

	<h6>des zones médianes, avec des pixels ayant un niveau de gris entre 77 et 200 :</h6>

	<p><img class="img-responsive center-block"  src="./images/zone2.jpg" title="Resultat" alt="" /></p>

	<h6>des zones claires, avec des pixels ayant un niveau de gris entre 200 et 255 :</h6>

	<p><img class="img-responsive center-block"  src="./images/zone3.jpg" title="Resultat" alt="" /></p>

	<p>Nous allons modifier notre image pour afficher ces trois zones, dans trois couleurs différentes.</p>

	<ul>
	<li>Pour accéder au niveau de gris de l'image, rajoutez la ligne suivante :</li>
	</ul>


	<pre>
	color c = monImage.get(x,y);
	int gris = int(brightness(c));
	</pre>


	<ul>
	<li>Quel test faut-il effectuer pour savoir si le niveau de gris appartient à une zone claire ?</li>
	<li>Dans ce cas-là, tracez un cercle en noir (0, 0, 0 ).</li>
	<li>Quel test faut-il effectuer pour savoir si le niveau de gris appartient à une zone médiane ?</li>
	<li>Dans ce cas-là, tracez un cercle en mauve (101, 49, 124).</li>
	<li>Quel test faut-il effectuer pour savoir si le niveau de gris appartient à une zone sombre ?</li>
	<li>Dans ce cas-là, tracez un cercle en orange (224, 71, 0).</li>
	<li>Modifiez le calcul des coordonnées pour le dessin, de manière à ce que l'image soit centrée</li>
	
	</ul>
      </div>
    </div>

    	


    <div class="text-center ">
      <ul class="pagination">      
	<li><a href="./processing_tp0.php">TP1</a></li>
	<li><a href="./processing_tp1.php">TP2</a></li>
	<li  class="active"><a href="./processing_tp2.php">TP3</a></li>
      </ul>
    </div> <!-- End pagination -->
  </div> <!-- end content-->
  
                                                                    
 <?php include('../footerLevel2.html'); ?>
  </div>
  
  
</body>

</html>

