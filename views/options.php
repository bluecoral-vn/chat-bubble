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
	<?php do_action('cbb_option_screen_header'); ?>
	
		<div class="ufa-container">
		<?php $this->cbb_render_view('options-header'); ?>
			
		<?php $this->cbb_render_view('options-menu'); ?>
		
			<div class="col-md-12">
				<form method="POST" autocompleted="off" class="ufa-form">
					<div class="form-header">
						<div class="row">
							<div class="col-md-12 col-border-bottom border-margin">
								<h2><?php _e('General Settings', 'chat-bubble'); ?></h2>
							</div>
						</div>
					</div>
					
				<?php do_action('cbb_option_form_header'); ?>
					
					<div class="form-content">						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Show Bubble', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">
									<p>
										<label for="enabled">
											<input name="enabled" type="hidden" value="0" />
											<input id="enabled" name="enabled" type="checkbox" class="form-control" value="1" <?php echo ($enabled === 1) ? 'checked' : ''; ?> />
											<?php _e('Show Chat Bubble at website.', 'chat-bubble'); ?>
										</label>	
									</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Bubble Fonts', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">
									<p>
										<label for="enabled_font_opensans">
											<input name="enabled_font_opensans" type="hidden" value="0" />
											<input id="enabled_font_opensans" name="enabled_font_opensans" type="checkbox" class="form-control" value="1" <?php echo ($enabled_font_opensans === 1) ? 'checked' : ''; ?> />
											<?php echo sprintf(__('Using <a href="%s" target="_blank">Open Sans Font</a>.', 'chat-bubble'), 'https://fonts.google.com/share?selection.family=Open+Sans:wght@300;400;600'); ?>
											<p class="description"><?php _e('Enqueue Open Sans Font to your site.', 'chat-bubble'); ?></p>
										</label>	
									</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Bubble Chat Message', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">									
									<input name="intro" type="text" id="intro" placeholder="<?php _e('Greeting chat message', 'chat-bubble'); ?>" class="regular-text code form-control" style="max-width: 25rem;" value="<?php echo esc_attr(stripslashes($intro)); ?>" />
									<p class="description"><?php _e('Enter your chat text message', 'chat-bubble'); ?></p>
									<p>
										<label for="enabled_intro">
											<input name="enabled_intro" type="hidden" value="0" />
											<input id="enabled_intro" name="enabled_intro" type="checkbox" class="form-control" value="1" <?php echo ($enabled_intro === 1) ? 'checked' : ''; ?> />
											<?php _e('Always show chat text message. It will be hidden if leave blank.', 'chat-bubble'); ?>
										</label>	
									</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Bubble custom class', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">									
									<input name="class" type="text" id="class" placeholder="<?php _e('Your custom class', 'chat-bubble'); ?>" class="regular-text code form-control" style="max-width: 25rem;" value="<?php echo esc_attr(stripslashes($class)); ?>" />
									<p class="description"><?php _e('Enter your custom class for bubble container: <strong>your-class-1 your-class-2</strong>', 'chat-bubble'); ?></p>
								</div>
							</div>
						</div>		
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Bubble custom theme color', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">									
									<input name="color" type="color" id="color" placeholder="#e77f11" class="regular-text code form-control" style="max-width: 10rem;padding: 0;" value="<?php echo (isset($color)) ? esc_attr(stripslashes($color)) : '#e77f11'; ?>" />
									<p class="description"><?php _e('Enter your custom theme color for bubble chat.', 'chat-bubble'); ?></p>
								</div>
							</div>
						</div>					
						
					<?php do_action('cbb_option_form_items'); ?>	
					</div>
					
					<div class="form-header">
						<div class="row">
							<div class="col-md-12 col-border-bottom border-margin">
								<h2><?php _e('Greeting section', 'chat-bubble'); ?></h2>
							</div>
						</div>
					</div>
					
				<?php do_action('cbb_greeting_item_form_header'); ?>
					
					<div class="form-content">	
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"></div>
								<div class="col-md-9 col-content col-border-bottom">
									<p>
										<label for="enabled_greeting">
											<input name="enabled_greeting" type="hidden" value="0" />
											<input id="enabled_greeting" name="enabled_greeting" type="checkbox" class="form-control" value="1" <?php echo ($enabled_greeting === 1) ? 'checked' : ''; ?> />
											<?php _e('Use Greeting section.', 'chat-bubble'); ?>
										</label>	
									</p>
									<p style="margin-bottom: 0;">
										<label for="greeting_show">
											<input name="greeting_show" type="hidden" value="0" />
											<input id="greeting_show" name="greeting_show" type="checkbox" class="form-control" value="1" <?php echo ($greeting_show === 1) ? 'checked' : ''; ?> />
											<?php _e('Always show Greeting section.', 'chat-bubble'); ?>
										</label>	
									</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Title', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">
									<div class="greeting-user-custom">
										<div class="greeting-user-custom-item">
											<div class="col-md-9 col-content">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="greeting_avatar"><?php _e('Avatar', 'chat-bubble'); ?></label>
													</div>
													<input id="greeting_avatar" name="greeting_avatar" type="text" class="form-control" value="<?php echo !empty($greeting_avatar) ? esc_attr($greeting_avatar) : plugin_dir_url(CHAT_BUBBLE_PLUGIN_FILE) . 'assets/images/avatar_default.png'; ?>" />
													<div class="input-group-append">
														<button id="greeting-avatar" type="button" class="btn btn-outline-secondary"><?php _e('Choose', 'chat-bubble'); ?></button>
													</div>
												</div>
											</div>
										</div>
										<div class="greeting-user-custom-item">
											<div class="col-md-9 col-content">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="greeting_name"><?php _e('Name', 'chat-bubble'); ?></label>
													</div>
													<input id="greeting_name" name="greeting_name" type="text" class="form-control" value="<?php echo esc_attr($greeting_name); ?>" />
												</div>											
											</div>
										</div>
										<div class="greeting-user-custom-item">
											<div class="col-md-9 col-content">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="greeting_label"><?php _e('Label', 'chat-bubble'); ?></label>
													</div>
													<input id="greeting_label" name="greeting_label" type="text" class="form-control" value="<?php echo esc_attr($greeting_label); ?>" />
												</div>											
											</div>										
										</div>
									</div>									
								</div>
							</div>
						</div>	
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Content', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">									
									<input name="greeting" type="text" id="greeting" placeholder="<?php _e('Your greeting content', 'chat-bubble'); ?>" class="regular-text code form-control" style="max-width: 25rem;" value="<?php echo esc_attr(stripslashes($greeting)); ?>" />
								</div>
							</div>
						</div>		
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-header"><?php _e('Custom link', 'chat-bubble'); ?></div>
								<div class="col-md-9 col-content col-border-bottom">	
									<a id="button-link-items" href="javascript:;" class="button" style="margin-bottom: 20px;"><?php _e('Add link', 'chat-bubble'); ?></a>
								
									<ul id="link-items" class="bubble-items" style="max-width: 500px;">
									<?php $links = (isset($links)) ? (array) $links : array();
									
									for ($i = 0; $i < count($links); $i++) { 
										$this->link_data = $links[$i];
										$this->cbb_render_view('options-linkitem', false);
									} ?>
									</ul>
									
									<p class="description"><?php _e('Add your custom links, limit up to 3 items.', 'chat-bubble'); ?></p>
								</div>
							</div>
						</div>				
					</div>
					
				<?php do_action('cbb_option_form_end'); ?>
					
					<div class="form-footer">
						<input name="opt_screen" type="hidden" value="options" />
						<button type="submit" name="submit_cbb" id="submit" class="btn btn-primary" value="Save Changes"><?php _e('Save Changes'); ?></button>
						
					<?php do_action('cbb_option_form_inner_footer'); ?>
					</div>
					
				<?php do_action('cbb_option_form_footer'); ?>
				</form>
			</div>
		</div>
		
		<ul id="link-items-temp" class="hidden">
		<?php $this->link_data = array();
		$this->cbb_render_view('options-linkitem', false); ?>
		</ul>
	
	<?php do_action('cbb_option_screen_footer'); ?>
	</div>