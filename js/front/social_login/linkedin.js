<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: <?php echo isset($theChampLoginOptions['li_key']) ? $theChampLoginOptions['li_key'] : '' ?>
</script>
<script>
<!-- LinkedIn login -->
IN.Event.on(IN, 'auth', function(){
	theChampLoadingIcon();
	IN.API.Profile("me").
	fields(["email-address", "id", "first-name", "last-name", "headline", "picture-url", "public-profile-url"]).
	result(function(result) {
		if(result.values[0].id && result.values[0].id != ''){
			theChampAjaxUserAuth(result.values[0], 'linkedin');
		}
	});
});
</script>