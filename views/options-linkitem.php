<?php
/*
*
* View Name: Chat Bubble options link item view
*
*/

if (!defined('ABSPATH')) exit;

$link_data = isset($this->link_data) ? (array) $this->link_data : array();  ?>

	<li class="bubble-item">
		<div class="card">
			<div class="card-header">
				<h5>Link</h5>
			</div>
			<div class="card-body hidden">
				<div class="container">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-header"><?php _e('URL', 'chat-bubble'); ?></div>
							<div class="col-md-9 col-content col-border-bottom">
								<input name="clink[]" type="text" placeholder="https://" class="regular-text form-control form-control-link-url" style="max-width: 25rem;" value="<?php echo esc_attr(stripcslashes(@$link_data['u'])); ?>" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-header"><?php _e('Link Text', 'chat-bubble'); ?></div>
							<div class="col-md-9 col-content col-border-bottom">
								<input name="ctext[]" type="text" placeholder="" class="regular-text form-control form-control-link-text" style="max-width: 25rem;" value="<?php echo esc_attr(stripcslashes(@$link_data['t'])); ?>" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row" style="">
							<div class="offset-md-3 col-md-9 col-content">
								<p>
									<label class="bubble-item-lbl">										
										<input type="checkbox" value="1" class="form-control bubble-item-blank" <?php checked((int) @$link_data['b'], 1); ?> />
										<input type="hidden" value="<?php echo (int) @$link_data['b']; ?>" name="cblank[]" />
									<?php _e('Open new tab.', 'chat-bubble'); ?>											
									</label>
								</p>										
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<a class="card-delete" href="javascript:;" title="<?php _e('Delete item', 'chat-bubble'); ?>" data-confirm="<?php _e('Do you want to remove this item?', 'chat-bubble'); ?>"><i class="dashicons dashicons-trash"></i></a>
		</div>										
	</li>