<div id="vk_api_transport"></div>
<script>
window.vkAsyncInit = function() {
    VK.init({
        apiId: <?php echo isset($theChampLoginOptions["vk_key"]) && $theChampLoginOptions["vk_key"] != "" ? $theChampLoginOptions["vk_key"] : 0 ?>
    });
	// callback
	theChampDisplayLoginIcon(document, 'theChampVkontakteButton');
};

setTimeout(function() {
	var el = document.createElement("script");
	el.type = "text/javascript";
	el.src = "http://vk.com/js/api/openapi.js";
	el.async = true;
	document.getElementById("vk_api_transport").appendChild(el);
}, 0);

function theChampInitializeVKLogin(){
	VK.Auth.login(function(response){
		if (response.session.mid) {
			VK.Api.call('getProfiles', {uids: response.session.mid, fields: 'uid, first_name, last_name, nickname, photo'}, function(profile) {
				if(profile.response[0].uid){
					theChampCallAjax(function(){
						theChampAjaxUserAuth(profile.response[0], 'vkontakte');
					});
				}
			});
		}else {
			alert('Error in authentication');
		}
	});
}
</script>