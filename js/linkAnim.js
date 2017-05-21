
var createAnimation = function(idx){
  
  
  var img = $("#"+idx+"_link_img");
  img.attr({"src":"assets/"+idx+"_Icon_BW.svg"});
  $("#"+idx+"_link").css(
  {
    "background-image":"url('./assets/"+idx+"_Icon.svg')",
    "background-size":"100% 100%",
    "background-repeat":"no-repeat"
  });
 
  img.mouseenter(function() {
    img.animate({"opacity":"0"}, "slow");
  });
  
  img.mouseleave(function() {
    img.animate({"opacity":"1"}, "slow");
  });
  
  
}

$(document).ready(function(){
	
	createAnimation("Git");
	createAnimation("CV");
	createAnimation("Art");
	
	$(".link").css('opacity','1');
  

}); 
