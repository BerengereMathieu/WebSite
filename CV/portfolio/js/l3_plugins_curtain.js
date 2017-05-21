check_functionnalities = function(){
  return Modernizr.canvas && Modernizr.opacity && Modernizr.rgba;
}
//curtain comparaison
//show background image from the left to the right
horizontalCurtain = function(img1,img2){
	
	//-------------------------------------------------//
	//	Variables 				   //
	//-------------------------------------------------//
	//size of image
	var width;
	var height;
	//canvas where the image will be copied
	var canvas;
	//context of the canvas
	var ctx;
	//imageData of the canvas
	var imageData;
	var data;
	//number of pixels in the canvas
	var nbPixels;
	var i;
	  //position of the curtain
	var posCurtain;
	
	//-------------------------------------------------//
	//	Main function				   //
	//-------------------------------------------------//
	
	//store the size of the less broad image
	if($(img1).width()<$(img2).width()){
		width=$(img1).width();
		height=$(img2).height();
	}else{
		width=$(img2).width();
		height=$(img2).height();
		
	}
	//the first position of the curtain is on the middle of the picture
	posCurtain=width/2;
	
	//create canvas
	canvas=$('<canvas width="' + width +'" height="' +height+'"></canvas');
	//the background of the canvas is the first image
	canvas.css('background-image','url('+$(img1).attr('src')+')');
	
	
	ctx=canvas[0].getContext('2d');
	if(!ctx){
		throw Error("can not get canvas context");
	}
	//copy the second image on the canvas
	ctx.drawImage(img2,0,0);
	
	
	//at the left of the curtain the second image is transparent
	//at the right of the curtain the second image is opaque
	imageData=ctx.getImageData(0,0,width,height);
	data=imageData.data;
	nbPixels=width*height;
	for(i=0;i<(nbPixels*4);i+=4){
		if((i%(width*4))<(width*2)){
			data[i+3]=0;
		}else{
			data[i+3]=255;
		}
		
	}
	//draw the new picture on the canvas
	ctx.putImageData(imageData,0,0);
	
	//draw the curtain
	drawCurtain(ctx,posCurtain,height)
		
	//when the mouse move on the canvas redraw the curtain
	//and the second image
	canvas.mousemove(
		function(EventObject){
			ctx=canvas[0].getContext('2d');
			if(!ctx){
				throw Error("can not get canvas context");
			}
	
			//rub out curtain
			clearCurtain(ctx,posCurtain,height)
			
			//find the new position of curtain
			posCurtain=EventObject.pageX-canvas.offset().left;
			if(posCurtain>width-15){
				posCurtain=width-15;
			}
			if(posCurtain<15){
				posCurtain=15;
				
			}
			
			//at the left of the curtain the second image is transparent
			//at the right of the curtain the second image is opaque
			for(i=0;i<(nbPixels*4);i+=4){
				if((i%(width*4))<(posCurtain*4)){
					data[i+3]=0;
				}else{
					data[i+3]=255;
				}
		
			}	
			
			//draw the new picture on the canvas
			ctx.putImageData(imageData,0,0);
			
			//draw the curtain
			drawCurtain(ctx,posCurtain,height);

		}
	);
	
	return(canvas);
	
	//-------------------------------------------------//
	//	subfunctions				   //
	//-------------------------------------------------//
	
	//draw the curtain at the position posCurtain
	function drawCurtain(ctx,posCurtain,height){
		ctx.beginPath();
		ctx.fillStyle='rgba(102,102,102,0.75)';
		ctx.strokeStyle='rgb(255,255,255)'
		ctx.fillRect(posCurtain-5,0,10,height);
		ctx.strokeRect(posCurtain-5,0,10,height);
		
		ctx.fillStyle='rgb(102,102,102)';
		ctx.fillRect(posCurtain-10,(height/2) -10,20,20);
		ctx.strokeRect(posCurtain-10,(height/2) -10,20,20);
		
		ctx.closePath();

	}
	
	//rub out curtain at the position posCurtain
	function clearCurtain(ctx,posCurtain,height){
		ctx.beginPath();
		ctx.clearRect(posCurtain-5,0,10,height);
		ctx.clearRect(posCurtain-10,(height/2) -10,20,20);
		ctx.closePath();	
	}
	
	
},


//curtain comparaison
//show background image from the bottom to the top
verticalCurtain = function(img1,img2){
  
		
	//-------------------------------------------------//
	//	Variables 				   //
	//-------------------------------------------------//
	//size of image
	var width;
	var height;
	//canvas where the image will be copied
	var canvas;
	//context of the canvas
	var ctx;
	//imageData of the canvas
	var imageData;
	var data;
	//number of pixels in the canvas
	var nbPixels;
	var i;
	//position of the curtain
	var posCurtain;
	
	//-------------------------------------------------//
	//	Main function				   //
	//-------------------------------------------------//
	
	//store the size of the less broad image
	if($(img1).width()<$(img2).width()){
		width=$(img1).width();
		height=$(img2).height();
	}else{
		width=$(img2).width();
		height=$(img2).height();
		
	}
	
	//the first position of the curtain is on the middle of the picture
	posCurtain=height/2;
	
	//create canvas
	canvas=$('<canvas width="' + width +'" height="' +height+'"></canvas');
	//the background of the canvas is the first image
	canvas.css('background-image','url('+$(img1).attr('src')+')');
	canvas.css('background-size','100% 100%');
	ctx=canvas[0].getContext('2d');
	if(!ctx){
		throw Error("can not get canvas context");
	}	
	//copy the second image on the canvas
	ctx.drawImage(img2,0,0,img2.naturalWidth,img2.naturalHeight,0,0,width,height);
	
	//at over the curtain the second image is transparent
	//at below the curtain the second image is opaque
	imageData=ctx.getImageData(0,0,width,height);
	data=imageData.data;
	nbPixels=width*height;
	var j=0;
	for(i=0;i<(nbPixels*2);i+=4){
		data[i+3]=0;
		
	} 
	
	while(i<nbPixels*4){
		data[i+3]=255;
		i+=4
		
	}
	
	//draw the new picture on the canvas
	ctx.putImageData(imageData,0,0);
	
	//draw the curtain
	drawCurtain(ctx,posCurtain,width);
		
	//when the mouse move on the canvas redraw the curtain
	//and the second image
	canvas.mousemove(
		function(EventObject){
			ctx=canvas[0].getContext('2d');
			if(!ctx){
				throw Error("can not get canvas context");
			}
	
			//rub out curtain
			clearCurtain(ctx,posCurtain,width)
			//find the new position of curtain
			posCurtain=EventObject.pageY-canvas.offset().top;
			if(posCurtain>height-15){
				posCurtain=height-15;
			}
			if(posCurtain<15){
				posCurtain=15;
				
			}
			
			//at over the curtain the second image is transparent
			//at below the curtain the second image is opaque
			for(i=0;i<(nbPixels*4);i+=4){
				if(i<(posCurtain*width*4)){
					data[i+3]=0;
				}else{
					data[i+3]=255;
				}
		
			}
			
			
			//draw the new picture on the canvas
			ctx.putImageData(imageData,0,0);			
			
			//draw the curtain
			drawCurtain(ctx,posCurtain,width);

		}
	);
	return(canvas);
	
	
	//-------------------------------------------------//
	//	subfunctions				   //
	//-------------------------------------------------//
	
	//draw the curtain at the position posCurtain
	function drawCurtain(ctx,posCurtain,width){
		ctx.beginPath();
		ctx.fillStyle='rgba(102,102,102,0.75)';
		ctx.strokeStyle='rgb(255,255,255)'
		ctx.fillRect(0,posCurtain-5,width,10);
		ctx.strokeRect(0,posCurtain-5,width,10);
		
		ctx.fillStyle='rgb(102,102,102)';
		ctx.fillRect((width/2) -10,posCurtain-10,20,20);
		ctx.strokeRect((width/2) -10,posCurtain-10,20,20);
		
		ctx.closePath();

	}
	
	
	//rub out curtain at the position posCurtain
	function clearCurtain(ctx,posCurtain,width){
		ctx.beginPath();
		ctx.clearRect(0,posCurtain-5,width,10);
		ctx.clearRect((width/2) -10,posCurtain-10,20,20);
		ctx.closePath();	
	}	
	
	
	
}
