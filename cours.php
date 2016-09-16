<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  
  <link href=./css/bootstrap.css rel="stylesheet">
  
  
  <link href=./css/main_css_sheet.css rel="stylesheet">
  <link href=./css/cours_css_sheet.css rel="stylesheet">
  
  
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/common.js"> </script>
  
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div >
        <ul class="nav navbar-nav">
          <li class="active"><a href=./cours.php>Enseignement</a></li>
          <li ><a href=./developpeuse.php>Logiciels</a></li>
          <li ><a href=./artiste.php>Création</a></li>
          <li ><a href=./recherche.php>Recherche</a></li>
        </ul>
      
        <ul class="nav navbar-nav navbar-right">
          <li ><a href=./index.php>Accueil</a></li>
          <li ><a href=./cv.php>CV</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="banner"></div>
    <div class="class=container-fluid content">
      
      <h1 class="text-center">Ressources pédagogiques</h1>
      
      <br></br>
      
      <div class="cv_part_border">
        <div class="cv_part">
          <h2>Processing : découverte de la programmation</h2>
          <p>Ces sujets de TPs ont été réalisés pour un cours d'introduction à l'algorithmique. Ils s'adressent à des débutants n'ayant aucune connaissance particulière sur l'utilisation de Processing ou le langage Java. Par contre les concepts de base de l'algorithmique, notamment les boucles, les tests, les fonctions et les variables doivent être connus. 
          </p>
          <p>
          Les idées de réalisations, qui servent de fil rouge à chaque sujet, sont de légères adaptations des exemples disponibles dans l'excellent ouvrage de Julia Laub, Hartmut Bohnacker, Benedikt Groß et Claudius Lazzeroni : <em>Design génératif - Concevoir, programmer, visualiser</em>.
          </p>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/processing_tp0.php">Découverte de processing</a></h4>
              <a href="cours/processing_tp0.php">
                <img class="demo_cours" src="./cours/images/demo_tp0.jpg"></img>
              </a>
            </div>
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/processing_tp1.php">Hexagones</a></h4>
              <a href="cours/processing_tp1.php">
                <img class="demo_cours"  src="./cours/images/demo_hexagones.jpg"></img>
              </a>
            </div>
          </div>	
          <div class="row">
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/processing_tp2.php">Manipulation d'images</a></h4>
              <a href="cours/processing_tp2.php">
                <img class="demo_cours" src="./cours/images/demo_manip_images.jpg"></img>
              </a>
            </div>
          </div>
        </div> <!-- end processing courses -->
        
       <div class="cv_part_border">
        <div class="cv_part">
          <h2>Scratch : initiation à l'algorithmique</h2>
          <p>
          Le but de ces sujets de TP est de découvrir les concepts de base de l'algorithmique à travers la réalisation d'un
          petit jeu vidéo dans le langage de programmation graphique Scratch. Les concepts (boucle, conditions, test etc.) sont supposés avoir été étudiés en cours et ne font pas l'objet d'explications approfondies. 
          </p>	
          <div class="row">
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/scratch_tp1.php">Découverte de Scratch</a></h4>
              <a href="cours/scratch_tp1.php"><img class="demo_cours" src="./cours/images/demo_scratch_tp1.jpg"></img></a>
            </div>
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/scratch_tp2.php">Boucles</a></h4>
              <a href="cours/scratch_tp2.php"><img class="demo_cours" src="./cours/images/demo_scratch_tp2.jpg"></img></a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <h4 class="cours_link"><a href="cours/scratch_tp3.php">Conditions</a></h4>
              <a href="cours/scratch_tp3.php"><img class="demo_cours" src="./cours/images/demo_scratch_tp3.jpg"></img></a>
            </div>
          </div>
        </div>      
      </div> <!-- end scratch courses -->
      
        
    </div> 
  </div>
    
 
  
  <div>
    <?php include('footerLevel1.html'); ?>
  </div>
</body>

</html>

