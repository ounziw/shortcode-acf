<?php

class ShortCode_field extends acf_Field
{

	function __construct($parent)
	{
		// do not delete!
		parent::__construct($parent);

		// set name / title
		$this->name = 'ShortCode'; // variable name (no spaces / special characters / etc)
		$this->title = __("ShortCode",'shortcode-acf'); // field label (Displayed in edit screens)

	}

	function create_field($field)
	{
		echo '<input type="text" value="' . $field['value'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '" />';
		global $shortcode_tags;
		print '<p>';
		print '<span id="sc_acf_detail_'.$field['label'].'" class="button">'.__('View the list of shortcodes','shortcode-acf').'</span>';
		print '<span id="sc_acf_hide_'.$field['label'].'" class="button" style="display:none">'.__('Hide the list of shortcodes','shortcode-acf').'</span>';
		print '</p>';
		print '<pre id="sc_acf_'.$field['label'].'" style="display:none">';
		foreach( $shortcode_tags as $key => $val ) {
			print "[" . $key . "][/" . $key . "]\n"; 
		};
		print '</pre>';
?>
		<script type="text/javascript">
		jQuery(function() {
			jQuery('#sc_acf_detail_<?php echo $field['label'];?>').click(function(){
				jQuery('#sc_acf_<?php echo $field['label'];?>').css('display','block');
				jQuery('#sc_acf_hide_<?php echo $field['label'];?>').css('display','inline');
				jQuery('#sc_acf_detail_<?php echo $field['label'];?>').css('display','none');
			});
			jQuery('#sc_acf_hide_<?php echo $field['label'];?>').click(function(){
				jQuery('#sc_acf_<?php echo $field['label'];?>').css('display','none');
				jQuery('#sc_acf_hide_<?php echo $field['label'];?>').css('display','none');
				jQuery('#sc_acf_detail_<?php echo $field['label'];?>').css('display','inline');
			});
		});
		</script>	
<?php
	}

	function get_value_for_api($post_id, $field)
	{
		$value = parent::get_value($post_id, $field);
        return do_shortcode($value);
	}
}
