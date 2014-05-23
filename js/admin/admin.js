jQuery(document).ready(function() {    
    jQuery( "#tabs" ).tabs();
	// login redirection
	jQuery('#the_champ_login_redirection_column').find('input[type=radio]').click(function(){
		if(jQuery(this).attr('id') && jQuery(this).attr('id') == 'the_champ_login_redirection_custom'){
			jQuery('#the_champ_login_redirection_url').css('display', 'block');
		}else{
			jQuery('#the_champ_login_redirection_url').css('display', 'none');
		}
	});
	if(jQuery('#the_champ_login_redirection_custom').is(':checked')){
		jQuery('#the_champ_login_redirection_url').css('display', 'block');
	}else{
		jQuery('#the_champ_login_redirection_url').css('display', 'none');
	}
	// registration redirection
	jQuery('#the_champ_register_redirection_column').find('input[type=radio]').click(function(){
		if(jQuery(this).attr('id') && jQuery(this).attr('id') == 'the_champ_register_redirection_custom'){
			jQuery('#the_champ_register_redirection_url').css('display', 'block');
		}else{
			jQuery('#the_champ_register_redirection_url').css('display', 'none');
		}
	});
	if(jQuery('#the_champ_register_redirection_custom').is(':checked')){
		jQuery('#the_champ_register_redirection_url').css('display', 'block');
	}else{
		jQuery('#the_champ_register_redirection_url').css('display', 'none');
	}
	// help content
	jQuery('.the_champ_help_bubble').toggle(
		function(){
			jQuery('#' + jQuery(this) . attr('id') + '_cont').show();
		},
		function(){
			jQuery('#' + jQuery(this) . attr('id') + '_cont').hide();
		}
	);
});

// email popup options toggle
function theChampEmailPopupOptions(elem){
	if(jQuery(elem).is(':checked')){
		jQuery('#the_champ_email_popup_options').css('display', 'block');
	}else{
		jQuery('#the_champ_email_popup_options').css('display', 'none');
	}
}