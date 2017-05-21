<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>CV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/grids.min.js"></script>
  <script src="js/main.js"></script>

  <link href=./css/main.css rel="stylesheet">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
 

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  
</head>

<body>
  
  <nav class="navbar navbar-default navbar-fixed-top">
  <div  class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CV</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul id="navbarElements" class="nav navbar-nav">
        <li><a href="#formationAnchor">Cursus</a></li>
        <li><a href="#devAnchor">Développement</a></li>
        <li><a href="#enseignementAnchor">Enseignement</a></li>
        <li><a href="#rechercheAnchor">Recherche</a></li>
        <li><a href="#mediationAnchor">Médiation</a></li>
      </ul>
    </div>
  </div>
  </nav><!--End navbar -->
</body>

  <!-- identité et contact -->
  <div >
    <div class="center-block container-fluid" id="presentation" >
        
        <h3 class="text-center">Bérengère Mathieu</h3>
        <img src="assets/avatar2.png" width="200px" class="img-responsive center-block"/>
        <div id="contact_container"  class="row">
          <div class="col-xs-3 "></div>
          <div class="col-xs-2 ">
            <a id="twitter_icon" href="https://twitter.com/Ber3ngereM" target="_blank">
            <img width="40px" class=" img-responsive center-block" src="assets/Twitter_Icon.svg"/>
            </a>
          </div>
          <div class="col-xs-2 ">        
            <a id="google_icon" href="https://plus.google.com/105061247223162269946" target="_blank">
            <img width="40px" class=" img-responsive center-block" src="assets/Google_Icon.svg"/>
            </a>
          </div>
          <div class="col-xs-2">
            <a id="linkedin_icon" href="https://www.linkedin.com/in/b%C3%A9reng%C3%A8re-mathieu-491563b2" target="_blank">
            <img width="40px" class=" img-responsive center-block" src="assets/Linkedin_Icon.svg"/>
            </a>
          </div>
        </div>
    </div>
  </div>
  
  <!-- cursus -->
  <a id="formationAnchor"></a>
  <div id="formation" class="container center-block block2" >
    <h1>Cursus Universitaire</h1>
    <img id="cursusIm" class="center-block" src="assets/cursus.svg"  width="100%"/>
  </div>
  
  <!-- developpement logiciel -->
  <a id="devAnchor"></a>
  <div class="container block3">
    <div class="content"> 
      <?php require 'developpement.html'; ?>
    </div> 
  </div>
  
  <!-- enseignement -->
  <a id="enseignementAnchor"></a>
  <div class="container block2">
    <div class="content"> 
      <?php require 'enseignement.html'; ?>
    </div> 
  </div>
  
  <!-- recherche -->
  <a id="rechercheAnchor"></a>
  <div class="container block3">
    <div class="content"> 
      <?php require 'recherche.html'; ?>
    </div> 
  </div>
  
  <!-- mediation -->
  <a id="mediationAnchor"></a>
  <div class="container block2">
    <div class="content"> 
      <?php require 'mediation.html'; ?>
    </div> 
  </div>
  
  <!-- pied de page -->
  <div class="container block2">
    <p style="text-align:center"> 
      <a href="http://berengeremathieu.fr">about</a> | <a  href="LICENSE.txt">licence</a>
    </p>
  </div>
</body>
