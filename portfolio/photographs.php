<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Here be dragons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href=../css/bootstrap.css rel="stylesheet">
  <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
  
  <link href=../css/l3_plugins.css rel="stylesheet">
  <link href=../css/jquery-ui-1.11.4.custom/jquery-ui.css ref="stylesheet">
  
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/common.js"> </script>
  
  <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

  <script>
  document.getElementById('links').onclick = function (event) {
      event = event || window.event;
      var target = event.target || event.srcElement,
          link = target.src ? target.parentNode : target,
          options = {index: link, event: event},
          links = this.getElementsByTagName('a');
        blueimp.Gallery(links, options);
  };
  </script>
  
</head>
<body>

<?php include('../headerPortefolio.html'); ?>

   <div class="class=container-fluid content">  
    <div class="cv_part">
      <h1 class="text-center">Photographies</h1>
       <div id="links">
        <div class="content row">
          <div class="col-xs-3">
            <a href="images/photos/photo_012.jpg" title="" data-gallery>
              <img class="img-responsive"  src="images/photos/min_012.jpg" alt="Lot">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_011.jpg" title="" data-gallery>
              <img class="img-responsive"  src="images/photos/min_011.jpg" alt="Lourdes">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_001.jpg" title="" data-gallery>
              <img class="img-responsive"  src="images/photos/min_001.jpg" alt="Chat">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_006.jpg" title="" data-gallery>
              <img class="img-responsive"  src="images/photos/min_006.jpg" alt="Mer">
            </a>
          </div>
        </div>
        </br>
        <div class="content row">
          
          <div class="col-xs-3">
            <a href="images/photos/photo_008.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_008.jpg" alt="Festival">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_005.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_005.jpg" alt="Mer">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_007.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_007.jpg" alt="Canards">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_009.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_009.jpg" alt="Tag">
            </a>
          </div>

        </div>
        </br>
        <div class="content row">
          
          <div class="col-xs-3">
            <a href="images/photos/photo_002.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_002.jpg" alt="Chat">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_010.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_010.jpg" alt="Lourde">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_004.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_004.jpg" alt="Toulouse">
            </a>
          </div>
          <div class="col-xs-3">
            <a href="images/photos/photo_003.jpg" title="" data-gallery>
              <img class="img-responsive" src="images/photos/min_003.jpg" alt="Toulouse">
            </a>
          </div>
        </div>
      </div>
    </div> <!-- end content -->
   </div> <!-- end content-->
   
   
    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <ol class="indicator"></ol>
    </div>
         
   
                                       
   <?php include('../footerLevel2.html'); ?>
  </div>
  
   
</body>

</html>

