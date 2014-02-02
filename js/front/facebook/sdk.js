<script type='text/javascript' src='//connect.facebook.net/en_US/all.js'></script>
<div id="fb-root"></div>
<script>
// init the FB JS SDK
// Additional initialization code such as adding Event Listeners goes here
FB.init({
	appId      : '<?php echo isset($theChampLoginOptions["fb_key"]) && $theChampLoginOptions["fb_key"] != "" ? $theChampLoginOptions["fb_key"] : "" ?>', // App ID
	channelUrl : '//<?php echo site_url() ?>/channel.html', // Channel File
	status     : true, // check login status
	cookie     : true, // enable cookies to allow the server to access the session
	xfbml      : true  // parse XFBMLw
});
</script>