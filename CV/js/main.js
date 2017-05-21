
var setCursus=function(){
  var cursus=$("#cursusIm");
  var cursusContainer=$("#formation");
    if(cursusContainer.width()<700){ 
      if(cursusContainer.width()>=400){     
        cursus.attr({"src":"assets/cursus2.svg","width":"400px"});
      }else{
        cursus.attr({"src":"assets/cursus2.svg","width":"100%"});
      }
    }else{
      cursus.attr({"src":"assets/cursus.svg","width":"100%"});
    }
}
$( document ).ready(function() {
    $(".dev-tile").responsiveEqualHeightGrid();
    $(".presentation-col").responsiveEqualHeightGrid();
    $("#navbarElements").css('opacity','1');
    setCursus();
    
    $('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
    

    
});


$( window ).resize(function() {
   
    setCursus();
  
});

