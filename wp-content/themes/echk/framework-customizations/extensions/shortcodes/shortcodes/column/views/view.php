<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
//custom
$custom_id = (isset($atts['custom_id']) && $atts['custom_id']) ? $atts['custom_id'] : '';
$custom_data = (isset($atts['custom_data']) && $atts['custom_data']) ? $atts['custom_data'] : '';
$class .= (isset($atts['custom_class']) && $atts['custom_class']) ? ' '.$atts['custom_class'] : '';

?>
<div id="<?php echo esc_attr($atts['custom_id'])?>" class="<?php echo esc_attr($class); ?>" <?php echo $atts['custom_data']?>>
	<?php echo do_shortcode($content); ?>
</div>
