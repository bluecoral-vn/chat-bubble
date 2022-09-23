<?php
/*
*
* View Name: Chat Bubble features view
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
				<div class="ufa-form">					
				<?php do_action('cbb_items_form_header'); ?>				
									
					<div class="form-header">
						<div class="row">
							<div class="col-md-12 col-border-bottom">
								<h2><?php _e('Features', 'chat-bubble'); ?></h2>
							</div>
						</div>
					</div>
					
					<div class="form-content">	
					
					</div>
					
					<div class="form-footer">						
					<?php do_action('cbb_option_form_inner_footer'); ?>
					</div>		
					
				<?php do_action('cbb_items_form_footer'); ?>
				</div>
			</div>
		</div>
	
	<?php do_action('cbb_items_screen_footer'); ?>
	</div>
	