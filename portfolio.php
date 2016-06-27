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
            <li ><a href=./index.php>Home</a></li>
            <li ><a href=./cv.php>CV</a></li>
            <li class="active"><a href=./portfolio.php>Portfolio</a></li>
            <li ><a href=./cours.php>Cours</a></li>
          </ul>
        </div>
        
      </div>
    </nav>
    <div class="banner"></div>
    
  <div class="class=container-fluid content">

    <h1 class="text-center">Portfolio</h1>
    <br></br>
    
    <div class="element element_1 ">    
      <a href="portfolio/ColorSpacesVisualization.html">
	<div class="row">
	  <div class="col-sm-8 ">
	    Exploration des espaces colorimétriques : VASCO
	  </div>
	</div>  
      </a>
    </div>
    
    <div class="element element_1 ">    
      <a href="portfolio/SCIS.html">
	<div class="row">
	  <div class="col-sm-8 ">
	    Filtre Gimp pour l'extraction d'éléments dans une image
	  </div>
	</div>  
      </a>
    </div>
    
    <div class="element element_1 ">   
      <a href="portfolio/stageL3.html"> 
	<div class="row">
	  <div class="col-sm-8 ">
	    Outils webs pour la comparaison et l'annotation d'images
	  </div>
	</div>
      </a>
    </div>
   
    
    <div class="element element_1 ">   
      <a href="portfolio/prixCC.html"> 
	<div class="row">
	  <div class="col-sm-8 ">
	  Prix d'écriture Claude Nougaro (2007)
	  </div>
	</div>
      </a>
    </div>
   
    <br></br>
  

  </div>
  


<?php include('footerLevel1.html'); ?>
</div>
  <script>
      window.onload=function(){
	if(supportsSvg){
	  var img_twitter=$('<img src="./css/twitter_icon.svg" class="icon">');
	  img_twitter.load(function(){
	    $("#twitter_icon").children().remove();
	    $("#twitter_icon").append(img_twitter);
	  });
	
	  var img_google=$('<img src="./css/google_icon.svg" class="icon">');
	  img_google.load(function(){
	    $("#google_icon").children().remove();
	    $("#google_icon").append(img_google);
	  });
	
	  var img_linkedin=$('<img src="./css/linkedin_icon.svg" class="icon">');
	  img_linkedin.load(function(){
	    $("#linkedin_icon").children().remove();
	    $("#linkedin_icon").append(img_linkedin);
	  });
	}
      }
  </script> 
 
</body>

</html>

