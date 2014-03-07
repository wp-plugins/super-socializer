theChampLoadEvent(function(){
	var commentForm = document.getElementById('commentform');
	if(commentForm){
		if(theChampFBCommentTitleEnable){
			if(document.getElementById('reply-title')){
				document.getElementById('reply-title').innerHTML = theChampFBCommentTitle;
			}
		}
		var html = '';
		html = '<div class="fb-comments" data-href="'+theChampFBCommentUrl+'"';
		if(theChampFBCommentColor != ''){
			html += ' data-colorscheme="'+theChampFBCommentColor+'"';
		}
		if(theChampFBCommentNumPosts != ''){
			html += ' data-numposts="'+theChampFBCommentNumPosts+'"';
		}
		if(theChampFBCommentWidth != ''){
			html += ' data-width="'+theChampFBCommentWidth+'"';
		}
		if(theChampFBCommentOrderby != ''){
			html += ' data-order-by="'+theChampFBCommentOrderby+'"';
		}
		if(theChampFBCommentMobile != ''){
			html += ' data-mobile="'+theChampFBCommentMobile+'"';
		}
		html += ' ></div>';
		commentForm.innerHTML = html;
	}
	FB.init({
		appId      : theChampFBAppID, // App ID
		channelUrl : '//'+theChampSiteUrl+'/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
	});
});