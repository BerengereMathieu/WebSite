
function supportsSvg() {
    return document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Shape", "1.0")
}

window.onload=function(){
    if(supportsSvg){
        var img_twitter=$('<img src="../css/twitter_icon.svg" class="icon">');
        img_twitter.load(function(){
                         $("#twitter_icon").children().remove();
                         $("#twitter_icon").append(img_twitter);
                         });
        
        var img_google=$('<img src="../css/google_icon.svg" class="icon">');
        img_google.load(function(){
                        $("#google_icon").children().remove();
                        $("#google_icon").append(img_google);
                        });
        
        var img_linkedin=$('<img src="../css/linkedin_icon.svg" class="icon">');
        img_linkedin.load(function(){
                          $("#linkedin_icon").children().remove();
                          $("#linkedin_icon").append(img_linkedin);
                          });
        
        var img_framasphere=$('<img src="../css/framasphere_icon.svg" class="icon">');
        img_linkedin.load(function(){
                          $("#framasphere_icon").children().remove();
                          $("#framasphere_icon").append(img_framasphere);
                          });
    }
}
