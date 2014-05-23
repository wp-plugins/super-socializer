// Login in the current user via Facebook and ask for email permission
function theChampAuthUserFB() {
	// Check if the current user is logged in and has authorized the app
	FB.getLoginStatus(theChampFBCheckLoginStatus);
}

// Check the result of the user status. Prompt for login if user is not connected
function theChampFBCheckLoginStatus(response){
	if(response && response.status == 'connected') {
		theChampLoadingIcon();
		theChampFBLoginUser();
	}else {
		FB.login(theChampFBLoginUser, {scope:theChampFacebookScope});
	}
}

// Check the result of the user status. Prompt for login if user is not connected
function theChampFBLoginUser(){
	FB.api('/me', function(response) {
		if(!response.id){
			return;
		}
		if(theChampFBFeedEnabled){
			theChampFBFeedPost();
		}
		theChampCallAjax(function(){
			theChampAjaxUserAuth(response, 'facebook');
		});
	});
}