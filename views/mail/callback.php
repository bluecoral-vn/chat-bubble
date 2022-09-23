<?php
/*
*
* View Name: Mail callback
*
*/

if (!defined('ABSPATH')) exit;

global $mail_data; 
extract($mail_data); ?>

	<p><?php echo sprintf(__('Hi %s,', 'chat-bubble'), get_bloginfo('name')); ?></p>
	
<?php if (!empty($title) || !empty($url)) { ?>
	<p><?php echo sprintf(__('You have a callback request at %s %s', 'chat-bubble'), '<strong>'.@$title.'</strong>', '- <a href="'.esc_attr(@$url).'">'.@$url.'</a>'); ?></p>
<?php } ?>

	<p><?php _e('Detail information', 'chat-bubble'); ?>:</p>
	
	<ul>
	<?php if (!empty($fname)) { ?>
		<li><?php echo sprintf(__('Name: %s,', 'chat-bubble'), $fname); ?></li>		
	<?php } ?>
	
	<?php if (!empty($fphone)) { ?>
		<li><?php echo sprintf(__('Phone: %s,', 'chat-bubble'), $fphone); ?></li>		
	<?php } ?>
	
	<?php if (!empty($fmail)) { ?>
		<li><?php echo sprintf(__('Email address: %s,', 'chat-bubble'), $fmail); ?></li>		
	<?php } ?>
	
	<?php if ((float) $ftime > 0) {
		$date_format = get_option('date_format'); 
		
		switch ($fdate) {
			case '0':
				$day_lbl = __('Today', 'chat-bubble');
				break;
				
			case '1':
				$day_lbl = __('Tomorrow', 'chat-bubble');
				break;
				
			default:
				$day_lbl = date($date_format, strtotime('+'.$fdate.'days')); 
		}
		
		$timeopt = date('H:i A', ((float) $ftime * 3600)); ?>
		<li><?php echo sprintf(__('Request time: %s,', 'chat-bubble'), $day_lbl.' '.$timeopt); ?></li>	
	<?php } else { ?>	
		<li><?php echo sprintf(__('Request time: %s,', 'chat-bubble'), $mail_data['now']); ?></li>		
	<?php } ?>
	
	<?php if (!empty($fmessage)) { ?>
		<li><?php echo sprintf(__('Message: %s,', 'chat-bubble'), '<p>'.nl2br($fmessage).'</p>'); ?></li>		
	<?php } ?>
	</ul>