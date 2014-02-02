<script>
// Login in the current user via Facebook and ask for email permission
function theChampAuthUserFB() {
	// Check if the current user is logged in and has authorized the app
	FB.getLoginStatus(checkLoginStatus);
}

// Check the result of the user status. Prompt for login if user is not connected
function checkLoginStatus(response){
	if(response && response.status == 'connected') {
		theChampLoadingIcon();
		loginUser();
	}else {
		FB.login(loginUser, {scope:'email'});
	}
}

// Check the result of the user status. Prompt for login if user is not connected
function loginUser(){
	FB.api('/me', function(response) {
		if(!response.id){
			return;
		}
		<?php
		if(the_champ_facebook_feed_enabled()){
			?>
			theChampFBFeedPost();
			<?php
		}
		?>
		theChampCallAjax(function(){
			theChampAjaxUserAuth(response, 'facebook');
		});
	});
}
</script>