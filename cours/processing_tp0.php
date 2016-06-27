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
    <h2 class="text-center">TP1 : Découverte de
  <link href=../css/main_css_sheet.css rel="stylesheet"> processing</h2>    
    <br></br>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Lancement</h2>
	<p>Si vous ne l'avez pas déjà fait, <a href="https://processing.org/download/" target="_blank">téléchargez processing</a>. Vous devriez obtenir une archive qu'il vous faut décompresser. Pour démarrer processing, il suffit de lancer le programme <strong>processing</strong>, soit dans le terminal, soit en double cliquant dessus (c'est selon votre système d'exploitation). Normalement l'éditeur de processing devrait s'ouvrir : </p>
	
	<img class="img-responsive center-block" src="./images/processing_editor.jpg" title="Processing" alt="Processing" /></p>

	<p>
	  Si vous avez déjà utilisé un éditeur pour programmer ou même un logiciel de traitement de texte quelconque vous devriez être en terrain connu : la majeur partie de l'éditeur de processing, se compose d'une zone blanche où vous allez écrire votre programme. En haut, vous avez un ensemble de menus :
	  <ul>
	    <li><strong>Fichier</strong> :  pour toutes les actions sur votre projet, typiquement le sauvegarder ;</li>
	    <li><strong>Modifier</strong> : pour agir sur votre code, par exemple en commenter rapidement une portion ou l'indenter rapidement ;
	    <li><strong>Sketch</strong> : pour agir sur votre programme, par exemple le lancer ou l'arrêter</li>
	    <li><strong>Dépanner</strong> : pour traquer les erreurs dans votre programme </li>
	    <li><strong>Outils</strong> : regroupe un ensemble d'outils annexes mais souvent très utiles</li>
	    <li><strong>Aide</strong> : regroupe des ressources pour vous aider à démarrer avec processing : documentation, tutoriaux etc.</li>
	  </ul>
	 </p>
	 <p>
	 Enfin deux boutons très importants : le gros triangle qui vous permet de lancer un programme et le carré qui vous permet de l'arrêter. 
	 </p>
	<p>Créez un nouveau projet en le sauvegardant : <kbd>Fichier -> enregistrer</kbd>. Vous pouvez l'enregistrer dans votre dossier <strong>Documents</strong>, par exemple sous le nom <strong>tp1</strong>. Vous remarquez que Processing crée un nouveau dossier dans document, qu'il appelle <strong>tp1</strong>, avec dedans un unique fichier <strong>tp1.pde</strong>.
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 1 : premier programme</h2>
	
	<p>Dans la suite de ces tps nous allons systématiquement utiliser deux fonctions de base de processing : la fonction <strong>setup</strong> et la fonction <strong>draw</strong>. Le code contenu dans la première est exécuté une seule fois, au lancement du programme. Le code contenu dans la seconde est exécuté en boucle, plusieurs fois par seconde, jusqu'à l'arrêt du programme. </p>
	
	<p>
	  Commençons avec la fonction <strong>setup</strong>. Nous allons débuter par la création d'un programme très simple : une fenêtre gris foncé, de largeur 500 pixels et de hauteur 250 pixels. 
	</p>
	<pre>
	void setup(){
	size(500,250);
	background(20,20,20);
	}
	</pre>
	<p>Vous pouvez le tester en cliquant sur le triangle. Notre programme utilise deux fonctions disponibles dans le langage processing : 
	  <ul>
	    <li>la fonction <a href="https://processing.org/reference/size_.html" target="_blanc">size</a> qui définit la taille de votre fenêtre.</li>
	    <li>la fonction <a href="https://processing.org/reference/background_.html" target="_blanc">background</a> qui peint le fond dans une couleur particulière.</li>
	  </ul>
	  Nous indiquons à la fonction <strong>size</strong> la largeur puis la hauteur de notre fenêtre. Ensuite, nous donnons à la fonction <strong>background</strong> la couleur souhaitée, sous la forme de trois entiers : un pour la quantité de rouge, un pour la quantité de vert et un pour la quantité de bleu. Il existe de nombreuses manières de préciser la couleur (code hexadécimal, simple nuance de gris etc.). Pour le moment je m'en tiendrai à celle-ci. Pour connaître les quantités de rouge, de vert et de bleu pour une couleur particulière, je vous recommande d'utiliser le sélecteur de couleur de processing : <kbd>Outils -> Sélecteur de couleurs</kbd>.
	</p>
	<ul>
	  <li>À l'aide de la documentation de la fonction  <a href="https://processing.org/reference/size_.html" target="_blanc">size</a> trouvez deux manières pour obtenir une fenêtre de la taille de votre écran.</li>
	  <li>Quelle est la manière recommandée par Processing ? </li>
	  <li>Changez la couleur de fond de votre application.</li>
	</ul>
      </div>
    </div>
        
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Quelques fonctions</h2>
	<p>
	L'objectif de ce TP est de créer un programme générant des carrés de tailles et de couleurs aléatoires. Processing offre un grand nombre de fonctions permettant de créer rapidement des affichages à partir de formes géométriques. Nous procèderons toujours de la même façon : 
	<ul>
	<li>nous commencerons par préciser la couleur de la forme, que ce soit pour son contour ou son intérieur ; </li>
	<li>nous décrirons la forme à dessiner, notamment sa taille et sa position. </li>
	</ul>
	</p>
	
	<p>Nous allons avoir besoin des fonctions suivantes: 
	  <ul>
	    <li><a href="https://processing.org/reference/stroke_.html" target="_blanc">stroke</a></li>
	    <li><a href="https://processing.org/reference/noStroke_.html" target="_blanc">noStroke</a></li>
	    <li><a href="https://processing.org/reference/fill_.html" target="_blanc">fill</a></li>
	    <li><a href="https://processing.org/reference/noFill_.html" target="_blanc">noFill</a></li>	 
	    <li><a href="https://processing.org/reference/rect_.html" target="_blanc">rect</a></li>   
	    <li><a href="https://processing.org/reference/random_.html" target="_blanc">random</a></li>
	  </ul>
	</p>
		
	<p>
	Avec la fonction <strong>stroke</strong> nous indiquons la couleur pour le contour. Par exemple pour un contour rouge :
	<pre>
	stroke(255,0,0);
	</pre>
	</p>
	
	<p>
	Avec la fonction <strong>noStroke</strong> nous indiquons que le contour de la forme tracée sera transparent.
	<pre>
	noStroke();
	</pre>
	</p>
		
	<p>
	Avec la fonction <strong>fill</strong> nous indiquons la couleur de l'intérieur de la forme. Par exemple pour une forme jaune avec un contour rouge :
	<pre>
	fill(255,255,0);
	stroke(255,0,0);
	</pre>
	</p>
	
	<p>
	Avec la fonction <strong>noFill</strong> nous indiquons que l'intérieur de la forme sera transparent. 
	<pre>
	noFill();
	</pre>
	</p>
	
	<p>
	Avec la fonction <strong>rect</strong> nous dessinons un rectangle. Nous commençons par donner les coordonnées de son coin supérieur gauche puis sa largeur et enfin sa hauteur. Par exemple pour un rectangle rouge dont le coin supérieur gauche se situe aux coordonnées (10,20), de largeur 100 et de hauteur 50, on écrira :
	<pre>
	noStroke();
	stroke(255,0,0);
	rect(10,20,100,50);
	</pre>
	</p>
	
	<p>Avec la fonction <strong>random</strong> nous obtenons un nombre aléatoire situé dans un intervalle donné. Par exemple pour un nombre entre 1 et 6, on écrira :
	<pre>
	float n = random(1,6);
	</pre>
	
	<p>
	Par ailleurs, nous utiliserons deux variables fournies par Processing :
	<ul>
	  <li>width</li> : la largeur de notre application ;
	  <li>height</li> : la hauteur de notre application.
	</ul>
	Ces variables sont à votre disposition, vous n'avez pas à leur donner de valeurs, simplement à les utiliser
	</p>
	
	<p>
	Enfin vous voudrez peut être sauvegarder les résultats obtenus. Vous pouvez utiliser la fonction <a href="https://processing.org/reference/save_.html" target="_blanck">save</a>.
	</pre>
	</p>
	
      </div>
    </div>
        
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 2 : rectangles</h2>
	 <ul>
	 <li>Recopiez et testez le code suivant : </li>
	 </ul>
	 <pre>
	 void setup() {
	    fullScreen();
	    background(20,20,20);
	    stroke(0,0,0);
	    float rouge=255;
	    float vert=255;
	    float bleu=0;
	    fill(rouge,vert,bleu);
	    float largeurRect=100;
	    float hauteurRect=random(10,100);
	    float xRect=width/2;
	    float yRect=height/2;
	    rect(xRect,yRect,largeurRect,hauteurRect);
	  }
	  
	  //Pour sauvegarder
	  void keyPressed() {
	    save("tp0_result.png");
	  }
	 </pre>
	 <ul>
	  <li>Modifiez le calcul de xRect et yRect pour que le centre du rectangle corresponde au centre de l'application.</li>
	  <li>Modifiez le calcul de la largeur du rectangle, pour quelle soit générée aléatoirement et comprise entre <strong>10</strong> pixels et <strong>100</strong> pixels.
	  <li>Modifiez le programme pour que la couleur soit déterminée de manière aléatoire : les variables rouge, vert et bleu doivent prendre des valeurs générées de manière aléatoire et comprise entre 0 et 255.</li>
	  <li>Modifiez le programme pour que les formes tracées soient des carrés et non des rectangles</li>
	 </ul>  
	  
	  <p>
	  Vous devriez obtenir quelque chose dans ce goût-là :
	  </p>
	  <img width="50%" class="img-responsive center-block" src="./images/tp0_result_square.png" /></p>
      </div>
    </div>
    
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 3 : boucle de dessin</h2>
	<p>Nous allons mainteant utiliser la fonction <strong>draw</strong> et y déplacer le code pour dessiner nos rectangles. La principale conséquence sera que notre programme ne va plus tracer un mais plusieurs rectangles.</p>	<ul>
	<li>Recopiez et testez le code suivant : </li>
	</ul>
	<pre>
	void setup() {
	  fullScreen();
	  background(20, 20, 20);
	}
	void draw() {
	  float rouge=255;
	  float vert=255;
	  float bleu=0;
	  stroke(0, 0, 0);
	  fill(rouge, vert, bleu);
	  float largeurRect=100;
	  float hauteurRect=random(10, 100);
	  float xRect=random(0,width);
	  float yRect=random(0,height);
	  rect(xRect, yRect, largeurRect, hauteurRect);
	}
	
	
	//Pour sauvegarder
	void keyPressed() {
	  save("tp0_result.png");
	}
	</pre>
	<ul>
	<li>En vous inspirant de ce que vous avez fait précédemment, modifiez le programme pour que la couleur de chaque rectangle soit déterminée de manière aléatoire.</li>
	<li>Lisez la documentation de la fonction <a href="https://processing.org/reference/frameRate_.html" target="_blanc">frameRate</a> et utilisez-là pour ralentir légèrement votre programme, histoire que personne ne fasse de crise d'épilepsie.</li>
	</ul>
	<p>
	Pour le moment, nous nous contentons de donner des couleurs parfaitement opaques. Il est cependant possible d'indiquer à processing la transparence d'une couleur, grâce un quatrième paramètre : alpha. Le paramètre <strong>alpha</strong> prend une valeur entre 0 (invisible) et 255 (opaque). Par exemple pour un jaune  transparent, on écrira :
	<pre>
	
	  float rouge=255;
	  float vert=255;
	  float bleu=0;
	  float alpha=50;
	  fill(rouge,vert,bleu,alpha);
	</pre>
	</p>
	<ul>
	<li>Modifiez votre programme pour que l'intérieur des rectangles soit légèrement transparent. Utilisez la même valeur alpha pour tous les carrés.</li>
	</ul>
	
	<p>
	Vous devriez obtenir quelque chose dans ce goût-là :
	</p>
	<img width="50%" class="img-responsive center-block" src="./images/tp0_result_rect_alpha.png" /></p>
      </div>
    </div>
    
    
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 4 : Une autre manière de définir la couleur.</h2>
	<p>Si vous ouvrez le sélecteur de couleurs (<kbd>Outils -> Sélecteur de couleurs</kbd>), vous remarquez qu'une couleur peut être soit définie par sa quantité de rouge, de vert et de bleu, soit par sa teinte <strong>H</strong>, sa saturation <strong>S</strong> et sa luminosité <strong>B</strong></p>
	<ul>
	  <li>La teinte correspond à la couleur générale et va de 0 à 360.</li>
	  <li>La saturation correspond à l'intensité de la couleur et va de 0 (terne) à 100 (les couleurs des premiers sites web).</li>
	  <li>La luminosité correspond à la quantité de lumière de la couleur et va de 0 à 100.</li>
	</ul>
	<p>En vous aidant de l'outil sélecteur de couleur, répondez aux questions suivantes : </p>
	<ul>
	<li>Quelle est la teinte pour avoir une couleur plutôt verte ? 
	<li>Que se passe-t-il quand la luminosité est égale à 0 ? 
	<li>Quelle est la valeur de saturation adéquate pour obtenir des couleurs pastel ?</li>
	<li>Que se passe-t-il si la saturation vaut 0 ? 
	<li>Quelles sont les valeurs de teinte, de saturation et de luminosité pour notre gris foncé (rouge=20, vert=20 et bleu=20) ?</li>
	</ul>
	<p>Dans la fonction <strong>setup</strong> ajoutez la ligne suivante, qui permet de générer les couleurs en mode teinte, saturation, luminosité : 
	<pre>
	  colorMode(HSB,360,100,100,255);
	</pre>	
	</p>
	<ul>
	<li>Dans la fonction <strong>draw</strong> supprimez les variables rouge, vert et bleu, puis remplacez-les par les variables teinte,sat,lum.</li>
	<li>Modifiez votre programme pour dessiner des rectangles de couleur verte, pour chaque carré des valeurs de saturation (variable <strong>sat</strong>) et de luminosité (variable <strong>lum</strong>) générée de manière aléatoire, entre 0 et 100.</li>
	</ul>		
	<p>
	Vous devriez obtenir quelque chose dans ce goût-là :
	</p>
	<img width="50%" class="img-responsive center-block" src="./images/tp0_result_green_rect.png" /></p>
      </div>
    </div>
    
    <div class="cv_part_border">
      <div class="cv_part">
	<h2>Exercice 5 : de nouvelles formes</h2>
	<p>
	Processing ne permet pas seulement de tracer des rectangles, mais aussi des lignes, des ellipses, des triangles etc. Pour terminer ce tp, nous allons voir comment remplacer nos carrés par des cercles et des lignes. Mais n'hésitez pas à parcourir la <a href="https://processing.org/reference/" target="_blanc">documentation</a> pour aller un peu plus loin. Vous verrez qu'il est même possible de faire des formes 3D.
	</p>
	
	<h4>Cercles</h4>
	<p>
	La fonction <a href="https://processing.org/reference/ellipse_.html" target="_blanc">ellipse</a> permet de tracer des ellipses et donc des cercles, qui ne sont rien d'autre que des ellipses pour lesquelles le plus petit diamètre est égal au plus grand diamètre. Il existe plusieurs manières de décrire une ellipse. Processing se sert du rectangle qui englobe l'ellipse. Vous allez fournir les quatre paramètres suivants :
	<ul>
	  <li>l'abscisse pour le centre du rectangle englobant l'ellipse </li>
	  <li>l'ordonnée pour le centre du rectangle englobant l'ellipse </li>
	  <li>la largeur du rectangle englobant l'ellipse</li>
	  <li>la hauteur du rectangle englobant l'ellipse</li>
	</ul>
	Dans votre code, remplacez la fonction <strong>rect</strong> par la fonction <strong>ellipse</strong> et assurez-vous que la largeur et la hauteur du rectangle soient identiques.
	</p>
	<ul>
	<li>Remplacez les rectangles verts par des cercles bleus (et pas des ellipses!).</li>
	</ul>
	<p>
	Vous devriez obtenir quelque chose dans ce goût-là :
	</p>
	<img width="50%" class="img-responsive center-block" src="./images/tp0_result_circle.png" /></p>
	
	<h4>Lignes</h4>
	<p>
	Pour Processing une ligne est un segment qui part d'un premier point et s'arrête à un second. Pour tracer une ligne, on utilise la fonction <a href="https://processing.org/reference/line_.html" target="_blanc">line</a> et on lui passe les quatre paramètres suivants : 	
	<ul>
	  <li>l'abscisse pour le premier point </li>
	  <li>l'ordonnée pour le premier point </li>
	  <li>l'abscisse  pour le second point </li>
	  <li>l'ordonnée pour le second point</li>
	</ul>
	</p>
	<p>
	Nous allons tracer un faisceau de droite qui parcourt l'écran colonne par colonne et dont la teinte dépend de la position horizontale. Ce qui veut dire que nos lignes feront toujours la largeur de l'écran, donc que l'ordonnée du premier point sera toujours égale à 0, tandis que l'ordonnée du second point sera toujours égale à height. De plus l'abscisse du second point sera toujours égale à celle l'abscisse du premier point. Comme nous commençons à tracer nos lignes à partir de la gauche, la première valeur de l'abscisse pour nos deux points sera 0. Nous avons donc trois variables, initialisées de la manière suivante :
	<pre>
	float y0;
	float y1;
	float x;
	void setup() {
	  fullScreen();
	  background(20, 20, 20);
	  colorMode(HSB,360,100,100,255);
	  y0=0;
	  y1=height;
	  x=0; 
	}
	</pre>
	</p>
	<p>
	J'ai déclaré ces trois variables en dehors de la fonction <strong>setup</strong> en tout début de mon fichier. Ainsi elles sont accessibles dans toutes les fonctions. Cela va me permettre de faire évoluer la valeur de x dans la fonction <strong>draw</strong> et d'accéder à cette valeur mise à jour à chaque appel de la fonction <strong>draw</strong>. 
	</p>
	<ul>
	 <li>De la même manière, déclarez les variables teinte,sat et lum qui vont permettre de gérer la couleur.</li>
	 <li>Initialisez la teinte à 0.</li>
	 <li>Initialisez sat avec un nombre aléatoire compris entre 0 et 100.</li>
	 <li>Initialisez lum ave  un nombre aléatoire compris entre 0 et 100.</li>
	 
	</ul>
	
	<p>
	Dans la fonction <strong>draw</strong>, on va écrire le code pour tracer les lignes. Une ligne n'a qu'une couleur de contour et pas de couleur interne. Il est donc inutile d'utiliser la fonction <strong>fill</strong>.
	<ul>
	<li>Appelez la fonction <strong>stroke</strong> avec comme paramètre teinte,sat et lum. Ne donnez pas de valeur de transparence. 
	<li>Ajoutez le code pour tracer une ligne dont le premier point est situé à (x,y0) et le second ) (x,y1).	
	<li>Mettez à jour la saturation et la teinte en leur donnant une valeur aléatoire comprise entre 0 et 100.</li>
	<li>Mettez à jour l'abscisse pour la prochaine ligne en ajoutant 1 à x.</li>
	<li>Pour que le programme reparte à l'abscisse 0 lorsqu'il a atteint la dernière ligne, vous utilisez la fonction modulo pour mettre à jour x : </li>
	</ul>
	<pre>
	x=(x+1)%width;
	</pre>
	</p>
	<ul>
	<li>Sur le même principe mettez à jour la teinte en lui ajoutant 1 et en utilisant la fonction modulo pour que lorsque la teinte vaut 360 elle soit remise à 0.</li>
	</ul>
	<p>
	Vous devriez obtenir quelque chose dans ce goût-là :	
	</p>
	<img width="50%" class="img-responsive center-block" src="./images/tp0_result_line.png" /></p>

	
      </div>
    </div>
    
    
    <div class="text-center "><!-- pagination -->
      <ul class="pagination">
	<li class="active"><a href="./processing_tp0.html">TP1</a></li>
	<li><a href="./processing_tp1.php">TP2</a></li>
	<li ><a href="./processing_tp2.php">TP3</a></li>
      </ul>
    </div> <!-- End pagination -->
   </div> <!-- end content-->
   

<?php include('../footerLevel2.html'); ?>
  </div>
    
</body>

</html>

