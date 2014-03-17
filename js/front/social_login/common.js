<script>
<?php
if(isset($_GET['theChampVerified']) || isset($_GET['theChampUnverified'])){
	?>
	// show thickbox on window load
	theChampLoadEvent(function(){
		<?php
		$ajaxUrl = add_query_arg( 
			array(
				'height' => 60,
				'width' => 300,
				'action' => 'the_champ_notify',
				'message' => urlencode(isset($_GET['theChampUnverified']) ? __('Please verify your email address to login.', 'TheChamp') : __('Your email has been verified. Now you can login to your account', 'TheChamp'))
			), 
			'admin-ajax.php'
		);
		?>
		tb_show('<?php _e('Notification', 'TheChamp') ?>', '<?php echo admin_url().$ajaxUrl; ?>');
	});
	<?php
}
if(isset($_GET['theChampEmail']) && isset($_GET['par']) && trim($_GET['par']) != ''){
	$ajaxUrl = add_query_arg( 
		array(
			'height' => 110,
			'width' => 300,
			'action' => 'the_champ_ask_email'
		), 
		'admin-ajax.php'
	);
	?>
	// get trim() working in IE
	if(typeof String.prototype.trim !== 'function') {
	  String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, ''); 
	  }
	}
	
	// show thickbox on window load
	theChampLoadEvent(function(){
		// override tb_remove
		/*
		var old_tb_remove = window.tb_remove;
		var tb_remove = function() {
			old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
		};
		*/
		tb_show('Email required', '<?php echo admin_url().$ajaxUrl; ?>');
	})
	
	function theChampValidateEmail(email){
		var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	
	function the_champ_save_email(elem){
		var email = document.getElementById('the_champ_email').value.trim();
		// validate email
		if(elem.id == 'save' && !theChampValidateEmail(email)){
			document.getElementById('the_champ_error').innerHTML = '<?php echo isset($theChampLoginOptions["email_error_message"]) ? $theChampLoginOptions["email_error_message"] : "" ?>';
			return;
		}
		theChampCallAjax(function(){
			theChampSaveEmail(elem.id, email);
		});
	}
	
	function theChampSaveEmail(elementId, email){
		document.getElementById('the_champ_error').innerHTML = '<img src="<?php echo plugins_url('../../../images/ajax_loader.gif', __FILE__); ?>" />';
		jQuery.ajax({
		  type: 'POST',
		  dataType: 'json',
		  url: '<?php echo get_admin_url() ?>admin-ajax.php',
		  data: {
			action: 'the_champ_save_email',
			elemId: elementId,
			email: email,
			id: '<?php echo isset($_GET['par']) ? trim($_GET['par']) : '' ?>'
		  },
		  success: function(data, textStatus, XMLHttpRequest){
			window.history.pushState({"html":'html',"pageTitle":'page title'},"", '?done=1');
			if(data.status == 1 && data.message == 'success'){
				location.href = '<?php echo site_url(); ?>';
			}else if(data.status == 1 && data.message == 'cancelled'){
				// close the popup
				tb_remove();
			}else if(data.status == 1 && data.message == 'verify'){
				document.getElementById('TB_ajaxContent').innerHTML = '<strong><?php _e('Please check your email inbox to complete the registration.', 'TheChamp') ?></strong>';
			}else if(data.status == 0){
				document.getElementById('the_champ_error').innerHTML = data.message;
			}
		  }
		});
	}
	<?php
}
?>
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
 * Display loading image in place of Social Login interface
 */
function theChampLoadingIcon(){
	jQuery('.the_champ_login_container').html('<img id="the_champ_loading_image" src="<?php echo plugins_url('../../../images/ajax_loader.gif', __FILE__); ?>" />');
}

/**
 * Call Ajax to authenticate user
 */
function theChampAjaxUserAuth(response, provider){
	theChampLoadingIcon();
	jQuery.ajax({
	  type: 'POST',
	  dataType: 'json',
	  url: '<?php echo get_admin_url() ?>admin-ajax.php',
	  data: {
		action: 'the_champ_user_auth',
		profileData: response,
		provider: provider
	  },
	  success: function(data, textStatus, XMLHttpRequest){
		if(data.status == 1){
			location.href = '<?php echo the_champ_get_login_redirection_url(); ?>';
		}else if(data.message.match(/ask/) !== null){
			//alert(typeof data.message.match(/ask/) +"\r\n"+ data.message.match(/ask/))
			var keyArr = data.message.split('|');
			location.href = '<?php echo site_url() ?>?theChampEmail=1&par=' + keyArr[1];
		}else if(data.message == 'unverified'){
			location.href = '<?php echo site_url() ?>?theChampUnverified=1';
		}
	  }
	});
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
 * Initiate Social Login process according to provider
 */
function theChampInitiateLogin(icon){
	if(icon.title == 'Login with Facebook'){
		theChampAuthUserFB();
	}else if(icon.title == 'Login with Twitter'){
		<?php echo 'theChampPopup(\''.site_url().'?theChampAuth=Twitter\')'; ?>
	}else if(icon.title == 'Login with Linkedin'){
		IN.User.authorize();
		return false;
	}else if(icon.title == 'Login with Google Plus'){
		theChampInitializeGPLogin();
	}else if(icon.title == 'Login with Vkontakte'){
		theChampInitializeVKLogin();
	}
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

/**
 * Display login icons
 */
function theChampDisplayLoginIcon(node, className){
	var icons = theChampGetElementsByClass(node, className);
	for(var i = 0; i < icons.length; i++){
		icons[i].style.display = 'block';
	}
}
</script>