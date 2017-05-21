/*
 * This module contains some functions to compare two or more images.
 * This module create only one module global variable named "compareImageByTransparency"
 * This module need the jQuery-Ui  v1.8.20  module to work porperly
 */
var compareImageByTransparency = {};

compareImageByTransparency.main=function(){
    //to change transparency of pictures
    compareImageByTransparency.changeTransparency($('img'));
    //to print all pictures in the same window
    compareImageByTransparency.showAllImage($('img'));
};

/**
 * Variables to put in place tools box (form objects)
 * The position of the next box depend on position of other box
 */
compareImageByTransparency.pLeftForBox = 10;
compareImageByTransparency.pTopOfNextBox = 10;

/**
 * Variables to save the position of the first image
 * The first image must be aligned with the first tools box
 * If there are no tools box the first image is in the left corner
 */
compareImageByTransparency.pLeftFirstImage = 10;
compareImageByTransparency.pTopFirstImage = 10;

compareImageByTransparency.widthForm=200;

/**
* To compare 8 or less images by changing their opacity
* Work with canvas or images
* Images are draggable
* Need the css style 'elegant'
* Need the plugin 'sortable' of jQuery-ui
* Need the plugin 'draggable of JQuery-ui
* Need the plugin 'slider' of JQuery-ui
* 
*/
compareImageByTransparency.changeTransparency = function(images) {
	
	//-------------------------------------------------//
	//						Variables 				   //
	//-------------------------------------------------//

	var form; // form which contains tools to change opacity of each image
	var formId; 
	
	// to put in place elements (images and form)
	var pleft = this.pLeftForBox;
	var ptop = this.pTopOfNextBox;
	
	
	//to allocate one color by images
	//an image and its linked tool have the same color
	var colors = ['rgb(51,204,255)', 'rgb(255,204,51)', 'rgb(102,0,204)', 'rgb(204,0,0)', 'rgb(153,255,153)', 'rgb(255,204,255)', 'rgb(102,51,0)', 'rgb(153,153,153)'];
	
	//to identified the title area of the form
	var fieldsetid;
	
	//to create a button to pile all images
	var buttonHTML;
	var button;
	
	//to group all tools to change opacity of images
	var contentRange;
	
	//-------------------------------------------------//
	//					Main function				   //
	//-------------------------------------------------//
	
	//all images are draggable
	images.draggable();


	//create a form to store tools to change transparency
	form = $('#toolsBoxToChangeTransparency');
	$(form).css("width",compareImageByTransparency.widthForm+'px');

	//add hanœdler to button to stack up all images
	button = $("#stackUpButton");
	button.button();
	button.click(function(event) {
		var pleft = $(form).offset().left + $(form).outerWidth(true) + 10;
		var ptop = 10;
		images.offset({
			left : pleft,
			top : ptop
		})
	});


	//add handler to button to reset opacity
	button=$("#resetButton");
	button.button();
	button.click(function(event) {
		var sliders=$('.ui-slider');
		var max;
		$('img').css('opacity',1);
		max=sliders.slider("option", "max" );
		sliders.slider("value" ,max);
	});	
	
	contentRange=$('#slidersContainer');
	
	pleft =$(form).offset().left + $(form).outerWidth(true) + 10;
	
	compareImageByTransparency.pLeftFirstImage=pleft;
	ptop = compareImageByTransparency.pTopFirstImage
	images.each(function(index, img) {
		
		//images must have an id to be found
		if($(img).attr('id').length<=0){
			throw Error('All images must have an id');
		}
		
		//each image has a specific color
		var colorImg = colors[index];
		$(img).css("border-color", colorImg);
		
		//put image in place 
		$(img).css("position", "absolute");
		$(img).offset({
			left : pleft,
			top : ptop
		});

		ptop = ptop + 50;
		pleft = pleft + 50;
		
		//add a range to change opacity of the image
		var rangeId = 'rangeImage_' + $(img).attr('id');
		var rangeImg = addRangeTool(contentRange, 'Image ' + (index + 1), rangeId, 0, 100, 1, 100, colorImg, 'black', img);
	});
	
	//tools to change opacity are sortable
	//the z-index of a image depend on the position of the tool with the same color
	$(contentRange).sortable(
		{
			stop: function(event, ui){
				var zindex=$(images).length;
				
				var target=event.target;
				var ranges=$(target).children();
				
				for(var i=0;i<ranges.length;i++){
					var rangeId=$($(ranges[i]).children('.rangeToChangeTransparency')).attr('id');
					if(rangeId){
						var imgId=rangeId.split('rangeImage_')[1];
						$("#"+imgId).css('z-index',zindex);
						zindex--;
					}
					
				}
			}
		}
	);
	$(contentRange).disableSelection();
	
	//give position for the next tools box
	this.pTopOfNextBox = this.pTopOfNextBox + $(form).outerHeight(true) + 10;
	
	//-------------------------------------------------//
	//					subfunctions				   //
	//-------------------------------------------------//
	
	//create a tool to change opacity of a image
	function addRangeTool(parent, labelContent, id, min, max, step, value, backgroundColor, color, image) {
		
		var labelId = 'labelOf' + id;
		var component = $('<p></p>');
		var label = $('<label></label>');
		var range ;
		
		
		//add a label to give the name of the image which will be changed
		label.attr('id', labelId);
		label.attr('for', id);
		label.html(labelContent);
		label.css('background-color', 'rgba(255,255,255,0.95)');
		label.css('border-radius', '5px');
		label.css('margin', '2px');
		component.append(label);
		
		//separate label and range tool
		component.append($('<br>'));
		
		range=$("<div></div");
		range.attr("id",id);
		range.css("margin-top","5px");
		range.addClass("rangeToChangeTransparency");
		range.slider({
				'min' : min,
				'max' : max,
				'step' : step,
				'value' :max,
				'slide' : function(event, ui) {
					$(image).css('opacity', ui.value * (1 / 100))
				}
			});

		component.append($(range));

		//add a look for the tool
		component.css('background-color', backgroundColor);
		component.css('color', color);
		component.width(150);
		component.css('border-radius', '10px');
		component.css('margin', '5px');
		component.css("padding","10px");

		$(parent).prepend(component);
		
		return (range);
	};

	//make a range able to change opacity of a specific image
	function linkRangeCanvasOpacity(range, image) {
		$(range).change(function() {
			$(image).css('opacity', range.value * (1 / 100));
		});

	}
	
}


	


/**
* To show several images in the same windows
* Images are resized
* Image can be a canvas or a img object
* Images are draggable
* Need the plugin 'draggable' of JQuery-ui
* Need css style 'elegant'
*/
compareImageByTransparency.showAllImage = function(images) {
	
	//-------------------------------------------------//
	//						Variables 				   //
	//-------------------------------------------------//

	//to put images in place
	var pleft = this.pLeftForBox;
	var ptop = this.pTopOfNextBox;
	var imagesInitialSizes = {}; //to store initial sizes of all images
	var parent = this;
	var fieldsetid;
	
	//-------------------------------------------------//
	//					Main function				   //
	//-------------------------------------------------//
	
	//all images are draggable
	images.draggable();
	
	
	form = $('#toolsBoxToShowImages') ;
	
	
	//put form in place
	$(form).css("position", "absolute");
	$(form).css("width",compareImageByTransparency.widthForm+'px');
	$(form).offset({
		left : pleft,
		top : ptop
	});
	
	
	
	//store initial sizes of images
	storeInitialSizeOfImages(imagesInitialSizes, images);

	//add a button to show all images
	button = $('#organiseButton');
	button.button();
	button.click(function(event) {
		// know the dimension of the window where the images could be placed
		var heightBrowser = $(window).height() - 10;
		var widthBrowser = $(window).width() - ($(form).offset().left + $(form).outerWidth(true) + 10);
		//know the number of images
		var nbImages = images.length;
		//know the outer-width of the less broad image  
		var minWidth = Number.POSITIVE_INFINITY;
		//know the outer-height of the less broad image  
		var minHeight;		
		//know the width of the less broad image  
		var width;		
		//know the height of the less broad image  
		var height;
		//ratio between width and height
		var ratio;
		//number of images which coulb be placed if they have a specific size
		var nbImagesPutInPlace;
		//space between two images
		var space = 10;
		//number of images which could be aligned
		var nbInWidth;
		
		//search of optimum organization for images
		//all images must have the same size
		images.each(function(index, img) {

			//search minimum for width
			if($(img).outerWidth(true) < minWidth) {
				minWidth = imagesInitialSizes[$(img).attr('id')].outerWidth;
				minHeight = imagesInitialSizes[$(img).attr('id')].outerHeight;
				width = imagesInitialSizes[$(img).attr('id')].width;
				height = imagesInitialSizes[$(img).attr('id')].height;
			}
		});		
		//calculate ratio
		ratio = minHeight / minWidth;
		//search optimum size for images
		nbInWidth = Math.floor((widthBrowser / (minWidth + space)));
		nbImagesPutInPlace = nbInWidth * Math.floor((heightBrowser / (minHeight + space)));
		if(nbImages>nbImagesPutInPlace){
			do {
				minWidth = minWidth - 10;
				minHeight = ratio * minWidth;
				width = width - 10;
				height = ratio * width;
				
				nbInWidth = Math.floor((widthBrowser / (minWidth + space)));
				nbImagesPutInPlace = nbInWidth * Math.floor((heightBrowser / (minHeight + space)));

			} while(nbImages>nbImagesPutInPlace);
		}

		//resize all images and put they in place
		var pleft = parent.pLeftFirstImage;
		var ptop = parent.pTopFirstImage;
		images.each(function(index, img) {
			//resize
			$(img).width(width);
			$(img).height(height);
			//put in place
			$(img).css('position','absolute');
			$(img).offset({
				left : pleft,
				top : ptop
			});
			pleft = pleft + minWidth + space;
			if((index + 1) % nbInWidth === 0) {
				pleft = $(form).offset().left + ($(form).outerWidth(true) + 10)
				ptop = ptop + minHeight + space;
			}

		});

	});


	//add a button to restore initial sizes of images
	button = $("#restortButton");
	button.button();
	//restore initial sizes 
	button.click(function(event) {
		images.each(function(index, img) {
			$(img).width(imagesInitialSizes[$(img).attr('id')].width);
			$(img).height(imagesInitialSizes[$(img).attr('id')].height);
			$(img).css("position", "absolute");

		});

	});

	
	
	//-------------------------------------------------//
	//					subfunctions				   //
	//-------------------------------------------------//
	
	//store inital sizes of all picturres in imagesInitialSizes objet
	//each image is referenced by this id
	//for each image the width, the height, the outer-width and the outer-height are saved
	function storeInitialSizeOfImages(imagesInitialSizes, images) {
		images.each(function(index, img) {
			var id = $(img).attr('id');
			if(id.length <= 0) {
				throw Error("Image without id");
			}
			var outerWidth = $(img).outerWidth(true);
			var outerHeight = $(img).outerHeight(true);
			var width = $(img).width();
			var height = $(img).height();
			imagesInitialSizes[id] = {
				'outerHeight' : outerHeight,
				'outerWidth' : outerWidth,
				'width' : width,
				'height' : height
			};

		})
	}
	

}
