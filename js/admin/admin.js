function theChampEmailPopupOptions(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_email_popup_options").css("display", "block")
    } else {
        jQuery("#the_champ_email_popup_options").css("display", "none")
    }
}

function theChampCommentingOptions(e) {
    if (jQuery(e).is(":checked")) {
        jQuery("#the_champ_commenting_extra").css("display", "none")
    } else {
        jQuery("#the_champ_commenting_extra").css("display", "table-row-group")
    }
}
jQuery(document).ready(function() {
    jQuery("#tabs").tabs();
    jQuery("#the_champ_login_redirection_column").find("input[type=radio]").click(function() {
        if (jQuery(this).attr("id") && jQuery(this).attr("id") == "the_champ_login_redirection_custom") {
            jQuery("#the_champ_login_redirection_url").css("display", "block")
        } else {
            jQuery("#the_champ_login_redirection_url").css("display", "none")
        }
    });
    if (jQuery("#the_champ_login_redirection_custom").is(":checked")) {
        jQuery("#the_champ_login_redirection_url").css("display", "block")
    } else {
        jQuery("#the_champ_login_redirection_url").css("display", "none")
    }
    jQuery("#the_champ_register_redirection_column").find("input[type=radio]").click(function() {
        if (jQuery(this).attr("id") && jQuery(this).attr("id") == "the_champ_register_redirection_custom") {
            jQuery("#the_champ_register_redirection_url").css("display", "block")
        } else {
            jQuery("#the_champ_register_redirection_url").css("display", "none")
        }
    });
    if (jQuery("#the_champ_register_redirection_custom").is(":checked")) {
        jQuery("#the_champ_register_redirection_url").css("display", "block")
    } else {
        jQuery("#the_champ_register_redirection_url").css("display", "none")
    }
    jQuery(".the_champ_help_bubble").attr('title', theChampHelpBubbleTitle)
    jQuery(".the_champ_help_bubble").toggle(function() {
        jQuery("#" + jQuery(this).attr("id") + "_cont").show()
        jQuery(this).attr('title', theChampHelpBubbleCollapseTitle);
    }, function() {
        jQuery("#" + jQuery(this).attr("id") + "_cont").hide();
        jQuery(this).attr('title', theChampHelpBubbleTitle);
    });
    jQuery("#the_champ_fb_comment_switch_wp").keyup(function() {
        jQuery(this).prev("span").remove();
        if (jQuery(this).val().trim() == "") {
            jQuery(this).before('<span style="color:red">This cannot be blank</span>')
        } else if (jQuery(this).val().trim() == jQuery("#the_champ_fb_comment_switch_fb").val().trim()) {
            jQuery(this).before('<span style="color:red">This cannot be same as text on "Switch to Facebook Commenting" button</span>')
        }
    });
    jQuery("#the_champ_fb_comment_switch_fb").keyup(function() {
        jQuery(this).prev("span").remove();
        if (jQuery(this).val().trim() == "") {
            jQuery(this).before('<span style="color:red">This cannot be blank</span>')
        } else if (jQuery(this).val().trim() == jQuery("#the_champ_fb_comment_switch_wp").val().trim()) {
            jQuery(this).before('<span style="color:red">This cannot be same as text on "Switch to WordPress Commenting" button</span>')
        }
    })
})