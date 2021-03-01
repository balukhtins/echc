<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
    'custom_id' => array(
        'label' => __('Custom ID', 'fw'),
        'desc'  => __('Insert ID', 'fw'),
        'type'  => 'text',
    ),
    'custom_class' => array(
        'label' => __('Custom Class', 'fw'),
        'desc'  => __('Insert Class', 'fw'),
        'type'  => 'text',
    ),
    'custom_data' => array(
        'label' => __('Custom Data', 'fw'),
        'desc'  => __('Insert Data', 'fw'),
        'type'  => 'text',
    ),
);
