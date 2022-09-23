<?php
/*
*
* View Name: Chat Bubble Fields class
*
*/

if (!defined('ABSPATH')) exit;

if (!class_exists('CBB_Fields')) {
	class CBB_Fields {
		
		const IMAGE_PHONE = '/assets/images/calling.svg';
		const IMAGE_URL = '/assets/images/awwwards.svg';
		const IMAGE_MAIL = '/assets/images/mailto.svg';
		const IMAGE_MESSENGER = '/assets/images/fbmessenger.svg';
		const IMAGE_TELEGRAM = '/assets/images/telegram.svg';
		const IMAGE_LINE = '/assets/images/line.svg';
		const IMAGE_SKYPE = '/assets/images/skype.svg';
		const IMAGE_VIBER = '/assets/images/viber.svg';
		const IMAGE_WHATSAPP = '/assets/images/whatsapp.svg';
		const IMAGE_ZALO = '/assets/images/zalo.svg';
		const IMAGE_TAWKTO = '/assets/images/tawkto.svg';
		
		public static function get_fields() {
			$fields = array(
				'phone' => array(
					'title' => __('Phone', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_PHONE),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use phone bubble.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Phone',
						),
						array(
							'type' => 'text',
							'name' => 'phone',
							'title' => __('Phone contact', 'chat-bubble'),
							'placeholder' => __('Enter your phone contact.', 'chat-bubble'),
						),
					),
				),
				'url' => array(
					'title' => __('Custom Link', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_URL),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use custom link.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Link',
						),
						array(
							'type' => 'url',
							'name' => 'url',
							'title' => __('Custom Link', 'chat-bubble'),
							'placeholder' => __('Enter your custom link.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'email' => array(
					'title' => __('Contact Email', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_MAIL),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use contact email.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Email',
						),
						array(
							'type' => 'email',
							'name' => 'mail',
							'title' => __('Contact email', 'chat-bubble'),
							'placeholder' => __('Enter your contact email.', 'chat-bubble'),
						),
					),
				),
				'messenger' => array(
					'title' => __('Facebook Messenger', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_MESSENGER),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Facebook Messenger.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Messenger',
						),
						array(
							'type' => 'text',
							'name' => 'facebook',
							'title' => __('Facebook ID', 'chat-bubble'),
							'placeholder' => __('Enter your facebook id.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'telegram' => array(
					'title' => __('Telegram', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_TELEGRAM),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Telegram.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Telegram',
						),
						array(
							'type' => 'text',
							'name' => 'telegram',
							'title' => __('Telegram ID', 'chat-bubble'),
							'placeholder' => __('Enter your telegram id.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'line' => array(
					'title' => __('LINE', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_LINE),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use LINE.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'LINE',
						),
						array(
							'type' => 'text',
							'name' => 'line',
							'title' => __('LINE ID', 'chat-bubble'),
							'placeholder' => __('Enter your LINE id.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'skype' => array(
					'title' => __('Skype', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_SKYPE),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Skype.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Skype',
						),
						array(
							'type' => 'text',
							'name' => 'skype',
							'title' => __('Skype id', 'chat-bubble'),
							'placeholder' => __('Enter your Skype id.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'viber' => array(
					'title' => __('Viber', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_VIBER),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Viber.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Viber',
						),
						array(
							'type' => 'text',
							'name' => 'viber',
							'title' => __('Viber ID', 'chat-bubble'),
							'placeholder' => __('Enter your Viber id.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'whatsapp' => array(
					'title' => __('WhatsApp', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_WHATSAPP),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use WhatsApp.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Whatsapp',
						),
						array(
							'type' => 'text',
							'name' => 'whatsapp',
							'title' => __('WhatsApp phone number', 'chat-bubble'),
							'placeholder' => __('Enter your WhatsApp phone number.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'zalo' => array(
					'title' => __('Zalo', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_ZALO),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Zalo.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Zalo',
						),
						array(
							'type' => 'text',
							'name' => 'zalo',
							'title' => __('Zalo phone number', 'chat-bubble'),
							'placeholder' => __('Enter your Zalo phone number.', 'chat-bubble'),
						),
						array(
							'type' => 'checkbox',
							'name' => 'blank',
							'title' => __('Open new tab.', 'chat-bubble'),
						),
					),
				),
				'tawkto' => array(
					'title' => __('Tawk.to', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_TAWKTO),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Tawk.to.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => 'Tawk.to',
						),
						array(
							'type' => 'text',
							'name' => 'tawkto',
							'title' => __('Tawk.to chat ID', 'chat-bubble'),
							'placeholder' => __('Enter your Tawk.to chat ID.', 'chat-bubble'),
						),
					),
				),
				'callback_simple' => array(
					'title' => __('Simple CallBack', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_PHONE),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Simple CallBack.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => __('Call me now', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'header',
							'title' => __('Header', 'chat-bubble'),
							'placeholder' => __('Enter Header modal content.', 'chat-bubble'),
							'default_value' => __('Call us now', 'chat-bubble'),
						),
						array(
							'type' => 'textarea',
							'name' => 'footer_textarea',
							'title' => __('Footer', 'chat-bubble'),
							'placeholder' => __('Enter Footer modal content.', 'chat-bubble'),
							'default_value' => __('This is footer content.', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'submit_lbl',
							'title' => __('Submit button', 'chat-bubble'),
							'placeholder' => __('Enter form submit button label.', 'chat-bubble'),
							'default_value' => __('Submit', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Field name',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'input_name_lbl',
							'title' => __('Label', 'chat-bubble'),
							'placeholder' => __('Enter label content of Field name.', 'chat-bubble'),
							'default_value' => __('Your name', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'text',
							'name' => 'input_name_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field name.', 'chat-bubble'),
							'default_value' => __('Enter your name.', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'desc',
							'content' => 'Field phone number',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'input_phone_lbl',
							'title' => __('Label', 'chat-bubble'),
							'placeholder' => __('Enter label content of Field phone.', 'chat-bubble'),
							'default_value' => __('Your Phone Number', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'text',
							'name' => 'input_phone_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field phone.', 'chat-bubble'),
							'default_value' => __('Enter your phone number.', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'desc',
							'content' => 'Field options',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'input_option_lbl',
							'title' => __('Label', 'chat-bubble'),
							'placeholder' => __('Enter label content of Field options.', 'chat-bubble'),
							'default_value' => __('Contact Type', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'text',
							'name' => 'input_option_val',
							'title' => __('Option values', 'chat-bubble'),
							'placeholder' => __('Enter options.', 'chat-bubble'),
							'default_value' => __('Sales,Customer Support', 'chat-bubble'),
							'row_style' => '',
						),
					),
				),
				'callback_advanced' => array(
					'title' => __('Advanced CallBack', 'chat-bubble'),
					'default_icon' => plugins_url('chat-bubble' . self::IMAGE_PHONE),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
							'title' => __('Use Advanced CallBack.', 'chat-bubble'),
							'checkbox_layout' => 'full',
						),
						array(
							'type' => 'text',
							'name' => 'title',
							'title' => __('Title label', 'chat-bubble'),
							'placeholder' => __('Enter Title label of this bubble.', 'chat-bubble'),
							'default_value' => __('Call me now', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Call me now',
							'row_style' => 'border-left: 5px solid #ff9800;padding: 10px 10px;background: #f4f4f4;',
						),
						array(
							'type' => 'text',
							'name' => 'callmenow_title',
							'title' => __('Title', 'chat-bubble'),
							'placeholder' => __('Enter Title of Call me now.', 'chat-bubble'),
							'default_value' => __('Call me now', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmenow_header',
							'title' => __('Header', 'chat-bubble'),
							'placeholder' => __('Enter Header content of Call me now.', 'chat-bubble'),
							'default_value' => __('Would you like to receive a callback?', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmenow_notice',
							'title' => __('Notice', 'chat-bubble'),
							'placeholder' => __('Enter notice content of Call me now.', 'chat-bubble'),
							'default_value' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'callmenow_footer_textarea',
							'title' => __('Footer', 'chat-bubble'),
							'placeholder' => __('Enter Footer content of Call me now.', 'chat-bubble'),
							'default_value' => __('The administrator of data you enter here will be us.', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmenow_submit',
							'title' => __('Submit button', 'chat-bubble'),
							'placeholder' => __('Enter form submit button of Call me now.', 'chat-bubble'),
							'default_value' => __('Call me now', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Field phone number',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'callmenow_input_phone_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field phone.', 'chat-bubble'),
							'default_value' => __('Enter your phone number.', 'chat-bubble'),
							'row_style' => '',
						),						
						array(
							'type' => 'desc',
							'content' => 'Call me later',
							'row_style' => 'border-left: 5px solid #ff9800;padding: 10px 10px;background: #f4f4f4;',
						),
						array(
							'type' => 'text',
							'name' => 'callmelater_title',
							'title' => __('Title', 'chat-bubble'),
							'placeholder' => __('Enter Title of Call me now.', 'chat-bubble'),
							'default_value' => __('Call me later', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmelater_header',
							'title' => __('Header', 'chat-bubble'),
							'placeholder' => __('Enter Header content of Call me later.', 'chat-bubble'),
							'default_value' => __('Choose the best time for the callback:', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmelater_notice',
							'title' => __('Notice', 'chat-bubble'),
							'placeholder' => __('Enter notice content of Call me later.', 'chat-bubble'),
							'default_value' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'callmelater_footer_textarea',
							'title' => __('Footer', 'chat-bubble'),
							'placeholder' => __('Enter Footer content of Call me later.', 'chat-bubble'),
							'default_value' => __('The administrator of data you enter here will be us.', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'callmelater_submit',
							'title' => __('Submit button', 'chat-bubble'),
							'placeholder' => __('Enter form submit button of Call me later.', 'chat-bubble'),
							'default_value' => __('Call me later', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Field phone number',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'callmelater_input_phone_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field phone.', 'chat-bubble'),
							'default_value' => __('Enter your phone number.', 'chat-bubble'),
							'row_style' => '',
						),		
						array(
							'type' => 'hidden',
							'name' => 'callmelater_days',
							'default_value' => 0,
						),			
						array(
							'type' => 'hidden',
							'name' => 'callmelater_time_min',
							'default_value' => 8,
						),				
						array(
							'type' => 'hidden',
							'name' => 'callmelater_time_max',
							'default_value' => 18,
						),					
						array(
							'type' => 'hidden',
							'name' => 'callmelater_min_interval',
							'default_value' => 30,
						),		
						array(
							'type' => 'desc',
							'content' => 'Leave a message',
							'row_style' => 'border-left: 5px solid #ff9800;padding: 10px 10px;background: #f4f4f4;',
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_title',
							'title' => __('Title', 'chat-bubble'),
							'placeholder' => __('Enter Title of Call me now.', 'chat-bubble'),
							'default_value' => __('Leave a message', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_header',
							'title' => __('Header', 'chat-bubble'),
							'placeholder' => __('Enter Header content of Call me later.', 'chat-bubble'),
							'default_value' => __('Leave your message and we will contact you as soon as possible', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_notice',
							'title' => __('Notice', 'chat-bubble'),
							'placeholder' => __('Enter notice content of Call me later.', 'chat-bubble'),
							'default_value' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'leaveamsg_footer_textarea',
							'title' => __('Footer', 'chat-bubble'),
							'placeholder' => __('Enter Footer content of Call me later.', 'chat-bubble'),
							'default_value' => __('The administrator of data you enter here will be us.', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_submit',
							'title' => __('Submit button', 'chat-bubble'),
							'placeholder' => __('Enter form submit button of Call me later.', 'chat-bubble'),
							'default_value' => __('Submit', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Field message',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_input_message_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field message.', 'chat-bubble'),
							'default_value' => __('Type your message here', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'desc',
							'content' => 'Field phone number',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_input_phone_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field phone.', 'chat-bubble'),
							'default_value' => __('Your phone', 'chat-bubble'),
							'row_style' => '',
						),	
						array(
							'type' => 'desc',
							'content' => 'Field email',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'leaveamsg_input_email_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field email.', 'chat-bubble'),
							'default_value' => __('Your email', 'chat-bubble'),
							'row_style' => '',
						),		
						array(
							'type' => 'desc',
							'content' => 'More information',
							'row_style' => 'border-left: 5px solid #ff9800;padding: 10px 10px;background: #f4f4f4;',
						),
						array(
							'type' => 'text',
							'name' => 'info_header',
							'title' => __('Header', 'chat-bubble'),
							'placeholder' => __('Enter Header content of More information.', 'chat-bubble'),
							'default_value' => __('Let us know more about you', 'chat-bubble'),
						),
						array(
							'type' => 'text',
							'name' => 'info_submit',
							'title' => __('Submit button', 'chat-bubble'),
							'placeholder' => __('Enter form submit button of More information.', 'chat-bubble'),
							'default_value' => __('Submit', 'chat-bubble'),
						),
						array(
							'type' => 'desc',
							'content' => 'Field email',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'info_input_email_lbl',
							'title' => __('Label', 'chat-bubble'),
							'placeholder' => __('Enter label content of Field email.', 'chat-bubble'),
							'default_value' => __('Your email address', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'text',
							'name' => 'info_input_email_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field email.', 'chat-bubble'),
							'default_value' => __('Type your email here.', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'desc',
							'content' => 'Field name',
							'row_style' => 'border-top: 1px dotted #dfdfdf;padding-top: 10px;',
						),
						array(
							'type' => 'text',
							'name' => 'info_input_name_lbl',
							'title' => __('Label', 'chat-bubble'),
							'placeholder' => __('Enter label content of Field name.', 'chat-bubble'),
							'default_value' => __('Your name', 'chat-bubble'),
							'row_style' => '',
						),
						array(
							'type' => 'text',
							'name' => 'info_input_name_ph',
							'title' => __('Placeholder', 'chat-bubble'),
							'placeholder' => __('Enter placeholder content of Field name.', 'chat-bubble'),
							'default_value' => __('Type your name here.', 'chat-bubble'),
							'row_style' => '',
						),
					),
				),
			);
			
			return apply_filters('cbb_get_all_fields', $fields);
		}
		
		public static function retrieve_fields($options, $allow_empty = true) {
			$inner = array();
			$outer = array();	
			$inner_fields = array();
			$outer_fields = array();
			$all_fields = self::get_fields();		
			
			//
			foreach ($all_fields as $key => $item) {
				$all_fields[$key]['key'] = $key;
				
				if (isset($options->$key)) {  
					$options->$key['type'] = $key;
					$options->$key['default_icon'] = $item['default_icon'];
					
					if (!$allow_empty && (int) @$options->$key['enabled'] === 0) continue;
					
					if (@$options->$key['place'] == 'inner') {
						$inner[(int) @$options->$key['pos']] = $options->$key;
					}
					if (@$options->$key['place'] == 'outer') {
						$outer[(int) @$options->$key['pos']] = $options->$key;
					}
				}
			}
			
			usort($inner, array(__CLASS__, 'sort_fields'));
			usort($outer, array(__CLASS__, 'sort_fields'));			
			
			if (count($all_fields) > 0) {
				foreach ($all_fields as $key => $group_field) {
					$fields = $group_field['fields'];
					
					if (count($fields) > 0) {
						foreach ($fields as $i => $field) {
							if (isset($field['name']) && isset($options->$key[$field['name']]))
								$all_fields[$key]['fields'][$i]['value'] = $options->$key[$field['name']];
						}
					}
				}
			}
			
			if (count($outer) > 0) {
				foreach ($outer as $group_field) {
					$key = $group_field['type'];
					
					if (!isset($all_fields[$key])) continue;
					
					$outer_fields[] = $all_fields[$key];
					unset($all_fields[$key]);
				}
			}
			
			if (count($inner) > 0) {
				foreach ($inner as $group_field) {
					$key = $group_field['type'];
					
					if (!isset($all_fields[$key])) continue;
					
					$inner_fields[] = $all_fields[$key];
					unset($all_fields[$key]);
				}
			}
			
			if (count($all_fields) > 0) {
				$inner_fields = $inner_fields + $all_fields;
			}
			
			return array(
				'inner' => $inner,
				'outer' => $outer,
				'fields' => $all_fields,
				'inner_fields' => $inner_fields,
				'outer_fields' => $outer_fields,
			);
		}
		
		static function sort_fields($a, $b) {
			$ap = (int) @$a['pos'];
			$bp = (int) @$b['pos'];
			
			if ($ap == $bp) return 0;
			
			return ($ap > $bp) ? +1 : -1;
		}
	}
}
