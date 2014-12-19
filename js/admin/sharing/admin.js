function theChampCapitaliseFirstLetter(e) {
    return e.charAt(0).toUpperCase() + e.slice(1)
}

function theChampHorizontalSharingOptionsToggle(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_horizontal_sharing_options").css("display", "table-row-group")
    } else {
        jQuery("#the_champ_horizontal_sharing_options").css("display", "none")
    }
}

function theChampVerticalSharingOptionsToggle(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_vertical_sharing_options").css("display", "table-row-group")
    } else {
        jQuery("#the_champ_vertical_sharing_options").css("display", "none")
    }
}

function theChampToggleOffset(e) {
    var t = e == "left" ? "right" : "left";
    jQuery("#the_champ_ss_" + e + "_offset_rows").css("display", "table-row-group");
    jQuery("#the_champ_ss_" + t + "_offset_rows").css("display", "none")
}
if (typeof String.prototype.trim !== "function") {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, "")
    }
}
jQuery(document).ready(function() {
    jQuery("#the_champ_ss_rearrange, #the_champ_ss_vertical_rearrange").sortable();
    jQuery(".theChampHorizontalSharingProviderContainer input").click(function() {
        if (jQuery(this).is(":checked")) {
            jQuery("#the_champ_ss_rearrange").append('<li title="' + jQuery(this).val() + '" id="the_champ_re_horizontal_' + jQuery(this).val().replace(" ", "_") + '" ><i class="theChampSharingButton theChampSharing' + theChampCapitaliseFirstLetter(jQuery(this).val().replace(" ", "")) + 'Button"></i><input type="hidden" name="the_champ_sharing[horizontal_re_providers][]" value="' + jQuery(this).val() + '"></li>')
        } else {
            jQuery("#the_champ_re_horizontal_" + jQuery(this).val().replace(" ", "_")).remove()
        }
    });
    jQuery(".theChampVerticalSharingProviderContainer input").click(function() {
        if (jQuery(this).is(":checked")) {
            jQuery("#the_champ_ss_vertical_rearrange").append('<li title="' + jQuery(this).val() + '" id="the_champ_re_vertical_' + jQuery(this).val().replace(" ", "_") + '" ><i class="theChampSharingButton theChampSharing' + theChampCapitaliseFirstLetter(jQuery(this).val().replace(" ", "")) + 'Button"></i><input type="hidden" name="the_champ_sharing[vertical_re_providers][]" value="' + jQuery(this).val() + '"></li>')
        } else {
            jQuery("#the_champ_re_vertical_" + jQuery(this).val().replace(" ", "_")).remove()
        }
    });
    // horizontal target url
    jQuery("#the_champ_target_url_column").find("input[type=radio]").click(function() {
        if (jQuery(this).attr("id") && jQuery(this).attr("id") == "the_champ_target_url_custom") {
            jQuery("#the_champ_target_url_custom_url").css("display", "block")
        } else {
            jQuery("#the_champ_target_url_custom_url").css("display", "none")
        }
    });
	// vertical target url
	jQuery("#the_champ_vertical_target_url_column").find("input[type=radio]").click(function() {
        if (jQuery(this).attr("id") && jQuery(this).attr("id") == "the_champ_vertical_target_url_custom") {
            jQuery("#the_champ_vertical_target_url_custom_url").css("display", "block")
        } else {
            jQuery("#the_champ_vertical_target_url_custom_url").css("display", "none")
        }
    });
    // horizontal target url
	if (jQuery("#the_champ_target_url_custom").is(":checked")) {
        jQuery("#the_champ_target_url_custom_url").css("display", "block")
    } else {
        jQuery("#the_champ_target_url_custom_url").css("display", "none")
    }
	// vertical target url
	if (jQuery("#the_champ_vertical_target_url_custom").is(":checked")) {
        jQuery("#the_champ_vertical_target_url_custom_url").css("display", "block")
    } else {
        jQuery("#the_champ_vertical_target_url_custom_url").css("display", "none")
    }
})