<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href=../css/bootstrap.css rel="stylesheet">
  
  <link href=../css/l3_plugins.css rel="stylesheet">
  <link href=../css/jquery-ui-1.11.4.custom/jquery-ui.min.css ref="stylesheet">
  
  <link href=../css/main_css_sheet.css rel="stylesheet">
  <link href=../css/portfolio_css_sheet.css rel="stylesheet">

  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  <script src="../js/jquery-1.12.1.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
    
  <script type="text/javascript" src="../js/l3_plugins_curtain.js"> </script>
  <script type="text/javascript" src="../js/modernizr.js"> </script>
  
  
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/common.js"> </script>

</head>
<body>

<?php include('../headerPortefolio.html'); ?>
    
   <div class="class=container-fluid content">  
    <div class="cv_part">
      <h1 class="text-center">Outils web pour la comparaison et l'anotation d'images</h1>
      <br></br>
      <p>
      Adoptée depuis octobre 2000, la convention européenne du payage reconnait à ce dernier une utilité sociale, en tant qu'élément essentiel du cadre de vie. L'entrée en vigueur de ce traité à conduit a la mise en place de nombreuses initiatives visant la prise en compte du paysage dans les politiques culturelles, les politiques d'aménagement du territoire et les politiques d'urbanisme.
      </p>
      
      <p>
      Afin d'analyser son évolution, de nombreux observatoires photographiques du paysage ont vu le jour. Concrètement, il s'agit de choisir quelques lieux puis de les photographier à intervalles réguliers. Les séries ainsi obtenues permettent de saisir des dynamiques particulières : reprise de la végétation après la construction d'une route, extensions des zones péri-urbaines etc.. Souvent, la création de ces observatoires s'accompagne d'une volonté de mettre les clichés à disposition du grand pulic. 
      </p>
      
      <p>
      En troisième année de licence, j'ai travaillé sur la conception de petits outils web permettant de comparer et d'annoter simplement des séries de photographies. Une rapide étude des technologies existentes m'a amenée à privéligier une programmation en HTML5 appuyée par l'utilisation des bibliothèques JQuery et JQuery-UI.
      </p>
      
      <p>
      La première solution proposée consiste à superposer deux images et à révèler
  <link href=../css/main_css_sheet.css rel="stylesheet"> progressivement celle du dessous grâce à un curseur horizontal ou vertical. Tout se passe comme si l'image du dessus était sur un rideau dont l'ouverture révèle la seconde photograhie.
      </p>      
      
      
      <div class="row">
	<div class="col-sm-6">
	  <h4 class="plugin_subtitle"> Rideau horizontal </h4>	   
	  <div id="horizontalCurtainPlugin"  class="plugin_description">
	    <img id="img0" width="100%" src="./images/iC_01.jpg"></img>
	    <img id="img1" width="100%" src="./images/iC_02.jpg"></img>	  
	  </div>
	</div>
	
	<div class="col-sm-6">
	  <h4 class="plugin_subtitle"> Rideau vertical </h4>
	  <div id="verticalCurtainPlugin"  class="plugin_description">
	  </div>
	</div>
      
      <p>
      Malgrè son aspect très ludique, cette application demeure cependant limitée dans le cadre d'un observatoire du paysage où pour un même lieu, une dizaine d'images est généralement disponible. J'ai donc conçu un logiciel plus générique, permettant d'empiler plusieurs images et de les rendre progressivement transparentes. Vous pouvez cliquer <a href="./stageL3ComparaisonDImages.html" target="_blank">ici</a>, pour voir le résultat.
      </p>
      
      <p>
      Enfin, la partie la plus complexe de ce stage a sans doute été de développer un outil d'annotation. Plusieurs modes de sélections (rectangulaire, main levée etc.) permettent de sélectionner certaines zones de l'image et d'y associer une description. Le logiciel est également prévu pour permettre de sauvegarder le résultat sur le serveur où sont hébergées les photographies de l'observatoire. 
      En <a href="./stageL3AnnotationDImages.html" target="_blank">voici</a> une version, sans cette fonction de sauvegarde. 
      </p>
      
      <p>
      Ces outils ont été mis à disposition par l'ENFA, par exemple <a href="http://image.enfa.fr/observatoire/pov.php?album=76&chemin=Observatoires%2FA89%2FA8919480" target="_blank">ici</a>.
      </p>
    </div>
  </div>
    
    
   </div> <!-- end content-->
     
   

<?php include('../footerLevel2.html'); ?>
  </div>
  
  
  <script>
    
  
      if(!check_functionnalities()){
	
	var error_msg1=$("<div><p>Il semble que votre navigateur ne possède pas les fonctionnalités nécessaires à l'éxecution de cette démo :(</p><img width='256px' src='../portfolio/images/Adoptfirefox.jpg'></div>");
	var error_msg2=$("<div><p>Il semble que votre navigateur ne possède pas les fonctionnalités nécessaires à l'éxecution de cette démo :(</p><img width='256px' src='../portfolio/images/Adoptfirefox.jpg'></div>");
	$('#horizontalCurtainPlugin').append(error_msg1); 
	$('#verticalCurtainPlugin').append(error_msg2); 
	//remove the two pictures
	$('#img0').remove();
	$('#img1').remove();	      
      }else{
	//compare img1 and img2 with a horizontal curtain (show picture from left to right)
	var canvas1=horizontalCurtain($('#img0')[0],$('#img1')[0]);
	//put  canvas  in place  		
	$('#horizontalCurtainPlugin').append(canvas1);
	
	var canvas2=verticalCurtain($('#img0')[0],$('#img1')[0]);
	//put  canvas  in place  		
	$('#verticalCurtainPlugin').append(canvas2);
	
	//remove the two pictures
	$('#img0').remove();
	$('#img1').remove();
      }
    }
    </script>

   
</body>

</html>

