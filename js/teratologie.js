/**
 * Current application drawing function state:
 * step 0 : first image loading
 * step 1 : fist image is displayed
 **/
var state;

function createLoadingState(){
  LoadingState={
    draw:function loadingMessage(){
      background(0);
      fill(255);
      textSize(20);
      text("loading ...",width/2,height/2);
    },
    isEnded:function(){return false;}
  };
  
  return LoadingState;
}


function createDisplayImageState(img){
  DisplayImageState={
    img:img,
    first:true,
    draw:function(){
      if(DisplayImageState.first){
	image(DisplayImageState.img,0,0);
      }
    },
    isEnded:function(){return false;},
  };
  
  return DisplayImageState;
  
}

function createAddImageState(img){
  var step=10;
  cases=[];
  for(var y=0;y<img.height;y+=step){
    for(var x=0;x<img.width;x+=step){
      cases[cases.length]={
	x:x,
	y:y,
	w:min(step,img.width-(x+step)),
	h:min(step,img.height-(y+step))
      }
      
    }
  }
  
  AddImageState={
    img:img,
    cases:cases,
    nbCases:cases.length,
    tend:false,
    finishedTime:60,
    startWaiting:false,
    isEnded:function(){
      if(AddImageState.nbCases==0&&!AddImageState.end){	
	var test=0;
	var currentTime=second();
	if(AddImageState.finishedTime <= currentTime){
	  test=currentTime-AddImageState.finishedTime;
	}else{
	  test=60+currentTime-AddImageState.finishedTime;
	}
	if(test>=2){
	  AddImageState.startWaiting=false;
	  return true;
	}
	
	return false;
      }else{
	return false;
      }      
    },
    nbNewCases:1,
    totalNbCases:cases.length,
    draw:function(){
      
      for(var j=0;j<AddImageState.nbNewCases;j++){
	if(AddImageState.nbCases>0){
	  i=floor(random(AddImageState.nbCases));	
	  var temp={
	    x:AddImageState.cases[i].x,
	    y:AddImageState.cases[i].y,
	    w:AddImageState.cases[i].w,
	    h:AddImageState.cases[i].h,
	  }
	  image(AddImageState.img,temp.x,temp.y,temp.w,temp.h,temp.x,temp.y,temp.w,temp.h);
	  AddImageState.nbCases--;
	  //switch last case and case i
	  AddImageState.cases[i].x=AddImageState.cases[AddImageState.nbCases].x;
	  AddImageState.cases[i].y=AddImageState.cases[AddImageState.nbCases].y;
	  AddImageState.cases[i].w=AddImageState.cases[AddImageState.nbCases].w;
	  AddImageState.cases[i].h=AddImageState.cases[AddImageState.nbCases].h;
	  AddImageState.cases[AddImageState.nbCases].x=temp.x;
	  AddImageState.cases[AddImageState.nbCases].y=temp.y;
	  AddImageState.cases[AddImageState.nbCases].w=temp.w;
	  AddImageState.cases[AddImageState.nbCases].h=temp.h;	
	}else{
	  break;
	}	
      }
      
      if(AddImageState.nbCases<=0&&!AddImageState.startWaiting){
	AddImageState.finishedTime=floor(second());
	AddImageState.startWaiting=true;
      }
      
      //step : [0,1];
      var step=AddImageState.nbCases/AddImageState.totalNbCases;
      //step : [0,4]
      step=step*4.;
      //step : [-2,2]
      step=step-2.;
      //step :4 -> 0 -> 4
      step=step*step;
      step=4-step;
      AddImageState.nbNewCases=Math.round(step+1);
      
      AddImageState.nbNewCases=max(AddImageState.nbNewCases,0);
      AddImageState.nbNewCases=min(AddImageState.nbNewCases,10);
      
    }
    
  };
  
  return AddImageState;
}

var imageUrls=[];
var imageIdx;
function setup() {
  //create drawing area
  var canvas=createCanvas(500, 500);
  imageUrls[0]="../portfolio/images/teratologie/CarmenBright.jpg";
  imageUrls[1]="../portfolio/images/teratologie/result_02_01.jpg";
  imageUrls[2]="../portfolio/images/teratologie/cell_colored_19.jpg";
  imageUrls[3]="../portfolio/images/teratologie/HarrisDetector.jpg";
  imageUrls[4]="../portfolio/images/teratologie/Confiture.jpg";
  imageUrls[5]="../portfolio/images/teratologie/vasco.jpg";
  imageIdx=0;
  //shuffle array
  /*var idx1,idx2,temp;
  for(var k=0;k<round(imageUrls.length/2);k++){
    idx1=floor(random(imageUrls.length));
    idx2=floor(random(imageUrls.length));
    temp=imageUrls[idx1];
    imageUrls[idx1]=imageUrls[idx2];
    imageUrls[idx2]=temp;
  }*/
  
  //set it to the sopecific div, to center it
  canvas.parent("teratologie_canvas");
  //set background color in RGB color space
  background(0);
  state=createLoadingState();
  loadImage(imageUrls[imageIdx],function(img){
    state=createDisplayImageState(img);
    imageIdx=(imageIdx+1)%imageUrls.length;
    loadImage(imageUrls[imageIdx],function(img){
      state=createAddImageState(img);
      imageIdx=(imageIdx+1)%imageUrls.length;
      }
    );
  }
    
  );
}

function draw() {
  
  state.draw();
  if(state.isEnded()){
     loadImage(imageUrls[imageIdx],function(img){
      state=createAddImageState(img);
      imageIdx=(imageIdx+1)%imageUrls.length;
      }
    );
  }

 
}