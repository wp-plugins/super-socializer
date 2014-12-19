function theChampHorizontalCounterOptionsToggle(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_horizontal_counter_options").css("display", "table-row-group")
    } else {
        jQuery("#the_champ_horizontal_counter_options").css("display", "none")
    }
}

function theChampVerticalCounterOptionsToggle(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_vertical_counter_options").css("display", "table-row-group")
    } else {
        jQuery("#the_champ_vertical_counter_options").css("display", "none")
    }
}

function theChampToggleOffset(e) {
    var t = e == "left" ? "right" : "left";
    jQuery("#the_champ_sc_" + e + "_offset_rows").css("display", "table-row-group");
    jQuery("#the_champ_sc_" + t + "_offset_rows").css("display", "none")
}
if (typeof String.prototype.trim !== "function") {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, "")
    }
}
jQuery(document).ready(function() {
    jQuery("#the_champ_sc_rearrange, #the_champ_sc_vertical_rearrange").sortable();
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