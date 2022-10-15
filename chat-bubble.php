<?php
/*
*
* Plugin Name: Chat Bubble
* Plugin URI: http://bluecoral.vn/products/chat-bubble
* Description: Easy to get leads with beautiful floating contact form & get followers and chat messages via Facebook Messenger, WhatsApp, Telegram, Line, Skype, Zalo, Tawk.to,…
* Author: Blue Coral
* Author URI: http://bluecoral.vn
* Contributors: bluecoral
* Version: 2.3
* Text Domain: chat-bubble
*
*/

if (!defined('ABSPATH')) exit; 

if ( !defined( "CHAT_BUBBLE_PLUGIN_FILE" ) ) :
	define( "CHAT_BUBBLE_PLUGIN_FILE", __FILE__ );
endif;

if (!class_exists('Chat_Bubble_Be')) {
	class Chat_Bubble_Be {
		
		const META_KEY = 'cbb_data';
		const NONCE_CALLBACK = 'cbb_callback';
		const NONCE_CSV = 'cbb_csv';
		const POST_CALLBACK = 'cbb_callback';
		
		public static $_instance;
		
		/**
		* Class Construct
		*/
		public function __construct() {	
			$this->domain = 'chat-bubble';
			$this->option_key = 'cbb_options';
			$this->options = $this->cbb_get_options();
			$this->cbb_classes();
			
			add_action('wp_footer', array($this, 'cbb_wp_footer'));
			add_action('admin_init', array($this, 'cbb_admin_init'));
			add_action('wp_ajax_cbb_callback_action', array($this, 'cbb_ajax_callback'));
			add_action('wp_ajax_nopriv_cbb_callback_action', array($this, 'cbb_ajax_callback'));
			
			// functions
			$this->cbb_settings_page();
			$this->cbb_shortcode();
			$this->cbb_meta();
			$this->cbb_csv();
		}		
		
		public static function instance() {
			if (!empty(static::$_instance)) {
				return static::$_instance;
			}
			return new static();
		}
		
		/**
		* Functions
		*/
		function cbb_classes() {
			$files = glob(dirname(__FILE__).'/libraries/*.php');
			
			foreach ($files as $file) {		
				require_once $file;
			}
		}	
		
		function cbb_get_plugin_data($type = '') {
			$plugin_data = get_plugin_data(__FILE__);
			
			if (empty($type)) return $plugin_data;
			if (isset($plugin_data[$type])) return $plugin_data[$type];
			return '';
		}
		
		function cbb_get_options() {
			$options = get_option($this->option_key, array());
			return apply_filters('cbb_get_options', array_merge(
				$this->cbb_get_default_options(),
				$this->cbb_slash_options($options)
			));
		}	
		
		function cbb_get_default_options() {
			if (!class_exists('CBB_Fields')) {
				$this->cbb_classes();
			}
			
			return array(
				'enabled' => 0,
				'enabled_font_opensans' => 0,
				'class' => '',
				'color' => '#e77f11',
				// Premium				
				'premium' => 0,
				// Intro
				'intro' => 'Questions? Let\'s Chat',
				'enabled_intro' => 1,
				// Greeting
				'enabled_greeting' => 1,
				'greeting_show' => 0,
				'greeting_name' => 'Blue Coral',
				'greeting_label' => 'Digital agency in Vietnam',
				'greeting' => 'Welcome! 👋🏼👋🏼👋🏼 What can I help you with today?',
				'links' => array(
					array(
						'u' => 'http://bluecoral.vn/',
						't' => 'Homepage',
						'b' => 1,
					),
					array(
						'u' => 'https://www.facebook.com/bluecoral.vn',
						't' => 'Facebook',
						'b' => 1,
					),
				),
				// Icon
				'callback_simple_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_PHONE),
				'callback_advanced_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_PHONE),
				'phone_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_PHONE),
				'url_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_URL),
				'email_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_MAIL),
				'messenger_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_MESSENGER),
				'telegram_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_TELEGRAM),
				'line_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_LINE),
				'skype_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_SKYPE),
				'viber_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_VIBER),
				'whatsapp_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_WHATSAPP),
				'zalo_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_ZALO),
				'tawkto_icon' => plugins_url($this->domain . CBB_Fields::IMAGE_TAWKTO),
				// Components
				'messenger' => array(
					'enabled' => 1,
					'blank' => 1,
					'pos' => 0,
					'place' => 'inner',
					'title' => 'Messenger',
					'facebook' => 'bluecoral.vn',
				),
				'url' => array(
					'enabled' => 0,
					'blank' => 1,
					'pos' => 0,
					'place' => 'inner',
					'title' => 'Blue Coral',
					'url' => 'http://bluecoral.vn',
				),
			);
		}		
		
		function cbb_slash_options($options = array()) {
			$keys = [
				'class',
				'color',
				'greeting_label',
				'greeting_name',
				'intro',
			];
			foreach ($keys as $key) {
				if (!empty($options[$key])) {
					$options[$key] = stripslashes($options[$key]);
				}
			}
			return $options;
		}
		
		function cbb_update_options($values) {
			$values = array_merge($this->options, $values);
			return update_option($this->option_key, $values);
		}
		
		function cbb_settings_page() {
			add_action('admin_menu', array($this, 'cbb_register_settings_pages'));
			add_action('cbb_option_form_inner_footer', array($this, 'cbb_render_option_form_inner_footer'));
		}
		
		function cbb_admin_init() {
			add_filter('plugin_action_links_'.plugin_basename(__FILE__), array($this, 'cbb_render_plugin_action_links'), 10, 1);
			
			$this->cbb_submit_settings_data();
		}
		
		function cbb_render_plugin_action_links($links = array()) {
			array_unshift($links, '<a href="'.admin_url('admin.php?page=' . $this->domain).'">'.__('Settings').'</a>');
			
			return $links;
		}
		
		function cbb_wp_footer() {
			if ((int) @$this->options['enabled'] == 0) return;
			
			echo do_shortcode('[cbb]');
		}
		
		function cbb_get_ip() {
			$keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
			
			foreach ($keys as $key) {
				if (array_key_exists($key, $_SERVER) === true) {
					foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
						if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) return $ip;
					}
				}
			}
		}
		
		function cbb_meta() {
			add_action('init', array($this, 'cbb_init'));
			add_action('add_meta_boxes', array($this, 'cbb_add_meta_boxes'));
		}
		
		function cbb_init() {
			register_post_type(
				self::POST_CALLBACK,
				array(
					'labels'             => array(
						'name' => __('Callback', 'chat-bubble'),
						'singular_name' => __('Callback', 'chat-bubble'),
						'menu_name' => __('Callback', 'chat-bubble'),
					),
					'description'        => '',
					'public'             => false,
					'exclude_from_search' => true,
					'publicly_queryable' => false,
					'show_ui'            => true,
					'show_in_menu'       => $this->domain,
					'query_var'          => true,
					'capability_type'    => 'post',
					'capabilities' => array(
						'edit_post' => 'edit_post',
						'delete_post' => 'delete_post',
						'create_posts' => 'do_not_allow',
						'edit_posts' => 'edit_posts',
						'delete_posts' => 'delete_posts',
					),
					'map_meta_cap' => true,
					'has_archive'        => false,
					'hierarchical'       => false,
					'menu_position'      => 100,
					'supports'           => array(
						'title',
					)
				)
			);
		}
		
		function cbb_add_meta_boxes() {
			add_meta_box('cbb-callback', __('Callback Data', 'chat-bubble'), array($this, 'cbb_callback_meta_box'), self::POST_CALLBACK);
		}
		
		function cbb_callback_meta_box($post) {
			$this->cbb_render_view('cbb-meta');
		}
		
		function cbb_csv() {
			add_action('restrict_manage_posts', array($this, 'cbb_restrict_manage_posts'), 10, 1);
			add_action('init', array($this, 'cbb_rewrite_rules'));
			add_action('template_include', array($this, 'cbb_template_include'));
		}
		
		function cbb_rewrite_rules() {
			add_rewrite_rule('cbb-csv/?$', 'index.php?cbb-action=csv', 'top');
			add_rewrite_tag('%cbb-action%', '([^&]+)');		
			flush_rewrite_rules();
		}
		
		function cbb_restrict_manage_posts($post_type = '') {
			if ($post_type !== self::POST_CALLBACK) {
				return;
			}
			
			echo '<a href="' . get_site_url(null, '/cbb-csv?wpnonce=' . wp_create_nonce(self::NONCE_CSV)) . '" class="button button-primary" download style="margin-right: 6px;">' . __('Export CSV', 'chat-bubble') . '</a>';
		}
		
		function cbb_template_include($template = '') { 
			$flag = get_query_var('cbb-action');

			switch ($flag) {
				case 'csv':
					return $this->cbb_csv_download();
					break;
			}
			
			return $template;
		}
		
		function cbb_csv_download() {
			if (!isset($_GET['wpnonce']) || !wp_verify_nonce($_GET['wpnonce'], self::NONCE_CSV)) {
				wp_die();
			}
			
			$now = gmdate('D, d M Y H:i:s');
			$name = 'cbb_data_export_' . date('Y-m-d') . '.csv';
			
			header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
			header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
			header("Last-Modified: {$now} GMT");

			// force download  
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");

			// disposition / encoding on response body
			header("Content-Disposition: attachment;filename={$name}");
			header("Content-Transfer-Encoding: binary");
			
			echo $this->cbb_csv_download_content();
		}
		
		function cbb_csv_download_content() {
			$rows = array();
			$fields = array(
				'fname' => __('Name', 'chat-bubble'),
				'fmail' => __('Email address', 'chat-bubble'),
				'fphone' => __('Phone number', 'chat-bubble'),
				'title' => __('Page title', 'chat-bubble'),
				'url' => __('Page link', 'chat-bubble'),
				'now' => __('Callback time', 'chat-bubble'),
				'ip' => __('IP address', 'chat-bubble'),
				'fmessage' => __('Message', 'chat-bubble'),
			);
			
			$posts = get_posts(
				array(
					'posts_per_page' => -1,
					'post_type' => self::POST_CALLBACK,
					'post_status' => 'publish',
				)
			);
			
			$rows[] = array_values($fields);
			
			if (count($posts) > 0) {
				foreach ($posts as $post) {
					$item = array();
					$cbbs = get_post_meta($post->ID, self::META_KEY, true); 
					
					foreach ($fields as $key => $label) { 
						if (!isset($cbbs[$key])) {
							$item[] = '';
							continue; 
						}
						
						switch ($key) {
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
									$item[] = stripcslashes($cbbs[$key]);
								}
								break;
							
							default:
								$item[] = stripcslashes($cbbs[$key]);
						}
					}
					
					$rows[] = $item;
				}
			}
			
			ob_start();
			
			$stream = fopen('php://output', 'w');
			
			foreach ($rows as $row) {
				fputcsv($stream, $row);
			}
			fclose($stream);
			
			return ob_get_clean();
		}
		
		
		/**
		* Button
		*/		
		function cbb_shortcode() {
			add_shortcode('cbb', array($this, 'cbb_button'));
		}
		
		function cbb_button($args = array(), $content = '') {
			$this->cbb_button_enqueue_scripts();			
			$button = $this->cbb_button_html($args, $content);
			
			return apply_filters('cbb_button_html', $button, $args = array(), $content = '');
		}
		
		function cbb_button_enqueue_scripts() {
			// style			
			wp_enqueue_style('cbb-main', plugins_url($this->domain.'/assets/css/main.css'), array(), false, 'all');
						
			// script
			$this->cbb_var_script();
			wp_enqueue_script('cbb-runtime', plugins_url($this->domain.'/assets/js/runtime.js'), array('jquery'), '', true);
			wp_enqueue_script('cbb-main', plugins_url($this->domain.'/assets/js/main.js'), array('jquery'), '', true);	
			
			do_action('cbb_button_enqueue_scripts', $this->options);
		}
		
		function cbb_var_script($options = array()) {			
			if (!function_exists('wp_create_nonce')) {
				require_once ABSPATH . WPINC . '/pluggable.php';
			}
			
			$var = apply_filters(
				'cbb_var', 
				array(
					'ajax_url' => apply_filters('cbb_var_ajax_url', admin_url('admin-ajax.php')),
					'options' => $this->options,
					'nonce' => array(
						self::NONCE_CALLBACK => wp_create_nonce(self::NONCE_CALLBACK),
					),
				)
			);
			ob_start(); ?>
			
				<script>
					window.chatBubbleConfig = <?php echo json_encode($var); ?>				
				</script>
			
			<?php $script = ob_get_clean();
			echo apply_filters('cbb_var_script', $script, $this->options);
		}
		
		function cbb_button_html($args = array(), $content = '') {
			global $cbb_options;
			
			ob_start();
			
			$cbb_options = $this->options;
			$this->cbb_render_view('chat-bubble');
			
			return ob_get_clean();
		}
		
		
		/**
		* Settings screen
		*/	
		function cbb_register_settings_pages() {
			add_menu_page('Chat Bubble settings', 'Chat Bubble', 'manage_options', $this->domain, array($this, 'cbb_render_settings_page'), 'dashicons-format-chat');
			add_submenu_page($this->domain, 'Chat Bubble settings', __('General Settings', 'chat-bubble'), 'manage_options', $this->domain, array($this, 'cbb_render_settings_page'), 5);
			add_submenu_page($this->domain, 'Chat Bubble items', __('Bubble Items', 'chat-bubble'), 'manage_options', $this->domain.'-items', array($this, 'cbb_render_settings_page_item'), 10);
			// add_submenu_page($this->domain, 'Chat Bubble features', __('Features', 'chat-bubble'), 'manage_options', $this->domain.'-features', array($this, 'cbb_render_settings_page_features'), 15);
		}
		
		function cbb_settings_page_menu() {
			return apply_filters(
				'cbb_settings_page_menu', 
				array(
					$this->domain => __('General Settings', 'chat-bubble'),
					$this->domain.'-items' => __('Bubble Items', 'chat-bubble'),
					// $this->domain.'-features' => __('Features', 'chat-bubble'),
				)
			);
		}			
		
		function cbb_render_settings_page() {			
			$this->cbb_render_settings_page_header();
			$this->cbb_render_view('options');		
			$this->cbb_render_settings_page_footer();
		}
		
		function cbb_render_settings_page_item() {
			$this->cbb_render_settings_page_header();			
			$this->cbb_render_view('items');		
			$this->cbb_render_settings_page_footer();
		}
		
		// function cbb_render_settings_page_features() {
		// 	$this->cbb_render_settings_page_header();			
		// 	$this->cbb_render_view('features');		
		// 	$this->cbb_render_settings_page_footer();			
		// }
		
		function cbb_render_view($file_name = '', $once = true) {
			$file = trailingslashit(plugin_dir_path( __FILE__ )).'views/'.$file_name.'.php';
			
			if (file_exists($file)) {
				if ($once) require_once($file);
				else require($file);
			}
		}
		
		function cbb_render_settings_page_header() {
			global $cbb_options;
			
			// css
			wp_enqueue_style('bootstrap', plugins_url($this->domain.'/assets/css/bootstrap.min.css'), array(), null, 'all');
			wp_enqueue_style('admin-cbb', plugins_url($this->domain.'/assets/css/admin.css'), array(), null, 'all');
			wp_enqueue_style('admin-cbb-items', plugins_url($this->domain.'/assets/css/admin-items.css'), array(), null, 'all');		
			
			// js
			wp_enqueue_script('bootstrap', plugins_url($this->domain.'/assets/js/bootstrap.bundle.min.js'), array('jquery'), true);
			wp_enqueue_script('admin-cbb', plugins_url($this->domain.'/assets/js/admin.js'), array('jquery'), true);		
			wp_enqueue_media();
			wp_enqueue_script('admin-cbb-items', plugins_url($this->domain.'/assets/js/admin-items.js'), array('jquery'), true);
			
			$cbb_options = $this->options;
		}
		
		function cbb_render_settings_page_footer() {			
		}
		
		function cbb_render_option_form_inner_footer() {
			ob_start(); ?>
			
				<div class="form-footer-version"><?php echo sprintf(__('Version %s'), $this->cbb_get_plugin_data('Version')); ?></div>
			
			<?php echo ob_get_clean();
		}
		
		function cbb_submit_settings_data() {	
			global $cbb_options;
			
			if (!current_user_can('manage_options')) {
				return;
			}
			
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (isset($_POST['submit_cbb'])) {
					$post_data = array();
					$opt_screen = (isset($_POST['opt_screen'])) ? sanitize_text_field($_POST['opt_screen']) : 'options';
					
					// general
					if (isset($_POST['enabled'])) $post_data['enabled'] = (int) $_POST['enabled'];
					if (isset($_POST['enabled_font_opensans'])) $post_data['enabled_font_opensans'] = (int) $_POST['enabled_font_opensans'];
					
					// header
					if (isset($_POST['enabled_intro'])) $post_data['enabled_intro'] = (int) $_POST['enabled_intro'];
					if (isset($_POST['class'])) $post_data['class'] = sanitize_text_field($_POST['class']);
					if (isset($_POST['intro'])) $post_data['intro'] = sanitize_text_field($_POST['intro']);
					if (isset($_POST['color'])) $post_data['color'] = sanitize_text_field($_POST['color']);
					
					// greeting section
					if (isset($_POST['enabled_greeting'])) $post_data['enabled_greeting'] = (int) $_POST['enabled_greeting'];
					if (isset($_POST['greeting_show'])) $post_data['greeting_show'] = (int) $_POST['greeting_show'];
					if (isset($_POST['greeting_avatar'])) $post_data['greeting_avatar'] = sanitize_text_field($_POST['greeting_avatar']);
					if (isset($_POST['greeting_name'])) $post_data['greeting_name'] = sanitize_text_field($_POST['greeting_name']);
					if (isset($_POST['greeting_label'])) $post_data['greeting_label'] = sanitize_text_field($_POST['greeting_label']);
					if (isset($_POST['greeting'])) $post_data['greeting'] = sanitize_text_field($_POST['greeting']);
					
					if ($opt_screen == 'options') {
						$this->cbb_submit_custom_links($post_data);
					}
					
					// bubble section
					$this->cbb_submit_bubble_data($post_data);
					
					$post_data = apply_filters('cbb_post_data', $post_data, $this->options);
					$this->options = array_replace($this->options, $post_data);
					$this->cbb_update_options($this->options);
					$cbb_options = $this->options;
					
					do_action('cbb_submit_settings_data', $cbb_options);
					
					// reload page after saving
					$redirect = ($opt_screen == 'items') ? admin_url('admin.php?page=' . $this->domain . '-items') : admin_url('admin.php?page=' . $this->domain);
					wp_redirect($redirect);
					exit;
				}
			}
		}
		
		function cbb_submit_custom_links(&$post_data = array()) {
			$clink = (isset($_POST['clink'])) ? $this->cbb_sanitize_array((array) $_POST['clink']) : array();
			$ctext = (isset($_POST['ctext'])) ? $this->cbb_sanitize_array((array) $_POST['ctext']) : array();
			$cblank = (isset($_POST['cblank'])) ? $this->cbb_sanitize_array((array) $_POST['cblank']) : array();
			
			if (count($clink) == 0 || count($clink) != count($ctext)) {
				return $post_data['links'] = array();
			}
			
			$items = array();
			$item_limit = apply_filters('cbb_submit_custom_links_limit', 3);
			
			foreach ($clink as $i => $c) {
				if ($i >= $item_limit) break;
				
				$items[] = array(
					'u' => $c,
					't' => $ctext[$i],
					'b' => $cblank[$i],
				);
			}
			
			$post_data['links'] = $items;
		}
		
		function cbb_submit_bubble_data(&$post_data = array()) {
			$post_args = array_keys(CBB_Fields::get_fields());
			
			foreach ($post_args as $name) {
				if (isset($_POST[$name])) $post_data[$name] = $this->cbb_submit_bubble_data_item($name, $_POST[$name]);
			}
		}
		
		function cbb_submit_bubble_data_item($name = '', $data = array()) {
			$sanitize_data = array();
			if (empty($data)) return $sanitize_data;
			
			foreach ($data as $key => $value) {
				if (is_int($value)) $sanitize_data[$key] = (int) $value;
				if (is_array($value)) $sanitize_data[$key] = $this->cbb_sanitize_array((array) $value);
				if (strpos($key, '_textarea') !== false) $sanitize_data[$key] = sanitize_textarea_field($value);
				else $sanitize_data[$key] = sanitize_text_field($value);
			}
			
			return $sanitize_data;
		}

		function cbb_sanitize_array($args = array()) {
			foreach ($args as $key => $value) {
				if (is_array($value)) {
					$args[$key] = $this->cbb_sanitize_array($value);
				} else {
					$args[$key] = sanitize_text_field($value);
				}
			}

			return $args;
		}
		
		
		/**
		* Ajax callback
		*/	
		function cbb_ajax_callback() {
			if (!isset($_POST['wpnonce']) || !wp_verify_nonce($_POST['wpnonce'], self::NONCE_CALLBACK)) {
				return wp_send_json(
					array(
						'success' => false,
						'message' =>'Sorry, your nonce did not verify.',
					)
				);
			}
			
			do_action('cbb_ajax_callback_before');
			
			$post_data = $this->cbb_sanitize_array($_POST);
			$post_data['ip'] = $this->cbb_get_ip();
			$post_data['now'] = date('Y-m-d H:i:s');
			$mail_to = apply_filters('cbb_mail_callback_email', get_bloginfo('admin_email'));
			$mail_subject = apply_filters('cbb_mail_callback_title', $this->cbb_mail_subject($post_data), $post_data);
			$mail_content = apply_filters('cbb_mail_callback_content', $this->cbb_mail_callback($post_data), $post_data);
			$mail_headers = apply_filters(
				'cbb_mail_callback_headers', 
				array(
					'Content-Type: text/html; charset=UTF-8',
					'From: Chat Bubble Callback <'.$mail_to.'>',
				)
			);
			
			$this->cbb_add_callback($post_data);
			$sent = wp_mail($mail_to, $mail_subject, $mail_content, $mail_headers);
			
			if ($sent) {			
				do_action('cbb_ajax_callback_after', $post_data);
			
				return wp_send_json(
					array(
						'success' => true,
					)
				);
			} else {
				return wp_send_json(
					array(
						'success' => false,
						'message' =>'Sorry, cannot send mail.',
					)
				);
			}
		}
		
		function cbb_add_callback($data = array()) {
			$post_data = apply_filters(
				'cbb_add_callback_data', 
				array(
					'post_type' => self::POST_CALLBACK,
					'post_status' => 'publish',
					'post_title' => apply_filters('cbb_mail_callback_title', $this->cbb_mail_subject($data), $data),
					'meta_input' => array(
						self::META_KEY => $data,
					),
				)
			);
			
			return wp_insert_post($post_data);
		}
		
		function cbb_mail_callback($data = array()) {
			global $mail_data;
			
			ob_start();
			
			$mail_data = $data;
			$this->cbb_render_view('mail/callback');
			
			return ob_get_clean();
		}
		
		function cbb_mail_subject($data = array()) {			
			return sprintf(__('Callback request from %s at %s', 'chat-bubble'), @$data['fphone'], @$data['title']);
		}
	}
	
	$GLOBALS['plugin_cbb'] = Chat_Bubble_Be::instance();
}
