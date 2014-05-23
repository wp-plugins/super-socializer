// get trim() working in IE
if(typeof String.prototype.trim !== 'function') {
  String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g, ''); 
  }
}

jQuery(document).ready(function() {    
    jQuery( "#the_champ_ss_rearrange, #the_champ_ss_vertical_rearrange" ).sortable();
	// provider checkbox
	jQuery('.theChampHorizontalSharingProviderContainer input').click(function(){
		if(jQuery(this).is(':checked')){
			jQuery('#the_champ_ss_rearrange').append('<li title="' + jQuery(this).val() + '" id="the_champ_re_horizontal_' + jQuery(this).val().replace(' ', '_') + '" ><i class="theChampSharingButton theChampSharing'+ jQuery(this).val().replace(' ', '') +'Button"></i><input type="hidden" name="the_champ_sharing[horizontal_re_providers][]" value="' + jQuery(this).val() + '"></li>');
		}else{
			jQuery('#the_champ_re_horizontal_' + jQuery(this).val().replace(' ', '_')).remove();
		}
	});
	
	// provider checkbox
	jQuery('.theChampVerticalSharingProviderContainer input').click(function(){
		if(jQuery(this).is(':checked')){
			jQuery('#the_champ_ss_vertical_rearrange').append('<li title="' + jQuery(this).val() + '" id="the_champ_re_vertical_' + jQuery(this).val().replace(' ', '_') + '" ><i class="theChampSharingButton theChampSharing'+ jQuery(this).val().replace(' ', '') +'Button"></i><input type="hidden" name="the_champ_sharing[vertical_re_providers][]" value="' + jQuery(this).val() + '"></li>');
		}else{
			jQuery('#the_champ_re_vertical_' + jQuery(this).val().replace(' ', '_')).remove();
		}
	});
});

// horizontal sharing options toggle
function theChampHorizontalSharingOptionsToggle(elem){
	if(jQuery(elem).is(':checked')){
		jQuery('#the_champ_horizontal_sharing_options').css('display', 'table-row-group');
	}else{
		jQuery('#the_champ_horizontal_sharing_options').css('display', 'none');
	}
}

// vertical sharing options toggle
function theChampVerticalSharingOptionsToggle(elem){
	if(jQuery(elem).is(':checked')){
		jQuery('#the_champ_vertical_sharing_options').css('display', 'table-row-group');
	}else{
		jQuery('#the_champ_vertical_sharing_options').css('display', 'none');
	}
}