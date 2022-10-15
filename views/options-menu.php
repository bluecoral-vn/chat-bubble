<?php
/*
*
* View Name: Chat Bubble options menu view
*
*/

if (!defined('ABSPATH')) exit;

global $cbb_options; 
extract($cbb_options); ?>

	<div class="col-md-12 ufa-nav">
		<ul class="nav">
			<li class="nav-item" style="margin-right: 1.5em; font-size: 22px; font-weight: 500">
				Chat Bubble
			</li>
		<?php foreach ($this->cbb_settings_page_menu() as $k => $menu_item) { ?>
			<li class="nav-item <?php echo (@$_GET['page'] == $k) ? 'active' : ''; ?>" style="margin-right: 1.5em;">
				<a href="<?php echo admin_url('admin.php?page='.$k); ?>"><?php echo $menu_item; ?></a>
			</li>
		<?php } ?>
			<li class="nav-item nav-item-support">
				<a href="mailto:support@bluecoral.vn" data-toggle="tooltip" data-placement="top" title="<?php _e('Need Support ?', 'chat-bubble'); ?>">
					<i class="dashicons dashicons-sos"></i> 
					<span class="label"><?php _e('Need Support ?', 'chat-bubble'); ?></span>
				</a>
			</li>
			<li class="nav-item nav-item-beer">
				<a href="https://www.buymeacoffee.com/nguyenrom" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php _e('Buy me a beer!', 'chat-bubble'); ?>">
					<i class="dashicons dashicons-beer"></i>
					<span class="label"><?php _e('Buy me a beer!', 'chat-bubble'); ?></span>
				</a>
			</li>
		</ul>
	</div>

	