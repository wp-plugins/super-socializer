<script>
theChampLoadEvent(function(){
	var commentForm = document.getElementById('commentform');
	if(commentForm){
		<?php
		if(isset($theChampFacebookOptions['commenting_title']) && $theChampFacebookOptions['commenting_title'] != ''){
			?>
			document.getElementById('reply-title').innerHTML = '<?php echo $theChampFacebookOptions['commenting_title'] ?>';
			<?php
		}
		?>
		commentForm.innerHTML = '<div class="fb-comments" data-href="<?php echo isset($theChampFacebookOptions['urlToComment']) && $theChampFacebookOptions['urlToComment'] != '' ? $theChampFacebookOptions["urlToComment"] : get_permalink(); ?>" <?php echo isset($theChampFacebookOptions['comment_color']) && $theChampFacebookOptions['comment_color'] != '' ? ' data-colorscheme="'.$theChampFacebookOptions["comment_color"].'"' : ''; echo isset($theChampFacebookOptions['comment_numposts']) && $theChampFacebookOptions['comment_numposts'] != '' ? ' data-numposts="'.$theChampFacebookOptions["comment_numposts"].'"' : ''; echo isset($theChampFacebookOptions['comment_width']) && $theChampFacebookOptions['comment_width'] != '' ? ' data-width="'.$theChampFacebookOptions["comment_width"].'"' : ''; echo isset($theChampFacebookOptions['comment_orderby']) && $theChampFacebookOptions['comment_orderby'] != '' ? ' data-order-by="'.$theChampFacebookOptions["comment_orderby"].'"' : ''; echo isset($theChampFacebookOptions['comment_mobile']) && $theChampFacebookOptions['comment_mobile'] != '' ? ' data-mobile="'.$theChampFacebookOptions["comment_mobile"].'"' : ''; ?> ></div>';
	}
	FB.init({
		appId      : '<?php echo isset($theChampLoginOptions['fb_key']) && $theChampLoginOptions['fb_key'] != '' ? $theChampLoginOptions['fb_key'] : '' ?>', // App ID
		channelUrl : '//<?php echo site_url() ?>/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
	});
});
</script>