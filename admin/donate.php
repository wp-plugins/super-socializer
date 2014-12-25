<div class="stuffbox" style="width:94%">
	<h3><label><?php _e('Donate', 'Super-Socializer');?></label></h3>
	<div class="inside">
	<p><?php _e('If you like the plugin, want to get it improved and want to see it at the top of other plugins, please consider making a donation.', 'Super-Socializer') ?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
			<input type="text" style="width: 50px" name="amount" />
			<span>USD</span>
			<input type="hidden" value="_xclick" name="cmd" />
			<input type="hidden" value="lordofthechamps@gmail.com" name="business" />
			<input type="hidden" value="Super Socializer" name="item_name" />
			<input type="hidden" value="0" name="no_shipping" />
			<input type="hidden" value="1" name="no_note" />
			<input type="hidden" value="<?php echo site_url() ?>/wp-admin/admin.php?page=the-champ" name="return" />
			<input type="hidden" value="Return to your dashboard" name="cbt" />
			<input type="hidden" value="USD" name="currency_code" />
			<br/><br/>
			<input type="submit" class="the_champ_paypal_submit" value="<?php _e('Donate', 'Super-Socializer') ?>" style="background-color: #1D9AFC; padding:9px 42px 9px; cursor:pointer; font-size:12px; border: 0; color: #fff; border-radius: 2px; font-weight: 700; text-transform: uppercase;" />
		</form>
	</div>
</div>