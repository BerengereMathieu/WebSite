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
                        <li ><a href=./artiste.php>Artiste</a></li>
                        <li  class="active"><a href=./recherche.php>Chercheuse</a></li>
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
            
            <h1 class="text-center">Recherche</h1>
            <br></br>
            
            <div class="cv_part_border">
                <div class="cv_part">
                    <h2 >Segmentation interactive d'images</h2>
                    <p>
                    Aujourd'hui encore et malgré les nombreux travaux sur le sujet, segmenter une image, ou en d'autres termes, grouper ses pixels en régions correspondant aux éléments visibles, demeure un problème ouvert. L'une des difficultés les plus délicates à surmonter concerne l'incertitude quant au résultat attendu :  telle segmentation jugée pertinente dans un premier contexte, peut se révéler inutilisable pour un autre type d'application.
                    </p>
                    <p>
                    La segmentation interactive contourne cette difficulté en demandant à l'utilisateur de fournir quelques informations (points de contours, échantillons de pixels pour chaque région, etc.). Ces indications permettent de déterminer les caractéristiques des différentes régions ainsi que leur nombre.
                    </p>
                    
                    <h3>Publications :</h3>
                    <ul>
                        <li><a href="http://rfia2016.iut-auvergne.com/media/articles/AV02.pdf" target="_blank"><em>Segmentation interactive pour l’annotation de photographies de paysages</em>, RFIA 2016</a></li>
                        <li><a href="portfolio/presentationSCIS.pdf" target="_blank">Présentation RFIA 2016</a></li>

                    </ul>
                    <a href="portfolio/SCIS.php">
                        <h3>Démonstration : </h3>
                        <img src="portfolio/images/scisTeaser.gif"></img>
                    </a>
                    </a>
                </div>
            </div>
            
            
            
            
            <br></br>
            
            
        </div>
        
        <?php include('footerLevel1.html'); ?>
        </div>
    
        
    </body>
    
</html>

