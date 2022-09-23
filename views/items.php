<?php
/*
*
* View Name: Chat Bubble options view
*
*/

if (!defined('ABSPATH')) exit;

global $cbb_options; 
extract($cbb_options); ?>

	<div class="wrap ufa-wrap">
	<?php do_action('cbb_items_screen_header'); ?>
	
		<div class="ufa-container">
		<?php $this->cbb_render_view('options-header'); ?>
			
		<?php $this->cbb_render_view('options-menu'); ?>
		
			<div class="col-md-12">
				<form method="POST" autocompleted="off" class="ufa-form">					
				<?php do_action('cbb_items_form_header'); ?>				
									
					<div class="form-header">
						<div class="row">
							<div class="col-md-12 col-border-bottom">
								<h2><?php _e('Bubble section', 'chat-bubble'); ?></h2>
							</div>
						</div>
					</div>
					
					<div class="form-content">	
						<div class="form-group">
							<div class="row">
							<?php $cbb = new CBB_Ad($cbb_options); ?>
								<div class="col-md-6 col-content col-border-bottom">
									<div class="col-md-6 col-header"><h4><?php _e('Inner Items', 'chat-bubble'); ?></h4></div>
									<div class="social-box">
									<?php $cbb->form_inner(); ?>
									</div>
								</div>
								<div class="col-md-6 col-content col-border-bottom">
									<div class="col-md-6 col-header"><h4><?php _e('Outer Items', 'chat-bubble'); ?></h4></div>
									<div class="social-box">
									<?php $cbb->form_outer(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-footer">
						<input name="opt_screen" type="hidden" value="items" />
						<button type="submit" name="submit_cbb" id="submit" class="btn btn-primary" value="Save Changes"><?php _e('Save Changes'); ?></button>
						
					<?php do_action('cbb_option_form_inner_footer'); ?>
					</div>		
					
				<?php do_action('cbb_items_form_footer'); ?>
				</form>
			</div>
		</div>
	
	<?php do_action('cbb_items_screen_footer'); ?>
	</div>