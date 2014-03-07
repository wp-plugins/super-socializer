<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	// init the FB JS SDK
	FB.init({
		appId      : '<?php echo isset($theChampLoginOptions["fb_key"]) && $theChampLoginOptions["fb_key"] != "" ? $theChampLoginOptions["fb_key"] : "" ?>', // App ID
		channelUrl : '<?php echo site_url() ?>/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBMLw
	});
	// Additional initialization code such as adding Event Listeners goes here
	if ( typeof theChampDisplayLoginIcon == 'function' ) {
		theChampDisplayLoginIcon(document, 'theChampFacebookButton');
	}
};
// Load the SDK Asynchronously
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = '//connect.facebook.net/<?php echo isset($theChampFacebookOptions["comment_lang"]) && $theChampFacebookOptions["comment_lang"] != '' ? $theChampFacebookOptions["comment_lang"] : "en_US" ?>/all.js';
	ref.parentNode.insertBefore(js, ref);
}(document));
</script>