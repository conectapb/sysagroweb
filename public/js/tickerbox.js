// -----------------------------------------------------------------------------------
//
//	TickerBox v0.4 BETA
//	by Alexandre Marinho - http://www.cuboestudioweb.com/
//	23/04/2008
//
//	For more information on this script, visit:
//	http://www.cuboestudioweb.com/projects/tickerbox
//
//	Licensed under the The GNU General Public License - http://www.opensource.org/licenses/gpl-license.php
//
//
// -----------------------------------------------------------------------------------

var containerWidth  = 450;
var containerHeight = 320;
var filePrevImage = base_url+"images/prev.gif";
var fileNextImage = base_url+"images/next.gif";

/****************************************************************/
var photos = '#tickerbox .ticker';
var countPhotos;
var index = 0;
var timeout;


var Ticker = Class.create();

Ticker.prototype = {
	
	initialize: function() {
		//gets all ticker elements
		photos = $$(photos);
		countPhotos = photos.length;
		this.hideAllPhotos();
		
		// Periodical Executer to check when all the images has loaded
		this.pe = new PeriodicalExecuter(this.checkImagesState.bind(this), 0);
		
		//define the dimensions
		$('tickerbox').style.width = containerWidth+'px';
		$('tickerbox').style.height = containerHeight+'px';
		
		//creates the loading image
		var tickerPreLoad = document.createElement("div");
		tickerPreLoad.setAttribute('id','ticker-loading');
		$('tickerbox').appendChild(tickerPreLoad);
		
		//creates the previous image button
		var prev = document.createElement("img");
		prev.setAttribute('id','prev');
		prev.setAttribute('src',filePrevImage);
		$('tickerbox').appendChild(prev);
		new Effect.Opacity(prev,{to:0.2,duration:0});
		prev.onmouseover = function(){new Effect.Opacity(prev,{to:1,duration:0})}
		prev.onmouseout = function(){new Effect.Opacity(prev,{to:0.2,duration:0})}
		
		// creates the next image button
		var next = document.createElement("img");
		next.setAttribute('id','next');
		next.setAttribute('src',fileNextImage);
		$('tickerbox').appendChild(next);
		new Effect.Opacity(next,{to:0.2,duration:0});
		next.onmouseover = function(){new Effect.Opacity(next,{to:1,duration:0})}
		next.onmouseout = function(){new Effect.Opacity(next,{to:0.2,duration:0})}
		
		//create comments element
		var comments = document.createElement("div");
		comments.setAttribute('id','comments');
		$('tickerbox').appendChild(comments);
		new Effect.Opacity($('comments'),{to:0.5,duration:0});
	},
	
	
	/**
	 * checkImagesState()
	 *
	 * Checks if the ticker images has been loaded
	 */
	checkImagesState: function() {
		if (this.hasImagesLoaded()) {
			this.pe.stop();
			$('ticker-loading').hide();
			this.show();
		}    
	},

	/**
	 * show()
	 *
	 * Show the current picture
	 */
	show: function() {
		this.lockButtons();
		$('comments').innerHTML = photos[index].alt;
		new Effect.Appear(photos[index],{
				duration:0.5,
				afterFinishInternal: function(){
					if(photos[index].alt!=""){
						Element.show('comments')
						new Effect.Move('comments', {
							x:0,
							y:-40,
							duration:0.2,
							afterFinishInternal:function(){
								myTicker.unLockButtons();
							}
						});
					}else{
						myTicker.unLockButtons();
					}
					timeout = setTimeout(function(){myTicker.hide(false)},5000);
				}
			}
		);
	},
	
	/**
	 * hide()
	 *
	 * Starts to hide comments and photo
	 * 
	 * @param boolean prev
	 */
	hide: function(prev) {
		this.lockButtons();
		if(photos[index].alt!=""){
		new Effect.Move('comments',{
			x:0,
			y:40,
			duration:0.2,
			afterFinishInternal: function(){
				Element.hide('comments');
				myTicker.fadePhoto(prev);
			}
		});
		}else{
			myTicker.fadePhoto(prev);
		}
	},
	
	/**
	 * fadePhoto()
	 *
	 * Does the fade effect in the actual image
	 * 
	 * @param boolean prev
	 */
	fadePhoto : function(prev){
		new Effect.Fade(photos[index],{
			duration:0.5,
			afterFinishInternal:function(){
				Element.hide(photos[index]);
				if(prev==true)
					index = (index == 0) ? countPhotos-1 : index-1;
				else
					index = (index == countPhotos-1) ? 0 : index+1;
				myTicker.show();
			}
		});
	},
	
	/**
	 * lockButtons()
	 *
	 * Lock the prev, next image buttons
	 */
	lockButtons: function(){
		$('prev').onclick = function(){}
		$('next').onclick = function(){}
	},
	
	/**
	 * unLockButtons()
	 *
	 * Unlock the prev, next image buttons
	 */
	unLockButtons: function(){
		$('prev').onclick = function(){
			clearTimeout(timeout);
			myTicker.hide(true);
		}
		$('next').onclick = function(){
			clearTimeout(timeout);
			myTicker.hide(false);
		}
	},
	
	/**
	 * hideAllPhotos()
	 *
	 * Hide all ticker images
	 */
	hideAllPhotos: function() {
		photos.each(function(item){
			item.hide();
			item.style.height = containerHeight+'px';
		});
	},
	
	/**
	 * hasImagesLoaded()
	 *
	 * Checks wether all the images
	 * in the document have loaded.
	 *
	 * @author John-David Dalton <john.david.dalton[at]gmail[dot]com>
	 * @return boolean
	 * @todo see if document.images will work instead of $$('img')
	 * @link http://www.bigbold.com/snippets/posts/show/89
	 * @link http://talideon.com/weblog/2005/02/detecting-broken-images-js.cfm
	 */
	hasImagesLoaded: function(){
	  return photos.all(function(img){
		return (img.readyState == 'complete' || img.complete || 
		  !(typeof img.naturalWidth != "undefined" && img.naturalWidth == 0));
	  });
	}

}

startTicker = function(){
	if($('tickerbox'))
		myTicker = new Ticker(); 
}
Event.observe(document,"dom:loaded", startTicker);