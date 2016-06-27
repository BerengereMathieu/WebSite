/*
 * This module contains some functions to select areas in a picture
 */
var selectAreaTools = {};

//variables 

//variables to know each selection tool is used 
selectAreaTools.rectangleSelectionWork=false; // box selection tool
selectAreaTools.polygonSelectionWork=false; // polygon selection tool
selectAreaTools.shapeSelectionWork=false; // shape free selection tool
selectAreaTools.componentsCanBeMoved=true; //user can move components
selectAreaTools.gridWork=false; // grid selection tool
selectAreaTools.suffixMin='row' 
selectAreaTools.zIndex=1; //z-index of the next layer

//return a html page with a canvas and several tools
//to select areas
selectAreaTools.main=function(){

	var test=selectAreaTools.testFunctionalities();
	if(test.error){
		$("body").children().remove();
		var error_msg1=$("<div><p>Il semble que votre navigateur ne possède pas les fonctionnalités nécessaires à l'éxecution de cette démo :(</p><img width='256px' src='../portfolio/images/Adoptfirefox.jpg'></div>");
		$("body").append(error_msg1);
		return;
	}
	//area to put all layers and canvas in place
	var selectionArea=$('<div></div>');
	var selectionAreaId='selectionArea';
	
	//area to put at the same place canvas and layer
	var layerContainer=$('<div></div>');
	var layerContainerId='layerContainer';
	var canvas;

	//convert the picture from image to canvas
	selectAreaTools.imageToCanvas($('#img0'));  
	canvas=$('#img0')[0];
	//create selectionArea
	//test id is free
	if($('#'+selectionAreaId).length>0){
		throw 'can not create selection area : id is not free';
	}
	selectionArea.attr('id',selectionAreaId);
	selectionArea.css('position','absolute');
	selectionArea.addClass("layerContainer");
	
	//the canvas is in the div but visually you see the div smaller
	//then the  canvas
	//so the size of div container must be change to correspond to 
	//the size of the canvas
	selectionArea.width(canvas.width+selectAreaTools.grid.spaceForCoordinates*2);
	selectionArea.height(canvas.height+selectAreaTools.grid.spaceForCoordinates*2);
	selectionArea.draggable();
	
	//create layer container
	//test id is free 
	if($('#'+layerContainerId).length>0){
		throw 'can not create layer container : id is not free';
	}
	layerContainer.attr('id',layerContainerId);
	layerContainer.css('position','relative');
	
	//put canvas in place
	$(canvas).css('position','absolute');
	//set z-index
	$(canvas).css('z-index',selectAreaTools.zIndex);
	//increment z-index for the next layer
	selectAreaTools.zIndex++;
	//set position 
	//let place to write coordinate of the grid when grid selection
	$(canvas).offset({left:selectAreaTools.grid.spaceForCoordinates,top:selectAreaTools.grid.spaceForCoordinates});
	layerContainer.append(canvas);
	
	//put layerContainer in selectionArea to put the set of layers in place
	selectionArea.append(layerContainer);
	//store selectionArea, layerContainer and canvas
	this.selectionArea=selectionArea;
	this.layerContainer=layerContainer;
	this.canvas=canvas;
	//at the moment there is not layer with a z-index greater than z-index of canvas
	this.highest=canvas;
	
	//create panel with selection tools
	this.aadEventHandlerToSelectionToolsBox();
	
	//create panel with layer miniatures
	this.createLayerToolBox();	
	
	//put selection area in place
	this.selectionAreaLeftPosition=$("#layersToolsBox").offset().left+$("#layersToolsBox").outerWidth(true)+20;
	this.selectionAreaTopPosition=10;
	selectionArea.offset({left:this.selectionAreaLeftPosition,top:this.selectionAreaTopPosition});	
	$('body').append(selectionArea);
	
	//create area to comment some selected areas
	selectAreaTools.createAreaForComment();
	
};

//test if the browser has all needed functionality
selectAreaTools.testFunctionalities=function(){
  var msgError='';
  var error=false;
    if(!Modernizr.canvas){
    	msgError=msgError+ "canvas not suppoted\n";
    	error=true;
    }
    
    
    if(!Modernizr.opacity){
    	msgError=msgError+ "opacity attribute not supported\n";
    	error=true;
    }
    
    if(!Modernizr.rgba){
    	msgError=msgError+ "rgba not supported\n";
    	error=true;
    }
    
    if(!Modernizr.multiplebgs){
    	msgError=msgError+ "rgba not supported\n";
    	error=true;
    }
    
    if(!Modernizr.backgroundsize){
    	msgError=msgError+ "background-size CSS attribute not supported\n";
    	error=true;
    }
          
    return({error:error,msgError:msgError});
};

//create a panel which contents some tools to select areas of image
selectAreaTools.aadEventHandlerToSelectionToolsBox=function(){
	
	//panel wich contents tools
	var selectionTools=$("#selectionToolsBox");
	var layersTools=$("#layersToolsBox");
	
	//to interact with buttons of the tools box
	var moveComponentsButton=$("#moveComponentsButton");
	var rectangleButton=$("#rectangleSelectionButton");
	var polygonButton=$("#polygonSelectionButton");
	var shapeButton=$("#shapeSelectionButton");
	var gridButton=$("#gridSelectionButton");
	
	
	//to interact with inputs to show and change number of rows and columns
	nbRows=$("#nbRowsInput");
	nbColumns=$("#nbColumnsInput");
	
	//canvas to handel event on the canvas
	//when a selection tool is used
	var canvas=this.canvas;
	var newHighest;
	if(!canvas){
		throw 'Canvas not found'
		return;
	}
	
	//tools box is draggable
	selectionTools.draggable();
	
	moveComponentsButton.click(function(click){
		if(selectAreaTools.componentsCanBeMoved){
			//component can not be moved
			selectAreaTools.componentsCanBeMoved=false;
			alert('Chose a type of sélection');
		}else{
			//component can be moved
			selectAreaTools.componentsCanBeMoved=true;
						
			//end selections 
			if(selectAreaTools.rectangleSelectionWork){
				//selection of rectangles is ended
				selectAreaTools.rectangleSelectionWork=false;
				//change look of the button
				rectangleButton.addClass('buttonNotSelected');
				rectangleButton.removeClass('buttonSelected');
				//remove event handler
				selectAreaTools.selectRectangles.removeEventHandler();
			}

			if(selectAreaTools.polygonSelectionWork){
				//selection of polygons is ended
				selectAreaTools.polygonSelectionWork=false;
				selectAreaTools.selectPolygons.removeEventActions();
				//change look of the button
				polygonButton.addClass('buttonNotSelected');
				polygonButton.removeClass('buttonSelected')
			}
			
			if(selectAreaTools.shapeSelectionWork){
				//selection of a shape is ended
				selectAreaTools.shapeSelectionWork=false;
				selectAreaTools.selectShapes.removeEventActions();
				//change look of the button
				shapeButton.addClass('buttonNotSelected');
				shapeButton.removeClass('buttonSelected');
			}
						
			if(selectAreaTools.gridWork){
				//selection of the grid is ended
				selectAreaTools.gridWork=false;
				selectAreaTools.grid.removeEventHandler();
				//change look of the button
				gridButton.addClass('buttonNotSelected');
				gridButton.removeClass('buttonSelected');
				selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');				
				$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			}
			
			///check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//components can be moved
			moveComponentsButton.addClass('buttonSelected');
			moveComponentsButton.removeClass('buttonNotSelected');
			$(selectAreaTools.selectionArea).draggable('enable');
			selectionTools.draggable('enable');
			layersTools.draggable('enable');
			
			
		}
		
	});
	
	//add event handler to select a rectangle
	rectangleButton.click(function(click){
		//now layers can be sorted by user
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');			
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		
		if(selectAreaTools.rectangleSelectionWork){
			//selection of rectangles is ended			
			//if any other selection is started drag and drop is enabled for layers
			if(!selectAreaTools.polygonSelectionWork&&!selectAreaTools.shapeSelectionWork&&!selectAreaTools.gridSelectionWork){				
				//components can be moved
				selectAreaTools.componentsCanBeMoved=true;
				moveComponentsButton.addClass('buttonSelected');
				moveComponentsButton.removeClass('buttonNotSelected');
				$(selectAreaTools.selectionArea).draggable('enable');
				selectionTools.draggable('enable');
				layersTools.draggable('enable');
				
			}			
			selectAreaTools.rectangleSelectionWork=false;
			
			//change look of the button
			rectangleButton.addClass('buttonNotSelected');
			rectangleButton.removeClass('buttonSelected');
			
			//remove event handler
			selectAreaTools.selectRectangles.removeEventHandler();
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			
		}else{
			//selection of rectangles start
			
			//disable drag and drop for components
			moveComponentsButton.addClass('buttonNotSelected');
			moveComponentsButton.removeClass('buttonSelected');
			$(selectAreaTools.selectionArea).draggable('disable');
			$(selectAreaTools.selectionArea).css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectionTools.draggable('disable');
			selectionTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			layersTools.draggable('disable');
			layersTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectAreaTools.componentsCanBeMoved=false;
			
			//end other selections 			
			if(selectAreaTools.polygonSelectionWork){
				//selection of polygons is ended
				selectAreaTools.polygonSelectionWork=false;
				selectAreaTools.selectPolygons.removeEventActions();
				//change look of the button
				polygonButton.addClass('buttonNotSelected');
				polygonButton.removeClass('buttonSelected')
			}			
			if(selectAreaTools.shapeSelectionWork){
				//selection of a shape is ended
				selectAreaTools.shapeSelectionWork=false;
				selectAreaTools.selectShapes.removeEventActions();
				//change look of the button
				shapeButton.addClass('buttonNotSelected');
				shapeButton.removeClass('buttonSelected');
			}						
			if(selectAreaTools.gridWork){
				//selection of the grid is ended
				selectAreaTools.gridWork=false;
				selectAreaTools.grid.removeEventHandler();
				//change look of the button
				gridButton.addClass('buttonNotSelected');
				gridButton.removeClass('buttonSelected');
				selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');				
				$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			}
			
			
			///check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//start rectangle selection
			selectAreaTools.rectangleSelectionWork=true;
			
			//change look of the button
			rectangleButton.addClass('buttonSelected');
			rectangleButton.removeClass('buttonNotSelected');
			
			selectAreaTools.selectRectangles.init();
			
		}
	});
	
	
	//add event handler to select a polygon	
	polygonButton.click(function(click){
		//now layers can be sorted by user
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');			
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		
		if(selectAreaTools.polygonSelectionWork){
			//selection of polygons is ended
			
			//if any other selection is started drag and drop is enabled for layers
			if(!selectAreaTools.rectangleSelectionWork&&!selectAreaTools.shapeSelectionWork&&!selectAreaTools.gridSelectionWork){				
				//components can be moved
				selectAreaTools.componentsCanBeMoved=true;
				moveComponentsButton.addClass('buttonSelected');
				moveComponentsButton.removeClass('buttonNotSelected');
				$(selectAreaTools.selectionArea).draggable('enable');
				selectionTools.draggable('enable');
				layersTools.draggable('enable');
			}
			
			selectAreaTools.polygonSelectionWork=false;
			selectAreaTools.selectPolygons.removeEventActions();
			//change look of the button
			polygonButton.addClass('buttonNotSelected');
			polygonButton.removeClass('buttonSelected');
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
		}else{	
			//selection of polygons begins		
			
			//disable drag and drop for components
			moveComponentsButton.addClass('buttonNotSelected');
			moveComponentsButton.removeClass('buttonSelected');
			$(selectAreaTools.selectionArea).draggable('disable');
			$(selectAreaTools.selectionArea).css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectionTools.draggable('disable');
			selectionTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			layersTools.draggable('disable');
			layersTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectAreaTools.componentsCanBeMoved=false;
			
			//end other selections 			
			if(selectAreaTools.rectangleSelectionWork){
				//selection of rectangle is ended
				selectAreaTools.rectangleSelectionWork=false;
				//change look of the button
				rectangleButton.addClass('buttonNotSelected');
				rectangleButton.removeClass('buttonSelected');
			
				//remove event handler
				selectAreaTools.selectRectangles.removeEventHandler();
			}			
			if(selectAreaTools.shapeSelectionWork){
				//selection of a shape is ended
				selectAreaTools.shapeSelectionWork=false;
				selectAreaTools.selectShapes.removeEventActions();
				//change look of the button
				shapeButton.addClass('buttonNotSelected');
				shapeButton.removeClass('buttonSelected');
			}
						
			if(selectAreaTools.gridWork){
				//selection of the grid is ended
				selectAreaTools.gridWork=false;
				selectAreaTools.grid.removeEventHandler();
				//change look of the button
				gridButton.addClass('buttonNotSelected');
				gridButton.removeClass('buttonSelected');
				selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');				
				$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			}
			
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//start shape selection
			selectAreaTools.polygonSelectionWork=true;			
			//if no more layer : use canvas to handel events			
			selectAreaTools.selectPolygons.init();
			//change look of the button
			$(this).addClass('buttonSelected');
			$(this).removeClass('buttonNotSelected');
		}
	})
		
	//add event handler to the button to select a shape
	shapeButton.click(function(click){
		//now layers can be sorted by user
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');			
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		
		if(selectAreaTools.shapeSelectionWork){
			//selection of free shapes is ended
						
			//if any other selection is started drag and drop is enabled for layers
			if(!selectAreaTools.rectangleSelectionWork&&!selectAreaTools.polygonSelectionWork&&!selectAreaTools.gridSelectionWork){
				//components can be moved
				moveComponentsButton.addClass('buttonSelected');
				moveComponentsButton.removeClass('buttonNotSelected');
				$(selectAreaTools.selectionArea).draggable('enable');
				selectionTools.draggable('enable');
				layersTools.draggable('enable');
				selectAreaTools.componentsCanBeMoved=true;
			}
			
			selectAreaTools.shapeSelectionWork=false;
			selectAreaTools.selectShapes.removeEventActions();
			//change look of the button
			shapeButton.addClass('buttonNotSelected');
			shapeButton.removeClass('buttonSelected');
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
		}else{
			//selection of shapes begins		
							
			//disable drag and drop for components
			moveComponentsButton.addClass('buttonNotSelected');
			moveComponentsButton.removeClass('buttonSelected');
			$(selectAreaTools.selectionArea).draggable('disable');
			$(selectAreaTools.selectionArea).css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectionTools.draggable('disable');
			selectionTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			layersTools.draggable('disable');
			layersTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectAreaTools.componentsCanBeMoved=false;
					
			//end other selections 			
			if(selectAreaTools.rectangleSelectionWork){
				//selection of rectangles is ended
				selectAreaTools.rectangleSelectionWork=false;
				//change look of the button
				rectangleButton.addClass('buttonNotSelected');
				rectangleButton.removeClass('buttonSelected');			
				//remove event handler
				selectAreaTools.selectRectangles.removeEventHandler();
			}

			
			if(selectAreaTools.polygonSelectionWork){
				//selection of polygons is ended
				selectAreaTools.polygonSelectionWork=false;
				selectAreaTools.selectPolygons.removeEventActions();
				//change look of the button
				polygonButton.addClass('buttonNotSelected');
				polygonButton.removeClass('buttonSelected')
			}
			
			if(selectAreaTools.gridWork){
				//selection of grid is ended
				selectAreaTools.gridWork=false;
				selectAreaTools.grid.removeEventHandler();
				//change look of the button
				gridButton.addClass('buttonNotSelected');
				gridButton.removeClass('buttonSelected');				
				selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');
				$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			}
			
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//start selection of free shapes
			selectAreaTools.shapeSelectionWork=true;
			//init will remove previous handlers to avoir conflict between handlers		
			selectAreaTools.selectShapes.init();
			//change look of the button
			shapeButton.addClass('buttonSelected');
			shapeButton.removeClass('buttonNotSelected');
		}
	});
	
	
	//add event handler to select area thanks to a grid
	gridButton.click(function(click){
		//now layers can be sorted by user
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');			
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		
		if(selectAreaTools.gridWork){
			//remove grid 
			
			//if any other selection is started drag and drop is enabled for layers
			if(!selectAreaTools.rectangleSelectionWork&&!selectAreaTools.polygonSelectionWork&&!selectAreaTools.shapeSelectionWork){				
				//components can be moved
				moveComponentsButton.addClass('buttonSelected');
				moveComponentsButton.removeClass('buttonNotSelected');
				$(selectAreaTools.selectionArea).draggable('enable');
				selectionTools.draggable('enable');
				layersTools.draggable('enable');
				selectAreaTools.componentsCanBeMoved=true;
			}
			
			selectAreaTools.gridWork=false;
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//change the look of the button
			gridButton.addClass('buttonNotSelected');
			gridButton.removeClass('buttonSelected');
			
			//stop the action handler of the grid
			selectAreaTools.grid.removeEventHandler();
			selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');
			$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		}else{	
			//selection thanks to a grid start		
			
			//disable drag and drop for components
			moveComponentsButton.addClass('buttonNotSelected');
			moveComponentsButton.removeClass('buttonSelected');
			$(selectAreaTools.selectionArea).draggable('disable');
			$(selectAreaTools.selectionArea).css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectionTools.draggable('disable');
			selectionTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			layersTools.draggable('disable');
			layersTools.css("opacity",1);//because JQuery-UI object draggable change opacity when draggable is disable
			selectAreaTools.componentsCanBeMoved=false;
			
			selectAreaTools.createLayerToolBox.listOfLayer.sortable('disable');		
			$('#sortInformation').css('color','red').text('Calques non déplaçables');
			
			
			//end other selections			
			if(selectAreaTools.rectangleSelectionWork){
				//selection of rectangles is ended
				selectAreaTools.rectangleSelectionWork=false;
				//change look of the button
				rectangleButton.addClass('buttonNotSelected');
				rectangleButton.removeClass('buttonSelected');
			
				//remove event handler
				selectAreaTools.selectRectangles.removeEventHandler();
			}

			
			if(selectAreaTools.polygonSelectionWork){
				//stop the selection of polygons
				selectAreaTools.polygonSelectionWork=false;
				//remove event handler for polygon selection
				selectAreaTools.selectPolygons.removeEventActions();
				//change the look of the button 
				polygonButton.addClass('buttonNotSelected');
				polygonButton.removeClass('buttonSelected')
			}
			
			if(selectAreaTools.shapeSelectionWork){
				//stop the selection of free shapes
				selectAreaTools.shapeSelectionWork=false;
				//remove event handler for selection of shape
				selectAreaTools.selectShapes.removeEventActions();
				//change the look of the button 
				shapeButton.addClass('buttonNotSelected');
				shapeButton.removeClass('buttonSelected');
			}			
			
			//check there is no useless layer	
			newHighest=selectAreaTools.canvas;	
			$('.layer').each(function(index,value){
				if($('#'+value.id+selectAreaTools.suffixMin).length===0){
					$(value).remove();
				}else{
					if($(value).css("z-index")>$(newHighest).css("z-index")){
						newHighest=value;
					}	
				}
			})
			selectAreaTools.highest=newHighest;
			
			//check the number of rows and columns
			if(isNaN(nbRows.attr('value'))){
				alert("not a number : give a integer greater than 0");
				return;
			}else{
				if(nbRows.attr('value')<=0){
					alert("lower than or equals to 0: give a integer greater than 0");
					return;
				}
			}
			//selection thanks to a grid work
			selectAreaTools.gridWork=true;	
			//change the look of the button		
			gridButton.addClass('buttonSelected');
			gridButton.removeClass('buttonNotSelected');
			//draw the grid
			selectAreaTools.grid.drawGrid(canvas,nbRows.attr('value'),nbColumns.attr('value'),'containerCanvas');
		}
	});
	
		
	//add event handlers to create a tool to change number of rows;
	//this tool contain two button (+ and -)
	//and an input to show and directly change
	//the number of rows
	var lastNumberOfRows=10;
	//button to add a row
	//nbRowsPlus button is used to increment number of rows
	$("#nbRowsPlusButton").click(function(click){		
		if(selectAreaTools.grid.selectedCases.length>0){
			alert("can not redraw grid during a selection");
			return
		}
		selectAreaTools.grid.nbRows++;
		nbRows.attr('value',selectAreaTools.grid.nbRows);
		if(selectAreaTools.gridWork){
			selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
			
		}
		
	});	

	//button to remove a row
	//nbRowsMinus is used to reduce number of rows
	$("#nbRowsMinusButton").click(function(click){		
		if(selectAreaTools.grid.selectedCases.length>0){
			alert("can not redraw grid during a selection");
			return
		}
		if(selectAreaTools.grid.nbRows> 1){
			selectAreaTools.grid.nbRows--;
			nbRows.attr('value',selectAreaTools.grid.nbRows);
			if(selectAreaTools.gridWork){
				selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
			}
		}
		
	});
	
	//input to show and modify the number of rows
	nbRows.attr('value',selectAreaTools.grid.nbRows)
	//nbRows input is used to show or change number of rows
	nbRows.change(function(event){
		
		if(selectAreaTools.grid.selectedCases.length>0){
			nbRows.attr('value',selectAreaTools.grid.nbRows);
			alert("can not redraw grid during a selection");
			return
		}
		//test if the value of this input is correct
		if(isNaN(nbRows.attr('value'))){
			nbRows.attr('value',selectAreaTools.grid.nbRows);
			alert("not a number : give a integer greater than 0");
			return;
		}else{
			if(nbRows.attr('value')<=0){
			nbRows.attr('value',selectAreaTools.grid.nbRows);
				alert("lower than or equals to 0: give a integer greater than 0");
				return;
			}
			if(selectAreaTools.gridWork){
				selectAreaTools.grid.nbRows=nbRows.attr('value');
				selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
			}
		}
	});
	
	//button to add a column
	//nbColumnsPlus button is used to increment number of columns
	$("#nbColumnsPlusButton").click(function(click){
		if(selectAreaTools.grid.selectedCases.length>0){
			alert("can not redraw grid during a selection");
			return
		}
		selectAreaTools.grid.nbColumns++;
		nbColumns.attr('value',selectAreaTools.grid.nbColumns);
		if(selectAreaTools.gridWork){
			selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
		}
		
	});	
	
	//button to remove a column
	//nbColumnsMinus is used to reduce number of column
	$("#nbColumnsMinusButton").click(function(click){
		if(selectAreaTools.grid.selectedCases.length>0){
			alert("can not redraw grid during a selection");
			return
		}
		if(selectAreaTools.grid.nbColumns>1){
			selectAreaTools.grid.nbColumns--;
			nbColumns.attr('value',selectAreaTools.grid.nbColumns);
			if(selectAreaTools.gridWork){
				selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
			}
			
		}
		
	});
	//input to show and modify the number of columns
	nbColumns.attr('value',selectAreaTools.grid.nbRows);
	//nbColumns input is used to show or change number of columns
	nbColumns.change(function(event){
		//test if the value of this input is correct
		if(selectAreaTools.grid.selectedCases.length>0){
			nbColumns.attr('value',selectAreaTools.grid.nbColumns);
			alert("can not redraw grid during a selection");
			return
		}
		if(isNaN(nbColumns.attr('value'))){
			nbColumns.attr('value',selectAreaTools.grid.nbColumns);
			alert("not a number : give a integer greater than 0");
			return;
		}else{
			if(nbColumns.attr('value')<=0){
			nbColumns.attr('value',selectAreaTools.grid.nbColumns);
				alert("lower than or equals to 0: give a integer greater than 0");
				return;
			}
			if(selectAreaTools.gridWork){
				selectAreaTools.grid.nbColumns=nbRows.attr('value');
				selectAreaTools.grid.redrawGrid(nbRows.attr('value'),nbColumns.attr('value'));
			}
		}
	});
	
	//add event handler to the button to save a selection	
	$("#gridSaveSelectionButton").click(function(click){
		selectAreaTools.grid.saveGrid();
	})
	
	
	
};

//create an area to comment some areas selected
//at the begining this area is hidded
//when the user click on specific button
//this area is showed 
selectAreaTools.createAreaForComment=function(){
	//panel wich contents tools
	var form=$("<form></form>");
	var fieldsetid;	
	//position of the tools box
	var leftForm;
	var topForm;
	var formId='areaForComment';
	var formWidh=500;
	var cancelButton=$('<input type="button" value="close"></input>');
	var resetButton=$('<input type="button" value="reset"></input>');
	
	//test if id is free
	if($('#'+formId).length>0){
		throw 'Can not create area for comments : id is not free';
		return;
	}
	
	//the input for the text of the user
	var areaForComment=$('<textarea></textarea>')
	
	//the position of the canvas is necessery
	//to put in place the component
	var canvas=selectAreaTools.canvas;
	if(!canvas){
		throw 'Canvas not found'
		return;
	}
	//create the tools box
	form.attr('id',formId);
	$(form).addClass('elegant');
	$(form).width(formWidh);
	
	//calculate position thanks to canvas position
	leftForm=$(selectAreaTools.selectionArea).offset().left + ($(canvas).width()/4);
	topForm=$(selectAreaTools.selectionArea).offset().top + ($(canvas).height()/4);
	
	//put tools box in place
	$(form).css("position", "absolute");
	$(form).offset({
		left : leftForm,
		top : topForm
	});
	$('body').append($(form));
	
	//user can move this component
	$(form).draggable();
	
	//at the beginning this component is hidded
	$(form).css('opacity',0);
	$(form).css('z-index',0);
	selectAreaTools.areaForComment=$(form);
	
	//create a specific area for title of the form
	fieldsetid='fieldset'+formId;
	$(form).prepend('<fieldset id="'+ fieldsetid + '"> Comment </fieldset>');
	
	
	//create area for comment
	areaForComment.attr('cols',50);
	areaForComment.attr('rows',20);
	$(form).append(areaForComment);
	selectAreaTools.areaForCommentInput=areaForComment;	
	
	//for esthetic reasons
	$(form).append($('<br></br>'));
	
	
	//add button to cancel coment
	$(form).append(cancelButton);
	selectAreaTools.areaForCommentCancelButton=cancelButton;
	
	//add button to clear the text 
	$(form).append(resetButton);
	selectAreaTools.areaForCommentResetButton=resetButton;
	
};

//create tool box for handel layers
//each layer has a title,a miniature and some buttons
//to hide it, remove it and link it with comment
selectAreaTools.createLayerToolBox=function(){
	//panel which contains views of layers
	var removeLayerButton=$("#removeLayersButton");
	var listOfLayer;
	
	//to inform user if he can or can not sort layers
	var sortInformation=$("#sortInformation");
	
	
	var selectionArea=this.selectionArea;
	if(!selectionArea){
		throw 'selectionArea not found'
		return;
	}
	
	//button to hide initial image
	var selectAll=$("#selectAllButton");
	var allSelected=false;
	//canvas position is need to put
	//the tools box in place
	var canvas=this.canvas;
	if(!canvas){
		throw 'selectionArea not found'
		return;
	}
	
	var layersToolsBox=$('#layersToolsBox');
	layersToolsBox.draggable();
	
	
	//add a button to delete some layers
	removeLayerButton.click(function(click){
		var toRemove=selectAreaTools.selectedLayers;
		var id;
		var eventSupport;
		var zIndex;
		
		//user can not remove a layer if a selection is not ended
		if(selectAreaTools.selectShapes.trace){
			alert("Can not delete layers : selection of a shape is not ended");
			return;
		}
		//user can not remove a layer if a selection is not ended
		if(selectAreaTools.selectPolygons.trace){
			alert("Can not delete layers : selection of a polygon is not ended");
			return;
		}
		
		if(selectAreaTools.selectRectangles.trace){
			alert("Can not delete layers : selection of a rectangle is not ended");
			return;
		}
		
		for(id in toRemove){
			//delete layer
			if(toRemove[id].activate){ //layer must be removed
				selectAreaTools.removeMiniatureLayer(id);
				//delete miniature of layer
				selectAreaTools.removeLayer(id);
				//remove all informations about this layer 
				delete toRemove[id]; 
				delete selectAreaTools.layerToHide[id];
				delete selectAreaTools.layerComments[id];
			}
		}
		
		
		//if no more layer : use canvas to handel events
		eventSupport=$(selectAreaTools.canvas);
		//search layer with maximun z-index
		for(id in toRemove){
			noLayer=false; 
			zIndex=$('#'+id).css("z-index");
			if(zIndex>eventSupport.css("z-index")){
				eventSupport=$('#'+id);
			}
		}
		//set the new highest layer (if there is no more layer it is the canvas)
		selectAreaTools.highest=eventSupport[0];
		
		if(selectAreaTools.polygonSelectionWork){
			//selection of polygons is working			
			//restart events handled
			selectAreaTools.selectPolygons.init();
			
		}
		
		if(selectAreaTools.shapeSelectionWork){
			//selection of shape is working
			//restart events handled			
			selectAreaTools.selectShapes.init();
		}
			
			
		if(selectAreaTools.rectangleSelectionWork){
			//selection of rectangle is working
			//restart events handled
			selectAreaTools.selectRectangles.init();
		}
		
		
	});
	

	
	
	//add  a button to hide initial image
	selectAll.click(function(click){
		if(allSelected){
			//deselect all layers
			allSelected=false;
			for(id in selectAreaTools.selectedLayers){
				selectAreaTools.selectedLayers[id].activate=false;
				selectAreaTools.selectedLayers[id].buttonJQ.css('background-image','none');
			}
			selectAll.attr('value','Select All');
		}else{
			//select all layer
			allSelected=true;
			for(id in selectAreaTools.selectedLayers){
				selectAreaTools.selectedLayers[id].activate=true;
				selectAreaTools.selectedLayers[id].buttonJQ.css('background-image','url("../portfolio/images/delete-icon.png")');
			}
			selectAll.attr('value','Deselect All');
		}
	});
	//add container for miniatures of layer
	listOfLayer=$('#listOfMiniatureLayers');
	//make rows of the table sortable
	listOfLayer.sortable(
		{
			stop: function(event, ui){
				var zindex=selectAreaTools.zIndex-1;
				var target=event.target;
				var miniatures=$(target).children();
				var layerId;
				
				for(var i=0;i<miniatures.length;i++){
					var miniatureId=miniatures[i].id;
					
					if(miniatureId){
						layerId=miniatureId.split(selectAreaTools.suffixMin)[0];
						$('#'+layerId).css('z-index',zindex);
						zindex--;
					}else{
						throw 'miniatureId not found';
					}
					
					if(i===0){
						
						if(selectAreaTools.polygonSelectionWork){
							//selection of polygons is working			
							//remove previous event handler to avoid conflit between handlers
							//and avoid a same handler is added several times 		
							$('#'+layerId).unbind('click');
							//add new event handler
							$('#'+layerId).on('click',selectAreaTools.selectPolygons.firstClickAction);
							selectAreaTools.selectPolygons.firstPolygon=true;			
						}
		
						if(selectAreaTools.shapeSelectionWork){
						//selection of shape is working
						//resort events handled			
							selectAreaTools.selectShapes.init();
							selectAreaTools.selectShapes.firstShape=true;
						}
						
						selectAreaTools.highest=$('#'+layerId)[0];
			
					}else{		
						//remove event handler to avoid conflit between handlers
						//and avoid a same handler is added several times 			
						$('#'+layerId).unbind('click');
						$('#'+layerId).unbind('mousemove');
					}				
				}
				
			}
		});
	//add header of table
	selectAreaTools.createLayerToolBox.listOfLayer=listOfLayer;
	
	//finish to create panel to manage layers
	selectAreaTools.addHandlerToInitialImage();
	
};

//add a new layer
selectAreaTools.addLayer=function(id){	
	var canvas=selectAreaTools.canvas;
	var layerContainer=selectAreaTools.layerContainer;
	var layer=document.createElement('canvas');
	$(layer).attr('id',id);
	$(layer).addClass('layer');
	layer.setAttribute('width', canvas.width);
	layer.setAttribute('height',canvas.height);
	
	$(layer).css("position",'absolute');
	$(layer).css("z-index",selectAreaTools.zIndex);
	selectAreaTools.zIndex++;
	$(layer).offset({left:selectAreaTools.grid.spaceForCoordinates,top:selectAreaTools.grid.spaceForCoordinates});
	
	layerContainer.append(layer);
	return(layer);
};
selectAreaTools.addGridLayer=function(id){	
	var canvas=selectAreaTools.canvas;
	var layerContainer=selectAreaTools.layerContainer;
	var layer=document.createElement('canvas');
	$(layer).attr('id',id);
	$(layer).addClass('layer');
	layer.setAttribute('width', canvas.width+selectAreaTools.grid.spaceForCoordinates*2);
	layer.setAttribute('height',canvas.height+selectAreaTools.grid.spaceForCoordinates*2);
	$(layer).css("position",'absolute');
	$(layer).css("z-index",selectAreaTools.zIndex);
	selectAreaTools.zIndex++;
	$(layer).offset({left:0,top:0});
	
	layerContainer.append(layer);
	return(layer);
};
//to stock layers id and know layers which will must be deleted
selectAreaTools.selectedLayers={};
selectAreaTools.layerToHide={};
selectAreaTools.layerComments={};

//create a component to interact with all layers
selectAreaTools.addHandlerToInitialImage=function(){
	var hideCheckBox=$('#hideInitialImage');	
	var initialImageHiden=false;
	
		
	hideCheckBox.click(function(event){
		if(initialImageHiden){
			initialImageHiden=false;
			//show initial image	
			hideCheckBox.css('background-image','url("../portfolio/images/eye-icon.jpg")');	
			$(selectAreaTools.canvas).css('opacity',1);
		}else{
			initialImageHiden=true;
			//hide initial image
			hideCheckBox.css('background-image','none');			
			$(selectAreaTools.canvas).css('opacity',0);
		}
	});

	
};

//add a new layer miniature in the tool box for layer
//layerId is the id of the layer linked to the miniature
selectAreaTools.addMiniatureLayer=function(miniature,layerId){
	var listOfLayer=selectAreaTools.createLayerToolBox.listOfLayer;
	var table=$('<Table></Table>');
	var container=$('<TR></TR>');	
	var hideCheckBox=$('<input type="button"/>');
	var checkedButton=$('<input type="button"/>');	
	var removeChecked=true;	
	var commentTool=$("<input type='button'/>");
	var commentToolChecked=true;
	var miniatureCell=$('<TD></TD>');
	table.attr("id",layerId+selectAreaTools.suffixMin);
	//resize miniature
	var initialWidth=miniature.width;
	var initialHeight=miniature.height;
	
	$(miniature).css('background-color','white');
	miniature.style.width='100px';
	miniature.style.height=((initialHeight/initialWidth)*100)+'px'
	miniatureCell.append(miniature);
	
	//to store id of layer and know if the layer 
	//must be deleted or hidded
	selectAreaTools.selectedLayers[layerId]={activate:false,buttonJQ:checkedButton};
	selectAreaTools.layerToHide[layerId]={activate:false,buttonJQ:hideCheckBox};
	
	//to hide a specific layer	
	hideCheckBox.addClass("layerButton");
	hideCheckBox.css('background','url("../portfolio/images/eye-icon.jpg")');
	hideCheckBox.css('background-size','30px');
	
	
	hideCheckBox.click(function(event){		
		if(!selectAreaTools.layerToHide[layerId].activate){
			selectAreaTools.layerToHide[layerId].activate=true
			hideCheckBox.css('background-image','none');
			hideCheckBox.css('background-color','#ffffff');
			$('#'+layerId).css("opacity",0);
			
			
		}else{
			hideChecked=true;	
			hideCheckBox.css('background-image','url("../portfolio/images/eye-icon.jpg")');	
			$('#'+layerId).css("opacity",1);
			selectAreaTools.layerToHide[layerId].activate=false;
		}
	});
	hideCheckBox.wrap('<TR></TR>');
	
	
	
	checkedButton.addClass("layerButton");
	checkedButton.css('background-image','none');
	checkedButton.css('background-size','30px');
	checkedButton.click(function(event){
		if(!selectAreaTools.selectedLayers[layerId].activate){
			checkedButton.css('background-image','url("../portfolio/images/delete-icon.png")');
			selectAreaTools.selectedLayers[layerId].activate=true;
		}else{	
			checkedButton.css('background-image','none');
			selectAreaTools.selectedLayers[layerId].activate=false;
		}
	});
	
	commentTool.addClass("layerButton");
	commentTool.css('background-image','url("../portfolio/images/stylo.jpg")');	
	commentTool.css('background-size','30px');
	commentTool.click(function(event){
		if(commentToolChecked){
			commentToolChecked=false;
			$('canvas').each(
				function(index,value){
					if($(value).hasClass('layer')){
						if(value.id!==layerId){
							$(value).css('opacity',0);
						}else{
							$(value).css('opacity',1);
						}
					}
				}
				
			);
			$(selectAreaTools.canvas).css('opacity',0.5);
			selectAreaTools.areaForComment.css('opacity',1);
			selectAreaTools.areaForComment.css('z-index',selectAreaTools.zIndex+1);
			//calculate position thanks to initial image position
			selectAreaTools.areaForComment.offset({left:($(selectAreaTools.selectionArea).offset().left + ($(selectAreaTools.canvas).width()/4)),top:($(selectAreaTools.selectionArea).offset().top + ($(selectAreaTools.canvas).height()/4))});
			if(selectAreaTools.layerComments[layerId]){
				selectAreaTools.areaForCommentInput.attr('value',selectAreaTools.layerComments[layerId]);
			}else{
				selectAreaTools.areaForCommentInput.attr('value',layerId);
			}
			
			
			//remove previous event handler to avoid conflit between handlers
			//and avoid a same handler is added several times 
			selectAreaTools.areaForCommentCancelButton.unbind('click');
			//events handler
			//if cancel is clicked close the window
			selectAreaTools.areaForCommentCancelButton.click(function(click){
				commentToolChecked=true;
				$('canvas').each(
					function(index,value){
						if($(value).hasClass('layer')){
							if(value.id in selectAreaTools.layerToHide ){
								if(selectAreaTools.layerToHide[value.id].activate){
									$(value).css('opacity',0);
								}else{
									$(value).css('opacity',1);								
								}
							}else{
								$(value).css('opacity',1);
							}
						}
					}				
				);				
				$(selectAreaTools.canvas).css('opacity',1);
				selectAreaTools.areaForComment.css('opacity',0);
				selectAreaTools.areaForComment.css('z-index',0);
			});
			
			//remove previous event handler to avoid conflit between handlers
			//and avoid a same handler is added several times 
			selectAreaTools.areaForCommentSaveButton.unbind('click');
			//if save is clicked save the comment
			selectAreaTools.areaForCommentSaveButton.click(function(click){
				selectAreaTools.layerComments[layerId]=selectAreaTools.areaForCommentInput.attr('value');
				selectAreaTools.saveSelectedRegions.setLabel(layerId,selectAreaTools.layerComments[layerId]);
			});
			//remove previous event handler to avoid conflit between handlers
			//and avoid a same handler is added several times
			selectAreaTools.areaForCommentResetButton.unbind('click');			
			//if reset is clicker remove the text
			selectAreaTools.areaForCommentResetButton.click(function(click){
				selectAreaTools.areaForCommentInput.attr('value','');
			});
			
		}else{
			commentToolChecked=true;
			$('canvas').each(
				function(index,value){
					if($(value).hasClass('layer')){	
						if(value.id in selectAreaTools.layerToHide){				
							if(selectAreaTools.layerToHide[value.id].activate){
								$(value).css('opacity',0);
							}else{
								$(value).css('opacity',1);
								
							}
						}else{
							$(value).css('opacity',1);
						}
					}
				}
				
			);
			$(selectAreaTools.canvas).css('opacity',1);
			selectAreaTools.areaForComment.css('opacity',0);
			selectAreaTools.areaForComment.css('z-index',0);
		}
	});
	
	//add cells to the new row
	container.append(miniatureCell);
	container.append(hideCheckBox);
	container.append(checkedButton);
	container.append(commentTool);
	table.append(container);
	listOfLayer.prepend(table);
};

//remove a miniature of a specific layer
selectAreaTools.removeMiniatureLayer=function(layerId){
	var id=layerId+selectAreaTools.suffixMin;
	$('#'+id).remove();
};
//remove a layer miniature in the tool box for layer
selectAreaTools.removeLayer=function(layerId){
	$('#'+layerId).remove();
};

selectAreaTools.saveSelectedRegions={
	saveObject:{},
	path:"path",
	name:"selectedRegion",
	newRegion:function(id){
		var date=new Date();
		this.saveObject[id]={path:this.path+this.name+date.getTime(),label:''};
	},
	setLabel:function(id,label){		
		this.saveObject[id].label=label;
	},
	print:function(){
		var res='';
		for(id in this.saveObject){
			res=res+"id : " + id;
			res=res+" path : " + this.saveObject[id].path;
			res=res+" label : " + this.saveObject[id].label+'\n';
		}
		alert(res);
	}
}
//To select rectangle area of the initial images
selectAreaTools.selectRectangles={
	firstClick:true,
	rectangleInformation:{},
	rectangleId:0,
	trace:false,
	init:function(){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectRectangles;
		
		//remove previous event handler to avoid conflit between handlers
		//and avoid a same handler is added several times	
		$(selectAreaTools.highest).unbind('click');
		//add event handler on the highest layer
		$(selectAreaTools.highest).on('click',parent.selectRectangle);
		
		parent.firstClick=true;
		parent.rectangleInformation={};
	},
	removeEventHandler:function(){
		
		//remove event handler on the highest layer
		$(selectAreaTools.highest).off('click');
		
		parent.firstClick=true;
		parent.rectangleInformation={};
		parent.trace=false;
	},
	selectRectangle:function(click){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectRectangles;
		//to draw polygon on the canvas
		var initialImage=selectAreaTools.canvas;
		var ctxInitialImage;
		var imageData;
		//to draw on the layer
		var layer;
		var ctxLayer;
		//to know the cursor position on the canvas (and not on the document)
		var posX=click.pageX-$(initialImage).offset().left;
		var posY=click.pageY-$(initialImage).offset().top;
		//to create a miniature of layer
		var miniature;
		var ctxMiniature;
				
		if(parent.firstClick){
			parent.firstClick=false;
			parent.trace=true;
			//user can not sort layer during selection of a rectangle 
			selectAreaTools.createLayerToolBox.listOfLayer.sortable('disable');
			$('#sortInformation').css('color','red').text('Calques non déplaçables');
			
			//store position of rectangle
			parent.rectangleInformation.x=posX;
			parent.rectangleInformation.y=posY;
			
			//create a new layer
			layer=selectAreaTools.addLayer('rectangle'+parent.rectangleId);	
			//increment id for the next rectangle
			parent.rectangleId++;			
			//remove event handler on the current highest layer
			$(selectAreaTools.highest).off('click');
			selectAreaTools.highest=layer;		
			//add event handler on the new highest layer
			$(selectAreaTools.highest).on('click',parent.selectRectangle);
			
			//activate event handler to show rectangle when mouse move
			$(selectAreaTools.highest).on('mousemove',parent.showRectangle);
		}else{
			
			//remove event handler to show rectangle when mouse move
			$(selectAreaTools.highest).off('mousemove');
			

			//calculate width and height of the rectangle;
			parent.rectangleInformation.width=Math.abs(posX-parent.rectangleInformation.x);
			parent.rectangleInformation.height=Math.abs(posY-parent.rectangleInformation.y);
			
			//find cordinates to the first point of the rectangle)
			if(parent.rectangleInformation.x<posX){
				posX=parent.rectangleInformation.x;
			}
			if(parent.rectangleInformation.y<posY){
				posY=parent.rectangleInformation.y;
			}
			
			//get rectangle of selection in iniatial image
			ctxInitialImage=initialImage.getContext('2d');
			if(!ctxInitialImage){
				throw 'rectangles selection : can not found context of initial image'
			}
			
			imageData=ctxInitialImage.getImageData(posX,posY,parent.rectangleInformation.width,parent.rectangleInformation.height);
			
			//put the result on the layer
			layer=selectAreaTools.highest;
			ctxLayer=layer.getContext('2d');
			if(!ctxLayer){
				throw 'rectangles selection : can not found context of current layer'
			}
			
			//clear the layer
			ctxLayer.clearRect(0,0,layer.width,layer.height);
			//put selected rectangle of initial image to the layer
			ctxLayer.putImageData(imageData,posX,posY);
			
			//add miniature to layer tools box
			//create miniature
			miniature=document.createElement('canvas');
			miniature.width=layer.width;
			miniature.height=layer.height;	
		    $(miniature).css("background-color","white");
			
			//copy polygon
			ctxMiniature=miniature.getContext("2d");
			if(!ctxMiniature){
				throw 'rectangles selection : Miniature context not found';
			}
			ctxMiniature.putImageData(imageData,parent.rectangleInformation.x,parent.rectangleInformation.y);
			selectAreaTools.addMiniatureLayer(miniature,layer.id);
			//save path of selected region			
			selectAreaTools.saveSelectedRegions.newRegion(layer.id);
			
			//now user can sort layers
			selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');
			$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			
			parent.firstClick=true;
			parent.rectangleInformation={};
			parent.trace=false;
		}
		
	},
	showRectangle:function(event){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectRectangles;
		var width;
		var height;	
		var initialImage=selectAreaTools.canvas;	
		//to know the cursor position on the canvas (and not on the document)
		var posX=event.pageX-$(initialImage).offset().left;
		var posY=event.pageY-$(initialImage).offset().top;
		//to draw on the layer
		var layer;
		var ctxLayer;

		layer=selectAreaTools.highest;
		ctxLayer=layer.getContext('2d');
		if(!ctxLayer){
			throw 'rectangles selection : can not found context of current layer'
		}
		width=Math.abs(parent.rectangleInformation.x-posX);
		height=Math.abs(parent.rectangleInformation.y-posY);
		//find cordinates to the first point of the rectangle)
		if(parent.rectangleInformation.x<posX){
			posX=parent.rectangleInformation.x;
		}
		if(parent.rectangleInformation.y<posY){
			posY=parent.rectangleInformation.y;
		}
		//clear the layer
		ctxLayer.clearRect(0,0,layer.width,layer.height);
		//draw the new rectangle
		ctxLayer.strokeRect(posX,posY,width,height);
	}
};

//Draw a grid on the canvas and select some cases of this grid 
selectAreaTools.grid={
	nbRows:10,
	nbColumns:10,
	//position of beginning of each row
	idRows:[],
	//position of beginning of each columns 
	idColumns:[],
	selectedCases:[],
	nbGrid:0,
	spaceForCoordinates:20, //space at left and on the top to write coordinate of each case
	//end correctly the grid selection 
	removeEventHandler:function(){		
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		parent.removeGrid();
		parent.selectedCases=[];
	},
	//draw the grid on canvas
	//canvas must have an absolute position
	drawGrid:function(canvas,nbRows,nbColumns,containerId){
		//create another canvas with the grid
		var gridCanvas=selectAreaTools.addGridLayer('grid');
		//do draw cases of grid
		var widthCases=selectAreaTools.canvas.width/nbColumns;
		var heightCases=selectAreaTools.canvas.height/nbRows;
		var r,c;
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		
		$(gridCanvas).on('click',selectAreaTools.grid.selectOrDeselectCase);
		//Don't use JQuery width and height function
		//for esthetic reasons 
		this.gridCanvas=gridCanvas;
		selectAreaTools.highest=gridCanvas;
		this.canvas=canvas;
		//draw the grid
		var context=gridCanvas.getContext('2d');
		context.beginPath();
		//font for the coordinate
		context.font = "bold 10pt Calibri";
		//color of the lines
		context.strokeStyle='black';
		//color of the coordinates
		context.fillStyle='black';
		parent.selectedCases=[];
		//draw rows;
		//write first coordinate
		context.fillText('1',selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases/2)+selectAreaTools.grid.spaceForCoordinates);
		parent.idRows=[];
		//beginning of the first row
		parent.idRows.push(selectAreaTools.grid.spaceForCoordinates);
		if(!isNaN(nbRows)){
			for(r=1;r<=nbRows;r++){
				if((heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2)<selectAreaTools.canvas.height+selectAreaTools.grid.spaceForCoordinates){
					context.fillText(r+1,selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2));
				}
				//beginning of the row
				parent.idRows.push(r*heightCases+selectAreaTools.grid.spaceForCoordinates);
				//drax the line of the row
				context.moveTo(selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(gridCanvas.width-selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
			}
		}
		//end of the last row		
		parent.idRows.push(gridCanvas.height-selectAreaTools.grid.spaceForCoordinates);
		//draw columns	
		context.fillText('1',(widthCases/2)+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates*(3/4));		
		parent.idColumns=[];
		//store the position of first columns
		parent.idColumns.push(selectAreaTools.grid.spaceForCoordinates);
		if(!isNaN(nbColumns)){
			for(c=1;c<=nbColumns;c++){
				if(widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2)<selectAreaTools.canvas.width+selectAreaTools.grid.spaceForCoordinates){
					context.fillText(c+1,widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2),+selectAreaTools.grid.spaceForCoordinates*(3/4));	
				}
				//Store the position of tge column's beginning
				parent.idColumns.push(c*widthCases+selectAreaTools.grid.spaceForCoordinates);
				//draw the line of the column
				context.moveTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,gridCanvas.height-selectAreaTools.grid.spaceForCoordinates);
			}
		}
		//end of the last column
		parent.idColumns.push(gridCanvas.width-selectAreaTools.grid.spaceForCoordinates);		
		context.stroke();
		context.closePath();
		
		//store number of rows and number of columns
		parent.nbRows=nbRows;
		parent.nbColumns=nbColumns;
		parent.widthCases=widthCases;
		parent.heightCases=heightCases;
	
		
	},
	
	redrawGrid:function(nbRows,nbColumns){	
		var gridCanvas=this.gridCanvas;
		var context=gridCanvas.getContext('2d');
		var widthCases=selectAreaTools.canvas.width/nbColumns;
		var heightCases=selectAreaTools.canvas.height/nbRows;
		var r,c;
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		if(!context){
			throw "gridCanvas context not found";
			return;
		}
		context.beginPath();
		
		
		
		//clear gridCanvas
		context.clearRect(0,0,gridCanvas.width,gridCanvas.height);
		//font for the coordinate
		context.font = "bold 10pt Calibri";
		//color of the lines
		context.strokeStyle='black';
		//color of the coordinates
		context.fillStyle='black';
		parent.selectedCases=[];
		
		//draw rows;
		//write first coordinate
		context.fillText('1',selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases/2)+selectAreaTools.grid.spaceForCoordinates);
		parent.idRows=[];
		//beginning of the first row
		parent.idRows.push(selectAreaTools.grid.spaceForCoordinates);
		if(!isNaN(nbRows)){
			for(r=1;r<=nbRows;r++){
				if((heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2)<selectAreaTools.canvas.height+selectAreaTools.grid.spaceForCoordinates){
					context.fillText(r+1,selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2));
				}
				//beginning of the row
				parent.idRows.push(r*heightCases+selectAreaTools.grid.spaceForCoordinates);
				//drax the line of the row
				context.moveTo(selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(gridCanvas.width-selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
			}
		}
		//end of the last row		
		parent.idRows.push(gridCanvas.height-selectAreaTools.grid.spaceForCoordinates);
		//draw columns	
		context.fillText('1',(widthCases/2)+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates*(3/4));		
		parent.idColumns=[];
		//store the position of first columns
		parent.idColumns.push(selectAreaTools.grid.spaceForCoordinates);
		if(!isNaN(nbColumns)){
			for(c=1;c<=nbColumns;c++){
				if(widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2)<selectAreaTools.canvas.width+selectAreaTools.grid.spaceForCoordinates){
					context.fillText(c+1,widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2),+selectAreaTools.grid.spaceForCoordinates*(3/4));	
				}
				//Store the position of tge column's beginning
				parent.idColumns.push(c*widthCases+selectAreaTools.grid.spaceForCoordinates);
				//draw the line of the column
				context.moveTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,gridCanvas.height-selectAreaTools.grid.spaceForCoordinates);
			}
		}
		//end of the last column
		parent.idColumns.push(gridCanvas.width-selectAreaTools.grid.spaceForCoordinates);		
		context.stroke();
		context.closePath();
		
		//store number of rows and number of columns
		parent.nbRows=nbRows;
		parent.nbColumns=nbColumns;
		parent.widthCases=widthCases;
		parent.heightCases=heightCases;
		
		
	},
	//remove the grid
	removeGrid:function(){
		var highest;
		$(this.gridCanvas).remove();
		selectAreaTools.removeLayer('grid');
		selectAreaTools.removeMiniatureLayer('grid');
		//search layer with the greatest z-index
		highest=$(selectAreaTools.canvas);
		//search layer with maximun z-index
		$('.layer').each(function(i,v){
			zIndex=$(v).css("z-index");
			if(zIndex>highest.css("z-index")){
				highest=$(v);
			}
		});
		selectAreaTools.zIndex--;
		selectAreaTools.highest=highest[0];
	},
	//select or deselect the case where the user has clicked
	selectOrDeselectCase:function(click){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		var gridCanvas=click.target;
		var px=click.pageX- $(gridCanvas).offset().left ;
		var py=click.pageY- $(gridCanvas).offset().top ;
		var c,r;
		var gridCanvas=click.target;
		var context=gridCanvas.getContext('2d');
		if(!context){
			throw "context of grid canvas not found";
		}
		//found index of the row
		for(r=0;r<parent.nbRows;r++){
			if((parent.idRows[r]<=py)&&(py<parent.idRows[r+1])){
				break;
			}
		}
		
		if(r>=parent.nbRows){
			alert("click on the picture");
			return;
		}
				
		//alert('r : ' + r + ' py : ' + py + ' parent.idRows[r] :' + parent.idRows[r] + ' parent.idRows[r+1] : ' + parent.idRows[r+1]);
		//found index of the column
		for(c=0;c<parent.nbColumns;c++){
			if((parent.idColumns[c]<=px)&&(px<parent.idColumns[c+1])){
				break;
			}
		}
		
		if(c>=parent.nbColumns){
			alert("click on the picture");
			return;
		}
		var i= parent.enoughtSelected(c,r);
		if(i === -1){
			parent.selectedCases.push({'r':r,'c':c});
			context.fillStyle='rgba(255,255,0,0.25)';
			context.fillRect(parent.idColumns[c]+2,parent.idRows[r]+2,parent.widthCases-3,parent.heightCases-3);
		}else{
			parent.selectedCases.splice(i,1);
			parent.redrawAfterDeselectOfOneCase();
		}
		//alert('c : ' + c + ' px : ' + px + ' parent.idColumns[r] :' + parent.idColumns[c] + ' parent.idColumns[c+1] : ' + parent.idColumns[c+1]);
	},
	enoughtSelected:function(c,r){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		var i;
		var lgt=parent.selectedCases.length;
		for(i=0;i<lgt;i++){
			if(parent.selectedCases[i].c===c&&parent.selectedCases[i].r===r){
				return i;
			}
		}
		return(-1);
	},
	redrawAfterDeselectOfOneCase:function(){	
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		var gridCanvas=parent.gridCanvas;
		var context=gridCanvas.getContext('2d');
		var nbRows=parent.nbRows;
		var nbColumns=parent.nbColumns;
		var widthCases=selectAreaTools.canvas.width/nbColumns;
		var heightCases=selectAreaTools.canvas.height/nbRows;
		var r,c;
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;
		if(!context){
			throw "gridCanvas context not found";
			return;
		}
		context.beginPath();		
		
		
		//clear gridCanvas
		context.clearRect(0,0,gridCanvas.width,gridCanvas.height);
		context.font = "bold 10pt Calibri";
		context.strokeStyle='black';
		context.fillStyle='black';
		//draw rows;
		context.fillText('0',selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases/2)+selectAreaTools.grid.spaceForCoordinates);
		if(!isNaN(nbRows)){
			for(r=1;r<=nbRows;r++){
				if((heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2)<selectAreaTools.canvas.height){
					context.fillText(r,selectAreaTools.grid.spaceForCoordinates*(1/4),(heightCases*r +selectAreaTools.grid.spaceForCoordinates)+(heightCases/2));
				}
				
				context.moveTo(selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(gridCanvas.width-selectAreaTools.grid.spaceForCoordinates,heightCases*r+selectAreaTools.grid.spaceForCoordinates);
			}
		}		
		//draw columns	
		context.fillText('0',(widthCases/2)+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates*(3/4));
		if(!isNaN(nbColumns)){
			for(c=1;c<=nbColumns;c++){
				if(widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2)<selectAreaTools.canvas.width){
					context.fillText(c,widthCases*c+selectAreaTools.grid.spaceForCoordinates+(widthCases/2),+selectAreaTools.grid.spaceForCoordinates*(3/4));	
				}
				
				context.moveTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,selectAreaTools.grid.spaceForCoordinates);
				context.lineTo(widthCases*c+selectAreaTools.grid.spaceForCoordinates,gridCanvas.height-selectAreaTools.grid.spaceForCoordinates);
			}
		}
		
		//redraw selected cases;
		var i;
		context.fillStyle='rgba(255,255,0,0.25)';
		
		for(i=0;i<parent.selectedCases.length;i++){
			c=parent.selectedCases[i].c;
			r=parent.selectedCases[i].r;
			context.fillRect(parent.idColumns[c]+2,parent.idRows[r]+2,parent.widthCases-3,parent.heightCases-3);
		}
		context.stroke();
		context.closePath();
		
	},
	saveGrid:function(){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.grid;		
		parent.removeGrid();
		var id='grid'+parent.nbGrid;
		var savedGrid=selectAreaTools.addLayer(id);
		parent.nbGrid++;
		var initialImage=selectAreaTools.canvas;
		var ctxInitialImage=initialImage.getContext('2d');
		if(!ctxInitialImage){
			throw 'Can not found context of initial image';
		}
		var ctxSavedGrid=savedGrid.getContext('2d');
		if(!ctxSavedGrid){
			throw 'Can not found context of saved grid';
		}
		var imageData;
		var miniature;
		var ctxMiniature;
		for(i=0;i<parent.selectedCases.length;i++){
			c=parent.selectedCases[i].c;
			r=parent.selectedCases[i].r;
			//the minus 5 is added to be sure to have an image without white line (for firefox)
			imageData=ctxInitialImage.getImageData(parent.idColumns[c]-selectAreaTools.grid.spaceForCoordinates-5,parent.idRows[r]-selectAreaTools.grid.spaceForCoordinates-5,parent.widthCases+5,parent.heightCases+5);
			ctxSavedGrid.putImageData(imageData,parent.idColumns[c]-selectAreaTools.grid.spaceForCoordinates-5,parent.idRows[r]-selectAreaTools.grid.spaceForCoordinates-5);
		}
		miniature=document.createElement('canvas');
		miniature.width=savedGrid.width;
		miniature.height=savedGrid.height;
		ctxMiniature=miniature.getContext('2d');
		if(!ctxMiniature){
			throw 'Can not found context of miniature of saved grid';
		}
		ctxMiniature.putImageData(ctxSavedGrid.getImageData(0,0,savedGrid.width,savedGrid.height),0,0);
		selectAreaTools.addMiniatureLayer(miniature,id);
		//save path of selected region		
		selectAreaTools.saveSelectedRegions.newRegion(id);
		parent.drawGrid(selectAreaTools.canvas,parent.nbRows,parent.nbColumns,'containerCanvas');
		
	}
},


//To select polygon areas of the initial images
selectAreaTools.selectPolygons={
	trace:false,
	polygonPoints:[],
	polygonId:0,
	firstSummet:true,
	init:function(){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectPolygons;
		//to add event handler
		var layer=selectAreaTools.highest;
		//remove previous event handler to avoid conflit between handlers
		//and avoid a same handler is added several times
		$(layer).unbind('click');
		$(layer).unbind('dblclick');
		//add new event handler;
		$(layer).on('click',parent.showPolygon);
		$(layer).on('dblclick',parent.selectPolygons);	
		parent.firstSummet=true;	
	},
	//remove event handler concerning selection of a polygon
	removeEventActions:function(){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectPolygons;
		$(selectAreaTools.highest).off('click');
		$(selectAreaTools.highest).off('dblclick');
		parent.trace=false;
		parent.polygonPoints=[];
		parent.firstSummet=true;
		
	},
	showPolygon:function(click){
			//to make easier the access of the object proprieties
			var parent=selectAreaTools.selectPolygons;
			
			//to access to the initial image informations
			var initialImage=selectAreaTools.canvas;
			
			//to draw polygon on the layer
			var layer=selectAreaTools.highest
			var ctxLayer=layer.getContext('2d');
			
			
			//to know the cursor position on the canvas (and not on the document)
			var posX=click.pageX-$(initialImage).offset().left;
			var posY=click.pageY-$(initialImage).offset().top;
			
			if(parent.firstSummet){
				parent.firstSummet=false;
				
				//user can not sort layer during selection of a polygon
				selectAreaTools.createLayerToolBox.listOfLayer.sortable('disable');	
				$('#sortInformation').css('color','red').text('Calques non déplaçables');
				
				
				//stop event handler on the current highest layer
				$(selectAreaTools.highest).off('click');
				$(selectAreaTools.highest).off('dblclick');
				
				//create a new layer
				layer=selectAreaTools.addLayer('polygon'+parent.polygonId);
				//increment id for the next polygon
				parent.polygonId++;	
				selectAreaTools.highest=layer;
				//add event handler for this layer
				$(layer).on('click',parent.showPolygon);
				$(layer).on('dblclick',parent.selectPolygons);
							
				parent.polygonPoints=[];
				//store the first summet of the polygon			
				parent.polygonPoints.push({x:posX,y:posY});	
				//start the drawing of the polygon	
				ctxLayer=layer.getContext('2d');			
				ctxLayer.beginPath();				
				ctxLayer.moveTo(posX,posY);
				parent.trace=true;
			}else{
				//draw the new segment on the canvas
				ctxLayer.lineTo(posX,posY);
				ctxLayer.stroke();
				
				//store the new summet
				if(	posX!=parent.polygonPoints[parent.polygonPoints.length-1].x || posY!=parent.polygonPoints[parent.polygonPoints.length-1].y ){
					parent.polygonPoints.push({x:posX,y:posY});
				}
			}			
			
	},	
	//handeln the first click for the first polygon
	selectPolygons:function(click){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectPolygons;
		
		//to access to initial image pixels
		var initialImage;
		var ctxInitialImage;
		var dataRectMinInitialImage
			
		//to draw polygon on the canvas
		var canvas=click.target;
		if(!canvas){
			throw 'Cavans not found';
		}			
			
		//to know the cursor position on the canvas (and not on the document)
		var posX=click.pageX-$(canvas).offset().left;
		var posY=click.pageY-$(canvas).offset().top;			
		
		var layer=selectAreaTools.highest;
		var ctxLayer=layer.getContext('2d');
		if(!ctxLayer){
			throw 'olygon selection : can not found context of current layer';
		}
			
		//to create a minitature of selection
		var miniature;
		var miniatureContext;
			
		//variable concerning minimal rectangle which contains the polygon
		var rect;
		//position of the first summet of the rectangle
		var rectX;
		var rectY;
		//size of the rectangle
		var widthRect;
		var heightRect;
		//store information of the rectangle 
		var rectMin;
		//to manipulate pixel of the rectangle			
		var dataRectMin;
			
		//to select pixel inside the polygone
		var canvasOutline;//canvas which contains the outline of the polygon
		var ctxCanvasOutline;
		//search connected components		
		var fCC;
		//store connected components
		var labels;
		//to access pixel of a canvas
		var pixel
			
		//test if draw is finish
		if(parent.polygonPoints.length<=2){
			//a line is not a polygon
			//don't end the drawing
			return;
		}
			
		//store the new summet
		if(	posX!=parent.polygonPoints[parent.polygonPoints.length-1].x || posY!=parent.polygonPoints[parent.polygonPoints.length-1].y ){
			parent.polygonPoints.push({x:posX,y:posY});
		}
			
		//finish the drawing of the polygon	
		ctxLayer.lineTo(posX,posY);
		ctxLayer.stroke();
		ctxLayer.lineTo(parent.polygonPoints[0].x,parent.polygonPoints[0].y);
		ctxLayer.stroke();
		ctxLayer.closePath();
			
		//select an rectangle which contain the polygon
		//and test for each pixel of this rectangle
		//if it is contained in the polygon			
		//found the position and the size of the rectangle
		rect=parent.minimalRectangle(parent.polygonPoints);
		//position of the first summet of the rectangle
		rectX=rect.minX-2;
		rectY=rect.minY-2;
		//size of the rectangle
		widthRect=rect.maxX-rect.minX+4;
		heightRect=rect.maxY-rect.minY+4;
		//store information of the rectangle 
		rectMin=ctxLayer.getImageData(rectX,rectY,widthRect,heightRect);
		//to manipulate pixel of the rectangle			
		dataRectMin=rectMin.data;
		pixel=0;
		canvasOutline=document.createElement('canvas');
		canvasOutline.width=widthRect;
		canvasOutline.height=heightRect;
		ctxCanvasOutline=canvasOutline.getContext('2d');
		if(!ctxCanvasOutline){
			throw 'polygone selection : Can not found context of canvasOutline';
			return;
		}
		ctxCanvasOutline.putImageData(rectMin,0,0);
		//search connected components		
		fCC= selectAreaTools.foundConnectedComponents;
		fCC.init(canvasOutline);
		labels=fCC.compute();
			
		//print the result on the canvas
		initialImage=selectAreaTools.canvas;
		ctxInitialImage=initialImage.getContext('2d');
		if(!ctxInitialImage){
			throw 'polygonSelection : Can not found context of initial image';
		}
		dataRectMinInitialImage=ctxInitialImage.getImageData(rectX,rectY,widthRect,heightRect);
		pixel=0;
		for(y=0;y<fCC.height;y++){
			for(x=0;x<fCC.width;x++){
				if(labels[y][x]===labels[0][0]){
					dataRectMinInitialImage.data[pixel+3]=0;
				}
				pixel=pixel+4;
			}
		}
		ctxLayer.putImageData(dataRectMinInitialImage,rectX,rectY);
		//reset polygonPoints
		parent.polygonPoints=[];
		parent.trace=false;
		
		//create miniature
		miniature=document.createElement('canvas');
		miniature.width=selectAreaTools.highest.width;
		miniature.height=selectAreaTools.highest.height;
		$(miniature).css("background-color","white");
			
		//copy polygon
		miniatureContext=miniature.getContext("2d");
		if(!miniatureContext){
			throw 'Miniature context not found';
		}
			
		miniatureContext.beginPath();
		miniatureContext.closePath();
		miniatureContext.putImageData(dataRectMinInitialImage,rectX,rectY);
		selectAreaTools.addMiniatureLayer(miniature,layer.id);
		//save path of selected region
		
			selectAreaTools.saveSelectedRegions.newRegion(layer.id);
			
		parent.firstSummet=true;	
		//now user can sort layers
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
			
	},
	//to found the minimal rectangle which contain the polygon
	minimalRectangle:function(pointsList){
		var i;
		var minX=Number.POSITIVE_INFINITY;
		var minY=Number.POSITIVE_INFINITY;
		var maxX=Number.NEGATIVE_INFINITY;
		var maxY=Number.NEGATIVE_INFINITY;
		var length=pointsList.length;
		
		for(i=0;i<length;i++){
			if(pointsList[i].x>maxX){
				maxX=pointsList[i].x
			}
			if(pointsList[i].y>maxY){
				maxY=pointsList[i].y
			}
			if(pointsList[i].x<minX){
				minX=pointsList[i].x
			}
			if(pointsList[i].y<minY){
				minY=pointsList[i].y
			}
		}
		return {'maxX':maxX,'maxY':maxY,'minX':minX,'minY':minY};
	},
	
	
};

//To select areas of the initial images
selectAreaTools.selectShapes={
	shapePoints:[],
	trace:false,
	selectShapes:false,
	shapeId:0,
	
	init:function(){
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectShapes;
		var layer=selectAreaTools.highest;
		//remove previous event handler to avoid conflit between handlers
		//and avoid a same handler is added several times	
		$(layer).unbind('click');			
		$(layer).on('click',parent.startDrawingOfShape);
	},
	removeEventActions:function(){
		var layer=selectAreaTools.highest;
		$(layer).off('click');
		$(layer).off('mousemove');
		selectAreaTools.selectShapes.firstShape=true;
		
	},
	startDrawingOfShape:function(click){
			//to make easier the access of the object proprieties
			var parent=selectAreaTools.selectShapes;
			//to draw shape on the canvas
			var layer;
			var ctxLayer;
			//create a new layer
			layer=selectAreaTools.addLayer('shape'+parent.shapeId);
			//remove previous event handler
			$(selectAreaTools.highest).off('click');
			//add new event handler
			$(layer).on('click',parent.endDrawingOfShape);
			$(layer).on('mousemove',parent.drawShape);
			//increment shapeId for the next shape
			parent.shapeId++;
			selectAreaTools.highest=layer;
			ctxLayer=layer.getContext('2d');
			if(!ctxLayer){
				throw "shape selection : can not found context of current layer";
			}
			
			//user can not sort layers during the selection of a shape
			selectAreaTools.createLayerToolBox.listOfLayer.sortable('disable');			
			$('#sortInformation').css('color','red').text('Calques non déplaçables');
			if(!layer){
				throw 'layer not found';				
			}
			
			var canvas=	selectAreaTools.canvas;
			if(!canvas){
				throw 'canvas not found';
			}
			
			
			//to know the cursor position on the canvas (and not on the document)
			var posX=click.pageX-$(canvas).offset().left;
			var posY=click.pageY-$(canvas).offset().top;
			
			parent.shapePoints.push({x:posX,y:posY});
			
			//to make possible the drawing of the shape
			parent.trace=true
			ctxLayer.beginPath();
			ctxLayer.moveTo(posX,posY);
	},
	
	
	
	drawShape:function(event){
			//to make easier the access of the object proprieties
			var parent=selectAreaTools.selectShapes;
			
			//to draw polygon on the canvas
			var layer=selectAreaTools.highest;
			
			
			if(!layer){
				throw 'layer not found';				
			}
			
			var canvas=	selectAreaTools.canvas;
			if(!canvas){
				throw 'canvas not found';
			}
			var ctxLayer=layer.getContext('2d');
			
			//to know the cursor position on the canvas (and not on the document)
			var posX;
			var posY;
			
			if(parent.trace){
				//know the cursor position on the canvas
				// BUG $(selectAreaTools.createLayerToolBox.listOfLayer).append($("<p>move over : " + layer.id + ' x : ' + event.pageX + ' y : ' + event.pageY + "</p>"));
				posX=event.pageX-$(canvas).offset().left;
				posY=event.pageY-$(canvas).offset().top;
				
				//store the new point
				parent.shapePoints.push({x:posX,y:posY});
				
				//trace the shape on the canvas
				ctxLayer.lineTo(posX,posY);
				ctxLayer.stroke();
				
			}			
	},
	endDrawingOfShape:function(click){
		
		var layer=selectAreaTools.highest;
		//remove previous event handler
		$(layer).off('click');
		$(layer).off('mousemove');
			
		//to make easier the access of the object proprieties
		var parent=selectAreaTools.selectShapes;
			
		
		var miniature;
		var miniatureContext;
			
		// to store the number of known points
		var nbPoints; 
			
		// to store information about the minimal rectangle which contains the shape
		var rect; 
		//position of the minimal rectangle
		var rectX;
		var rectY;
		//size of the minimal rectangle
		var widthRect;
		var heightRect;
		//to read modify value of pixels of the minimal rectangle
		var rectMin;			
		var dataRectMin;
		var dataRectMinInitialImage;
			
		//has we don't known all the point of outline of the shape we must redraw it on a other canvas
		//the background of this canvas will be white
		//the outline of the shape will be black
		//so a black pixel is a pixel of the outline of the shape
		//-------------------------------------------//
		var canvasOutline;
		var ctxCanvasOutline;
			
		var initialImage=selectAreaTools.canvas;
		var ctxInitialImage;
		//to know the position of the next point
		var x;
		var y;
		//to know the index of the current point
		var i;
		
		var ctxLayer =layer.getContext('2d');
		if(!ctxLayer){
			throw 'shape selection : can not found context of current layer'
		}	
		//to know the cursor position on the canvas (and not on the document)
		var posX=click.pageX-$(initialImage).offset().left;
		var posY=click.pageY-$(initialImage).offset().top;
			
		//save the last point	
		parent.shapePoints.push({x:posX,y:posY});
			
			
		//stop the drawing
		parent.trace=false;
		
				
			
		//calculate the number of known points
		nbPoints=parent.shapePoints.length;
		//calculate minimal rectangle which contains the shape
		//the rectangle must contain one pixel wich is not contained in the shape (pixel(0,0))
		//to have just one connected component which correspond to outside of the shape
		//rectangle must be wider than the true minimal rectangle
		rect=parent.minimalRectangle(parent.shapePoints);
		rectX=rect.minX-10;
		rectY=rect.minY-10;
		widthRect=rect.maxX-rect.minX+15;
		heightRect=rect.maxY-rect.minY+15;
		//copy information of this portion of canvas		
		rectMin=ctxLayer.getImageData(rectX,rectY,widthRect,heightRect);
		//to read or modify value of pixel of the rectangle			
		dataRectMin=rectMin.data;
			
		//redrawn the shape on another canvas
		//all black pixel will be a outline pixel
		//it is very important to redraw the shape
		//without this stage the outline can be not
		//closed
		canvasOutline=$('<canvas width="' + widthRect + '" height="'+ heightRect +'"></canvas>')[0];
		ctxCanvasOutline=canvasOutline.getContext('2d');
		ctxCanvasOutline.beginPath();
		//draw the background of the new canvas
		//the background is white
		//any white pixel is not a pixel of  shape's outline
		//redraw the shape in black
		ctxCanvasOutline.strokeStyle='black';
		x=parent.shapePoints[0].x-rectX;
		y=parent.shapePoints[0].y-rectY;
			
		ctxCanvasOutline.moveTo(x,y);
			
		for(i=1;i<nbPoints;i++){
			x=parent.shapePoints[i].x-rectX;
		    y=parent.shapePoints[i].y-rectY;
			ctxCanvasOutline.lineTo(x,y);
			ctxCanvasOutline.stroke();
		}
			
		//close the shape
		x=parent.shapePoints[0].x-rectX;
		y=parent.shapePoints[0].y-rectY;
		ctxCanvasOutline.lineTo(x,y);
		ctxCanvasOutline.stroke();
		ctxCanvasOutline.closePath();
		
		//search connected components		
		var fCC= selectAreaTools.foundConnectedComponents;
		fCC.init(canvasOutline);
		var labels=fCC.compute();
		
		//print the result on the canvas
		ctxInitialImage=initialImage.getContext('2d');
		if(!ctxInitialImage){
			throw 'Can not found context of initial image';
		}
		dataRectMinInitialImage=ctxInitialImage.getImageData(rectX,rectY,widthRect,heightRect);
		var pixel=0;
		for(y=0;y<fCC.height;y++){
			for(x=0;x<fCC.width;x++){
				if(labels[y][x]===labels[0][0]){
					dataRectMinInitialImage.data[pixel+3]=0;
				}
				pixel=pixel+4;
			}
		}
		ctxLayer.putImageData(dataRectMinInitialImage,rectX,rectY);
		
			
		//create miniature
		miniature=document.createElement('canvas');
		miniature.width=selectAreaTools.highest.width;
		miniature.height=selectAreaTools.highest.height;	
		$(miniature).css("background-color","white");
			
		//copy shape
		miniatureContext=miniature.getContext("2d");
		if(!miniatureContext){
			throw 'Miniature context not found';
		}
		miniatureContext.putImageData(dataRectMinInitialImage,rectX,rectY);
		selectAreaTools.addMiniatureLayer(miniature,layer.id);
		//save path of selected region
		
			selectAreaTools.saveSelectedRegions.newRegion(layer.id);

		parent.shapePoints=[];
		parent.shapeFinished=true;//drawing is finished correctly
			
		//now layers can be sorted by user
		selectAreaTools.createLayerToolBox.listOfLayer.sortable('enable');			
		$('#sortInformation').css('color','#66FF33').text('Calques déplaçables');
		
		//add event handler to handlen the next click
		$(layer).on('click',parent.startDrawingOfShape);
	},
	
	//give position an size of the minimal rectangle
	//which contains the shape
	minimalRectangle: function(pointsList){
		var i;
		var minX=Number.POSITIVE_INFINITY;
		var minY=Number.POSITIVE_INFINITY;
		var maxX=Number.NEGATIVE_INFINITY;
		var maxY=Number.NEGATIVE_INFINITY;
		var length=pointsList.length;
		
		for(i=0;i<length;i++){
			if(pointsList[i].x>maxX){
				maxX=pointsList[i].x
			}
			if(pointsList[i].y>maxY){
				maxY=pointsList[i].y
			}
			if(pointsList[i].x<minX){
				minX=pointsList[i].x
			}
			if(pointsList[i].y<minY){
				minY=pointsList[i].y
			}
		}
		return {'maxX':maxX,'maxY':maxY,'minX':minX,'minY':minY};
	}
	
};

//set of function to found connectedComponents of picture drawing on a canvas
//opaque pixels draw the outline
//transparent pixels are the background  
selectAreaTools.foundConnectedComponents={
		//initialize parameters
		//and convert image to an array
		//with 0 to the background
		//and 1 to the outline
		init:function(canvas){
			var row,column,pixel;
			var context;
			var image;
			var imageData;
			//store size of canvas
			this.width=canvas.width;
			this.height=canvas.height;
			//change canvas in a matrice
			this.image=[];
			
			
			context=canvas.getContext('2d');
			image=context.getImageData(0,0,this.width,this.height);
			imageData=image.data;
			
			pixel=0;
			for(row=0;row<this.height;row++){
				this.image.push([]);
				for(column=0;column<this.width;column++){
					if(imageData[pixel+3]!==0){
						//outline
						this.image[row].push(1);
					}else{
						//background
						this.image[row].push(0);
					}
					pixel=pixel+4;
				}
			}
			
			this.roots=new Array(this.width*this.height);
			this.noRoot=-1;
			
	},
	//find a node 
	find:function(pos){
		if(!this.roots){
			alert("roots not initialized");
		}	
		while(this.roots[pos]!=pos){
			
			pos=this.roots[pos];
		}
		return(pos);
	},
	//make the union of two graphs
	union:function(root0,root1){
		if(root0===root1){
			return root0;
		}
		if(root0===this.noRoot){
			return root1;
		}
		if(root1===this.noRoot){
			return root0;
		}
		if(root0<root1){
			this.roots[root1]=root0;
			return root0
		}else{
			this.roots[root0]=root1;
			return root1;
		}
	},

	// set the root of the node at position pos 
	add:function(root,pos){
		if(root===this.noRoot){
			this.roots[pos]=pos;
		}else{
			this.roots[pos]=root;
		}
		
	},
	
	//build the connected component labels array
	buildLabelArray:function(){
		var pos;
		var label;
		var labels=[];
		var y,x;
		// remove indirections
		for(pos=0;pos<(this.width*this.height);pos++){
			this.roots[pos] = this.find(pos);
		}
 
		// copy label to new array
		for(y=0,pos=0;y<this.height;y++){
			labels.push([]);
			for(x=0;x<this.width;x++,pos++){
				labels[y].push(this.roots[pos]);
			}
		}
 
		return labels;
	},
	
	//return the connected component labels array
	//use 4-connectivity 
	compute:function(){
		var root;
		var y,x;
		var pos;
		var labels; //store labels of connected components
		for(y=0,pos=0;y<this.height;y++) {
			for(x=0;x<this.width;x++,pos++) {
				root = this.noRoot;
 
				if ( (x>0) && (this.image[y][x-1]==this.image[y][x]) ){
					root = this.union( this.find(pos-1) , root);
				}
 				
				if ( (y>0) && (this.image[y-1][x]==this.image[y][x]) ){
					root = this.union( this.find(pos-this.width) , root);
				}
 
				this.add( root,pos );
			}
			
		}
		labels=this.buildLabelArray()
		
		return labels;
	},
 };
 
 //Convert each object "img" in a canvas with the same attributs
 selectAreaTools.imageToCanvas = function(images) {

	//replace each image with a canvas
	images.each(function(index, element) {
		createCanvas(element);
	});
	
	//replace an img object with a canvas
	function createCanvas(img) {
		var context;
		
		//create canvas
		var createCanvasHTML = '<canvas width="' + img.width + '" height="' + img.height + '"></canvas>';
		var canvas = $(createCanvasHTML);
		
		//copy attribute
		var attributes = img.attributes;
		var i;
		var nbAttributes = attributes.length;		

		for( i = 0; i < nbAttributes; i++) {
			canvas.attr(attributes[i].name, attributes[i].value);
		}

		//draw img on the canvas
		if(canvas.length > 0) {
			context = canvas[0].getContext('2d');
			if(!context) {
				alert("Context of canvas not found");
				return;
			}
			context.drawImage(img, 0, 0);
		}
		
		//replace img with the canvas
		$(img).replaceWith(canvas);

	};

};
