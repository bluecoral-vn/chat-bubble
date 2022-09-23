<?php
/*
*
* View Name: Chat Bubble Ad class
*
*/

if (!defined('ABSPATH')) exit; 

if (!class_exists('CBB_Ad')) {
	class CBB_Ad {
		/**
		* Class Construct
		*/
		public function __construct($args = array()) {
			if (count($args) > 0) {
				foreach ($args as $i => $v) {
					$this->{$i} = $this->format_value($i, $v);
				}
			}
			
			$this->retrieve_fields();
		}
		
		public function __get($attr = ''){
			return isset($this->$attr) ? $this->$attr : '';
		}
		
		function format_value($key, $value) {
			if (is_int($value)) return $value;
			if (is_array($value)) return $value;

			return stripcslashes($value);
		}
		
		public function retrieve_fields() {
			if ($this->inner_fields && $this->outer_fields) return;
			
			$data = CBB_Fields::retrieve_fields($this);			
			$this->inner = (isset($data['inner'])) ? (array) $data['inner'] : array();
			$this->outer = (isset($data['outer'])) ? (array) $data['outer'] : array();
			$this->fields = (isset($data['fields'])) ? (array) $data['fields'] : array();
			$this->inner_fields = (isset($data['inner_fields'])) ? (array) $data['inner_fields'] : array();
			$this->outer_fields = (isset($data['outer_fields'])) ? (array) $data['outer_fields'] : array();
		}
		
		function sort_fields($a, $b) {
			$ap = (int) @$a['pos'];
			$bp = (int) @$b['pos'];
			
			if ($ap == $bp) {
				return 0;
			}
			return ($ap > $bp) ? +1 : -1;
		}
		
		public function form_inner() {
			$this->form_id = 'form-inner';
			$this->form_fields = $this->inner_fields; 
			
			require(trailingslashit(plugin_dir_path(__FILE__)).'../views/chat-bubble-ad/form.php');
		}
		
		public function form_outer() {
			$this->form_id = 'form-outer';
			$this->form_fields = $this->outer_fields; 
			
			require(trailingslashit(plugin_dir_path(__FILE__)).'../views/chat-bubble-ad/form.php');
		}
	}
}
