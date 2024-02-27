<?php
/*
*
* View Name: Chat Bubble admin form view
*
*/

if (!defined('ABSPATH')) exit; ?>

	<!-- sortable form -->
	<ul id="<?php echo isset($this->form_id) ? $this->form_id : 'bubble-items'; ?>" class="bubble-items">
	<?php foreach ($this->form_fields as $index => $group) {
		$key = @$group['key']; ?>
		<li class="bubble-item bubble-item-<?php echo esc_attr($key); ?>" data-name="<?php echo $key; ?>">
			<div class="card">
				<div class="card-header">
					<h5><i class="dashicons dashicons-saved"></i> <?php echo @$group['title']; ?></h5>
				</div>
				<div class="card-body hidden">
				<?php if (isset($group['fields'])) { ?>
					<div class="container">
					<?php foreach ($group['fields'] as $i => $field) { 
						if (isset($field['default_value']) && !isset($field['value'])) $field['value'] = $field['default_value']; ?>
					
						<?php if ($field['type'] == 'hidden') { ?>
							<input name="<?php echo $key; ?>[<?php echo $field['name']; ?>]" type="<?php echo $field['type']; ?>" value="<?php echo esc_attr(stripslashes(@$field['value'])); ?>" />
						<?php } else { ?>					
							<div class="form-group">
								<div class="row" style="<?php echo (!empty($field['row_style'])) ? esc_attr($field['row_style']) : ''; ?>">
								<?php switch ($field['type']) {
									case 'checkbox': ?>
										<div class="<?php echo (isset($field['checkbox_layout']) && $field['checkbox_layout'] == 'full') ? '' : 'offset-md-3 col-md-9'; ?> col-content">
											<p>
												<label>
													<input name="<?php echo $key; ?>[<?php echo isset($field['name'] ) ? $field['name'] : ''; ?>]" type="hidden" value="0">
													<?php if ( $field["name"] == "use_default_icon" ) : ?>
														<input name="<?php echo $key; ?>[<?php echo isset($field['name'] ) ? $field['name'] : ''; ?>]" type="checkbox" value="1" class="form-control bubble-item-<?php echo $field['name']; ?>" <?php checked((int) (isset($field['value']) ? $field['value'] : 1), 1); ?> />
													<?php else : ?>
														<input name="<?php echo $key; ?>[<?php echo isset($field['name'] ) ? $field['name'] : ''; ?>]" type="checkbox" value="1" class="form-control bubble-item-<?php echo $field['name']; ?>" <?php checked((int) (isset($field['value'])  ? $field['value'] : 0), 1); ?> />
													<?php endif; ?>
												
												<?php echo $field['title']; ?>
												</label>
											</p>
											
										<?php if (!empty($field['description'])) { ?>
											<p class="description"><?php echo stripslashes(@$field['description']); ?></p>
										<?php } ?>
										</div>
									<?php break; ?>
									<?php case "upload": ?>
										
										<div class="col-md-3 col-header"><?php echo $field['title']; ?></div>
										<div class="col-md-9 col-content col-border-bottom">
											<div class="input-group">
												<input type="text" class="form-control" name="<?php echo $key; ?>[<?php echo $field['name']; ?>]" value="<?php echo !empty($field['value']) ? $field['value'] : ''; ?>"/>
												<div class="input-group-append">
													<button type="button" class="btn btn-outline-secondary" data-button-upload><?php _e('Choose', 'chat-bubble'); ?></button>
												</div>
											</div>
											
											<?php if (!empty($field['description'])) { ?>
												<p class="description"><?php echo stripslashes( isset( $field['description'] ) ? $field["description"] : ""); ?></p>
											<?php } ?>
										</div>
									<?php break; ?>
									<?php case 'select': ?>
										<div class="col-md-3 col-header"><?php echo $field['title']; ?></div>
										<div class="col-md-9 col-content col-border-bottom">
											<select name="<?php echo $key; ?>[<?php echo $field['name']; ?>]" class="form-control">
											<?php foreach ($field['options'] as $k => $option) { ?>
												<option value="<?php echo esc_attr($k); ?>" <?php selected(@$field['value'], $k); ?>><?php echo $option; ?></option>
											<?php } ?>
											</select>
										
										<?php if (!empty($field['description'])) { ?>
											<p class="description"><?php echo stripslashes(@$field['description']); ?></p>
										<?php } ?>
										</div>
									<?php break; ?>
									
									<?php case 'email': ?>
									<?php case 'text': ?>								
									<?php case 'url': ?>
									<div class="col-md-3 col-header"><?php echo $field['title']; ?></div>
									<?php $field_value = isset( $field['value'] ) ? $field['value'] : ''; ?>
									<div class="col-md-9 col-content col-border-bottom">
										<input name="<?php echo $key; ?>[<?php echo $field['name']; ?>]" type="<?php echo $field['type']; ?>" placeholder="<?php echo $field['placeholder']; ?>" class="regular-text form-control" style="max-width: 25rem;" value="<?php echo esc_attr(stripslashes( $field_value ) ); ?>" />
																		
									<?php if (!empty($field['description'])) { ?>
										<p class="description"><?php echo stripslashes(@$field['description']); ?></p>
									<?php } ?>								
									</div>
									<?php break; ?>
									
									<?php case 'textarea': ?>
									<div class="col-md-3 col-header"><?php echo $field['title']; ?></div>
									<div class="col-md-9 col-content col-border-bottom">
										<textarea name="<?php echo $key; ?>[<?php echo $field['name']; ?>]" type="<?php echo $field['type']; ?>" placeholder="<?php echo $field['placeholder']; ?>" class="regular-text form-control" style="max-width: 25rem;"><?php echo stripslashes(@$field['value']); ?></textarea>
																		
									<?php if (!empty($field['description'])) { ?>
										<p class="description"><?php echo stripslashes(@$field['description']); ?></p>
									<?php } ?>								
									</div>
									<?php break; ?>
									
									<?php case 'desc': ?>
									<div class="col-md-12 col-header">
									<?php echo $field['content']; ?>
										
									<?php if (!empty($field['description'])) { ?>
										<p class="description"><?php echo stripslashes(@$field['description']); ?></p>
									<?php } ?>
									</div>
									<?php break; ?>
									
								<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					</div>				
				<?php } ?>
				</div>
			</div>
		</li>
	<?php } ?>
	</ul>
	<!-- // end sortable form -->