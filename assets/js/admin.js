jQuery(document).ready(function($) {
	var cbbMedia;
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#greeting-avatar').on('click', function(e) {
		e.preventDefault();
		 
		if (cbbMedia) return cbbMedia.open();
		 
		cbbMedia = wp.media.frames.file_frame = wp.media({
			title: 'Select media',
			button: {
			text: 'Select media'
		}, multiple: false });	 
		
		cbbMedia.on('select', function() {
			var attachment = cbbMedia.state().get('selection').first().toJSON();
			return $('#greeting_avatar').val(attachment.url);
		});
		
		cbbMedia.open();
    });	
	
	$('#button-link-items').on('click', function() {
		if (!$('#link-items-temp').length) return;
		
		var html = $('#link-items-temp').html();
		$('#link-items').append(html);		
		return $('#link-items').find('.bubble-item').last().find('.card-body').removeClass('hidden');
	});
	
	$('#link-items').sortable({
		cancel: '.card-delete',
		handle: '.card-header',
		placeholder: 'bubble-item bubble-item-hightlight',
	}).disableSelection();
	
	links_header();
	
	$('body').on('keyup keydown change', '#link-items .form-control-link-text', function (){
		links_header();
	});
	
	function links_header() {
		$('#link-items').find('.bubble-item').each(function () {
			var item = $(this);
			var text = item.find('.form-control-link-text').val();
			text = (text.length) ? text : '&nbsp;';
			return item.find('.card-header h5').html(text);
		});
	}
	
	$('body').on('click', '.card .card-delete', function (){
		var container = $(this);
		
		if (confirm(container.data('confirm'))) return container.closest('.bubble-item').remove();
	});
	
	$('body').on('change', '#link-items .bubble-item-lbl input[type=checkbox]', function (){
		var container = $(this);		
		var b = (container.is(':checked')) ? 1 : 0;
		
		return container.closest('.bubble-item-lbl').find('input[type=hidden]').val(b);
	});
});