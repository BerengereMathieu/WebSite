<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href=./css/bootstrap.css rel="stylesheet">
  
  
  <link href=./css/main_css_sheet.css rel="stylesheet">
  <link href=./css/portfolio_css_sheet.css rel="stylesheet">


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
            <li ><a href=./cours.php>Enseignante</a></li>
            <li ><a href=./developpeuse.php>Développeuse</a></li>
            <li class="active"><a href=./artiste.php>Artiste</a></li>
            <li ><a href=./recherche.php>Chercheuse</a></li>
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

    <h1 class="text-center">Travail artistique</h1>
    <br></br>
    
     <div class="cv_part_border">
      <div class="cv_part">
	  <a href="portfolio/teratologie.php">
	    <h2 class="hidden_link_title">Tératologie</h2>	    
	    <img src="portfolio/images/teratologie/teratologie_teaser.jpg"></img>
	  </a>
      </div>
    </div>   
    
    <div class="cv_part_border">
      <div class="cv_part">
	  <a href="portfolio/prixCC.php">
	    <h2 class="hidden_link_title"> Prix d'écriture Claude Nougaro</h2>	    
	    <img src="portfolio/images/pecc_teaser.jpg"></img>
	  </a>
      </div>
    </div>   
  </div>



<?php include('footerLevel1.html'); ?>
  </div>
</body>

</html>

