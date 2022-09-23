<?php
/*
*
* View Name: Meta box callback
*
*/

if (!defined('ABSPATH')) exit;

global $post; 
$cbbs = get_post_meta($post->ID, 'cbb_data', true); 
$fields = array(
	'fname' => __('Name', 'chat-bubble'),
	'fmail' => __('Email address', 'chat-bubble'),
	'fphone' => __('Phone number', 'chat-bubble'),
	'title' => __('Page title', 'chat-bubble'),
	'url' => __('Page link', 'chat-bubble'),
	'now' => __('Callback time', 'chat-bubble'),
	'ip' => __('IP address', 'chat-bubble'),
	'fmessage' => __('Message', 'chat-bubble'),
); ?>

	<ul>
	<?php foreach ($fields as $key => $label) { 
		if (!isset($cbbs[$key])) continue; 
		
		switch ($key) {
			case 'fmessage':
				$value = nl2br($cbbs[$key]);
				break;
				
			case 'now':
				if ((float) $cbbs['ftime'] > 0) {
					$date_format = get_option('date_format'); 
			
					switch ($fdate) {
						case '0':
							$day_lbl = __('Today', 'chat-bubble');
							break;
							
						case '1':
							$day_lbl = __('Tomorrow', 'chat-bubble');
							break;
							
						default:
							$day_lbl = date($date_format, strtotime('+'.$cbbs['fdate'].'days')); 
					}
					
					$timeopt = date('H:i A', ((float) $cbbs['ftime'] * 3600));
					$value = $day_lbl.' '.$timeopt;
				} else {
					$value = $cbbs[$key];
				}
				break;
			
			default:
				$value = $cbbs[$key];
		} ?>
		<li>
			<label for="<?php echo esc_attr('cbb-'.$key); ?>" style="min-width: 100px;display: inline-block;vertical-align: top;"><?php echo $label; ?></label>
			<code id="<?php echo esc_attr('cbb-'.$key); ?>" style="display: inline-block;"><?php echo stripcslashes($value); ?></code>
		</li>
	<?php } ?>
	</ul>