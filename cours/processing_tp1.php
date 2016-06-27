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
    <h2 class="text-center">TP2 : Hexagones</h2>    
    <br></br>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Lancement</h2>
	<p>Lancez Processing et créez un nouveau projet. Vous pouvez l'enregistrer dans votre dossier <strong>Documents</strong>, par exemple sous le nom <strong>Hexagones</strong>. Vous remarquez que Processing crée un nouveau dossier dans document, qu'il appelle <strong>Hexagones</strong>, avec dedans un unique fichier <strong>Hexagones.pde</strong>.
	
	<p>Dans la suite de ces tps nous allons systématiquement utiliser deux fonctions de base de processing : la fonction <strong>setup</strong> et la fonction <strong>draw</strong>. Le code contenu dans la première est exécuté une seule fois, au lancement du programme. Le code contenu dans la seconde est exécuté en boucle, plusieurs fois par seconde, jusqu'à l'arrêt du programme. 
	
	</p>Voici le code pour déclarer ces deux fonctions et afficher une fenêtre grise, de la taille de l'écran.</p> 
	
	<pre>
	void setup(){
	size(displayWidth,displayHeight);
	background(20,20,20);
	}

	void draw(){
	}
	</pre>

	<p>Pour rappel : </p>
	<ul>
	<li>La fonction <strong>size</strong> définit la taille de votre fenêtre.</li>
	<li>La variable <strong>displayWidth</strong> correspond à la largeur de votre écran en nombre de pixels.</li>
	<li>La variable <strong>displayHeight</strong> correspond à la hauteur de votre écran en nombre de pixels.</li>
	<li>La fonction <strong>background</strong> peint le fond dans une couleur particulière.</li>
	</ul>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Premier hexagone</h2>

	<p>Tout ça, c'est bien gentil, mais le sujet de ce TP reste quand même les hexagones,
	et il est temps de poser la question qui fâche : comment trace-t-on un hexagone ?
	Alors d'abord, pour ceux qui ne s'en souviendraient pas, voici l'animal :</p>	
	<img class="img-responsive center-block" src="./images/hexagone.jpg" title="Un hexagone" alt="Hexagone" />

	<p>Si vous regardez un peu les <a href="https://fr.wikipedia.org/wiki/Hexagone" target="_blanc" title="propriétés de cette figure">propriétés de cette figure</a>,
	vous allez vous rendre compte de deux choses qui vont nous permettre de le dessiner
	très simplement :</p>

	<ul>
	<li>l'hexagone s'inscrit dans un cercle ;</li>
	<li>l'angle entre deux sommets consécutifs est toujours égale à 60°</li>
	</ul>


	<p>Et comme un dessin vaut mieux que de longs discours :
	<img class="img-responsive center-block" src="./images/hexagone2.jpg" title="Un hexagone" alt="Hexagone" /></p>

	<p>Pour tracer notre hexagone, nous allons simplement nous déplacer sur le cercle
	et ses arrêtes au fur et à mesure :</p>

	<img class="img-responsive center-block" src="./images/demoHexagone.gif" title="Un hexagone" alt="Hexagone" />
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 1</h2>

	<ul>
	  <li>Déclarez une variable <strong>nbCotes</strong> de type int ;</li>
	  <li>Initialisez-là à 6;</li>
	  <li>Avant la fonction <strong>setup</strong>, déclarez une variable <strong>theta</strong> de type float;</li>
	  <li>Dans la fonction <strong>setup</strong>, initialisez-là à 0 ;</li>
	  <li>Avant la fonction <strong>setup</strong>, déclarez une variable <strong>R</strong> de type float ;</li>
	  <li>Dans la fonction <strong>setup</strong>, initialisez-là à 50 ;</li>
	  <li>Écrivez une boucle qui s'exécute autant de fois que la valeur stockée dans <strong>nbCotes</strong> ;</li>
	</ul>


	<p>  Nous allons maintenant donner les coordonnées de deux sommets consécutifs et tracer l'arrête qui les relie. Des années de recherches laborieuses ont permis  à l'humanité de découvrir que les coordonnées d'un point situé sur un cercle de rayon <em>R</em> et de centre (centreX,centreY) selon un angle <em>theta</em> peuvent se calculer de la manière suivante :</p>

	<ul>
	<li>x = centreX + cos(theta)*R;</li>
	<li>y = centreY + sin(theta)*R;</li>
	</ul>


	<p>  Pour notre problème nous avons déjà <strong>R</strong> et <strong>theta</strong>, il ne nous manque que le
	centre du cercle. Je vous propose de le placer au centre de notre écran. A l'intérieur de votre boucle, vous allez donc pouvoir ajouter les deux lignes suivantes :
	<pre>
	float x0=(displayWidth/2) + cos(theta)<em>R;
	float y0=(displayWidth/2) + sin(theta)</em>R;
	</pre></p>

	<p>  Voilà, pour notre premier sommet. Pour tracer une arrête, il nous faut un deuxième sommet, décalé par rapport au premier d'un angle de 60 degrés. Dans un monde parfait nous pourrions simplement augmenter la valeur de notre variable theta de 60. Sauf que les fonctions cosinus et sinus ne fonctionnent pas avec des degrés mais avec des radians.
	Pour convertir un degré en radian, il vous faut le multiplier par <strong>2*PI/360</strong>. Donc, notre
	angle doit être mis à jour de la manière suivante : 
	<pre>
	theta = theta + 60<em>(2</em>PI/360);
	</pre></p>

	<p>  Nous pouvons calculer le deuxième sommet, de la même manière que le précédent et, enfin, tracer une ligne blanche entre les deux sommets. Pour la couleur blanche utilisez la fonction <a href="https://processing.org/reference/stroke_.html" target="_blanck" title="stroke">stroke</a>
	et pour tracer la ligne la fonction <a href="https://processing.org/reference/line_.html"  target="_blanck" title="line">line</a>.</p>

	<ul>
	<li>Après la boucle, remettez la variable <em>R</em> à 0.</li>
	</ul>


	<p>  Si vous avez tout fait correctement, votre programme devrait tracer un hexagone.</p>
      </div>
    </div>

    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 2 : pleins d'hexagones ! </h2>

	<p>  Pour le moment chaque fois que la fonction <strong>draw</strong> s'exécute, le même hexagone est
	tracé. Ce que nous allons faire, c'est simplement changer le rayon, en rajoutant la
	ligne suivante à la fin de la fonction <strong>draw</strong> :
	<pre>
	R=R+10;
	</pre>
	Rien de bien compliqué : on se contente augmenter le rayon de 10, chaque fois
	qu'on a fini de tracer un hexagone.</p>
     
	<ul>
	<li>Testez votre programme ;</li>
	<li>Faites varier le rayon <strong>R</strong> en lui ajoutant un nombre aléatoire entre 10 et 30 ;</li>
	<li>Faites varier l'angle theta, en lui donnant une valeur entre <strong>(2*PI/360)</strong> et <strong>50<em>(2</em>PI/360)</strong></li>
	</ul>
	
	<p>Le résultat obtenu n'est pas très esthétique et surtout, nous avons vite fait d'atteindre la taille maximale pour un hexagone. Nous allons faire juste deux petites modifications qui vont considérablement améliorer le dessin produit par notre programme.</p>

	<ul>
	<li>Au début de la fonction <strong>draw</strong>, ajoutez les deux lignes suivantes, qui vont
	vous permettre de faire varier l'épaisseur du trait pour l'hexagone tracé
	<pre>
	float epaisseur=random(2,6);
	strokeWeight(epaisseur);
	</pre></li>
	<li>Nous allons effectuer un test sur le rayon de l'hexagone : quand celui-ci aura
	atteint sa taille maximale (c'est-à-dire la moitié de la diagonale de l'écran), nous
	réinitialiserons le rayon <em>R</em> avec une valeur comprise entre <strong>5</strong> et <strong>5</strong></li>
	</ul>

	<p>Au début de la fonction <strong>draw</strong>, ajoutez la ligne suivante qui calcule la distance maximale pour le
	rayon :</p>

	<pre>
	float maxR=sqrt(displayWidth*displayWidth + displayHeight*displayHeight)/2;
	</pre>


	<ul>
	<li>Ecrivez le test (<strong>if</strong>*) qui :

	<ul>
	<li>si le <strong>R</strong> est inférieur à <strong>maxR</strong> lui ajouter une
	valeur aléatoire comprise entre <strong>10</strong> et <strong>30</strong></li>
	</ul>
	</li>
	<li>sinon donne à <strong>R</strong> une valeur aléatoire comprise entre <strong>5</strong> et <strong>50</strong></li>
	<li>Dans la fonction <strong>setup</strong> diminuez le frameRate : <code>frameRate(10)</code></li>
	<li>Ne tracez pas votre ligne dans un blanc pur, mais dans un blanc transparent :  <code>stroke(255,255,255,50)</code></li>
	</ul>
      </div>
    </div>

    <div class="cv_part_border">
      <div class="cv_part">

	<h2>Exercice 3 : de la couleur</h2>

	<p>Jusqu'à présent tous nos hexagones sont tracés de la même couleur. Nous allons faire
	en sorte que chaque fois que notre programme atteint le rayon maximal (<strong>maxR</strong>)
	il change la couleur des hexagones. Nous allons seulement utiliser deux couleurs :
	<ul>
	  <li> le blanc transparent :   <code>stroke(255,255,255,50)</code></li>
	  <li> un jaune doré :  <code>stroke(193, 158, 18,50);</code></li>
	</ul>
	</p>
	
	<ul>
	<li>En dessous de la variable <strong>R</strong>, déclarez une variable <strong>couleur</strong> de type <strong>int</strong> ;</li>
	<li>Dans la fonction <strong>setup</strong> initialisez cette variable à <strong>0</strong> ;</li>
	<li>Remplacez la ligne <code>stroke(255,255,255,50)</code> par le test suivant :

	<ul>
	<li>si couleur est égal à 0, tracez en blanc : <code>stroke(255,255,255,50)</code></li>
	<li>sinon, tracez en jaune :   <code>stroke(193, 158, 18,50);</code></li>
	</ul>
	</li>
	<li>Où faut-il changer la valeur de couleur pour changer de couleur lorsque le rayon
	maximal <strong>maxR</strong> est atteint ?</li>
	<li>Pourquoi la mise à jour <code>couleur = couleur + 1;</code> ne permet-elle pas
	d'alterner les deux couleurs ?</li>
	<li>Grâce à la fonction <strong>modulo</strong>, proposez une mise à jour de la couleur, qui permette
	une alternance des couleurs ;</li>
	</ul>


	<p> 
	Nous avons obtenu un processus intéressant, mais très vite l'écran est saturé de couleur.
	La modification qui suit va nous permettre d'avoir un programme qui s'autorégule, en traçant
	régulièrement des hexagones opaques de la couleur du fond : <code>stroke(20,20,20)</code></p>

	<p> L'astuce est la suivante :</p>

	<ul>
	<li>quand couleur == 0 : du blanc ;</li>
	<li>quand couleur == 1 : la couleur du fond ;</li>
	<li>quand couleur == 2 : du jaune ;</li>
	<li>quand couleur == 3 : la couleur du fond.</li>
	</ul>


	<p> Pour obtenir ce comportement :</p>

	<ul>
	<li>Modifiez la mise à jour de la couleur ;</li>
	<li>Modifiez le test sur la couleur ;</li>
	</ul>


      </div>
    </div>
    
    <div class="text-center ">
      <ul class="pagination">      
	<li><a href="./processing_tp0.php">TP1</a></li>
	<li class="active"><a href="./processing_tp1.php">TP2</a></li>
	<li><a href="./processing_tp2.php">TP3</a></li>
      </ul>
    </div> <!-- End pagination -->
   </div> <!-- end content-->
 

<?php include('../footerLevel2.html'); ?>
  </div>
  
   
  
</body>

</html>

