// get trim() working in IE
if(typeof String.prototype.trim !== 'function') {
  String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g, ''); 
  }
}

/**
 * Open popup window
 */
function theChampPopup(url){
	window.open(url,"popUpWindow","height=400,width=600,left=20,top=20,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes")
}
function theChampStrReplace(replace, by, str) {
    for (var i=0; i<replace.length; i++) {
        str = str.replace(new RegExp(replace[i], "g"), by[i]);
    }
    return str;
}

/**
 * Call functions on window.onload
 */
function theChampLoadEvent(func){
	var oldOnLoad = window.onload;
	if(typeof window.onload != 'function'){
		window.onload = func;
	}else{            
		window.onload = function(){
			oldOnLoad();
			func();
		}
	}
}

/**
 * Call Ajax function after loading jQuery
 */
function theChampCallAjax(callback){
	// data to send
	if(typeof jQuery != 'undefined'){
		// ajax to authenticate user
		callback();
	}else{
		// load jQuery dynamically
		theChampGetScript('http://code.jquery.com/jquery-latest.min.js', callback);
	}
}

/**
 * Load jQuery dynamically
 */
function theChampGetScript(url, success) {
	var script = document.createElement('script');
	script.src = url;
	var head = document.getElementsByTagName('head')[0],
		done = false;
	// Attach handlers for all browsers
	script.onload = script.onreadystatechange = function() {
	  if (!done && (!this.readyState
		   || this.readyState == 'loaded'
		   || this.readyState == 'complete')) {
		done = true;
		success();
		script.onload = script.onreadystatechange = null;
		head.removeChild(script);
	  }
	};
	head.appendChild(script);
}

/**
 * Get elements by class name without jQuery
 */
function theChampGetElementsByClass(node, classname) {
	if (node.getElementsByClassName) { // use native implementation if available
		return node.getElementsByClassName(classname);
	} else {
		return (function getElementsByClass(searchClass,node) {
			if ( node == null ) {
				node = document;
			}
			var classElements = [],
			els = node.getElementsByTagName("*"),
			elsLen = els.length,
			pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)"), i, j;

			for (i = 0, j = 0; i < elsLen; i++) {
				if ( pattern.test(els[i].className) ) {
					classElements[j] = els[i];
					j++;
				}
			}
			return classElements;
		})(classname, node);
	}
}

theChampLoadEvent(function(){
	if(typeof jQuery != 'undefined'){
		jQuery('.the_champ_login_container').each(function(){
			var links = jQuery(this).find('a');
			if(!jQuery(links).length){
				jQuery(this).remove();
			}else{
				jQuery(links).css('display', 'inline').css('visibility', 'visible');
				if(jQuery(links).css('display') == 'none' || jQuery(links).css('visibility') == 'hidden'){
					jQuery(links).attr('style', 'display: inline !important; visibility: visible !important');
				}
			}
		});
		jQuery('.the_champ_sharing_container').each(function(){
			if(!jQuery(this).find('.theChampSharingMoreButton').length){
				jQuery(this).remove();
			}else{
				jQuery(this).find('.theChampSharingMoreButton').attr('style', 'display: inline !important; visibility: visible !important');
			}
		});
	}else{
		var elems = theChampGetElementsByClass(document, 'the_champ_login_container');
		for(var i = 0; i < elems.length; i++){
			var links = elems[i].getElementsByTagName('a');
			if(!links.length){
				elems[i].parentNode.removeChild(elems[i]);
			}else{
				for(var j = 0; j < links.length; j++){
					if(links[j].style.display == 'none' || links[j].style.visibility == 'hidden'){
						links[j].setAttribute('style', 'display: inline !important; visibility: visible !important');
					}
				}
			}
		}
		var sharingElems = theChampGetElementsByClass(document, 'the_champ_sharing_container');
		for(var i = 0; i < sharingElems.length; i++){
			var links = theChampGetElementsByClass(sharingElems[i], 'theChampSharingMoreButton');
			if(!links.length){
				sharingElems[i].parentNode.removeChild(sharingElems[i]);
			}else{
				links[0].setAttribute('style', 'display: inline !important; visibility: visible !important');
			}
		}
	}
});