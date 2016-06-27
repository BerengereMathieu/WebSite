//images
var platypusImage;
var screenIm

var topLeftScreen;

var quotes;

var sentence;

function preload(){
  platypusImage=loadImage("../js/dataPlatypus/platypus.jpg");
  topLeftScreen=createVector(50,70);
  screenIm=loadImage("../js/dataPlatypus/screen.png");

  quotes=loadJSON("../js/dataPlatypus/text1.json");
}

var wait;
var idxQuote;
function setup() {
  //create drawing area
  var canvas=createCanvas(600,772);
  //set it to the sopecific div, to center it
  canvas.parent("platypus_canvas");
  //set background color in RGB color space
  background(255);
  //switch to HSB color space
  colorMode(HSB, 360, 255, 255, 255);
  //set background
  background(0);
  sentence="";
  wait=0;
  idxQuote=floor(random(quotes["data"].length));;




  
  
}

function draw(){


  var x,y;//coordinates
  var c;//color
  var i;//index
  //draw noisy platypus
  for (i=0; i<30; i++) {
    x=floor(random(topLeftScreen.x,topLeftScreen.x+platypusImage.width));
    y=floor(random(topLeftScreen.y,topLeftScreen.y+platypusImage.height));
    c=platypusImage.get(max(floor(x-topLeftScreen.x),0),max(floor(y-topLeftScreen.y),0));
    noStroke();
    fill(random(360), random(255), brightness(c));
    rect(x, y, 3, 3);
  }

  for (i=0; i<60; i++) {
    x=floor(random(topLeftScreen.x,topLeftScreen.x+platypusImage.width));
    y=floor(random(topLeftScreen.y,topLeftScreen.y+platypusImage.height));
    noStroke();
    fill(0, 0, 0);
    rect(x, y, 3, 3);
  }

  //remove previous text
  fill(0);
  noStroke();
  rect(topLeftScreen.x+10,topLeftScreen.y+platypusImage.height+20,490,150);

  //display sentence
  textSize(12);
  fill(255);
  noStroke();
  textFont("Georgia");
  text(sentence,topLeftScreen.x+10,topLeftScreen.y+platypusImage.height+20,490,150);
  if(sentence.length<quotes["data"][idxQuote].length){
    sentence=quotes["data"][idxQuote].substring(0,sentence.length+1);
  }else{
    if(wait<100){
      wait++;
    }else{
      wait=0;
      sentence="";
      idxQuote=(idxQuote+floor(random(1,10)))%quotes["data"].length;
    }
  }

  //draw screen
  image(screenIm,0,0,width,height)
}