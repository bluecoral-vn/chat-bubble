jQuery(document).ready(function($) {
	if ($('#form-inner').length && $('#form-outer').length) {
		cbb_update();
		
		$('#form-inner, #form-outer').sortable({
			connectWith: '.bubble-items',
			handle: '.card-header',
			placeholder: 'bubble-item bubble-item-hightlight',
			update: function(e, u) {
				return cbb_update();
			}
		}).disableSelection();
		
		function cbb_update() {
			cbb_update_items('inner');
			cbb_update_items('outer');
		}
		
		function cbb_update_items(itemName) {
			$('#form-'+itemName).find('li').each(function(i, c) {
				c = $(c);
				
				if (c.find('input.bubble-item-hidden-place').length)
					c.find('input.bubble-item-hidden-place').remove();
					
				if (c.find('input.bubble-item-hidden-pos').length)
					c.find('input.bubble-item-hidden-pos').remove();
					
				c.append('<input type="hidden" class="bubble-item-hidden-place" name="'+c.data('name')+'[place]" value="'+itemName+'" />');
				c.append('<input type="hidden" class="bubble-item-hidden-pos" name="'+c.data('name')+'[pos]" value="'+i+'" />');
			});
		}
	}
	
	$('body').on('click', '.bubble-items .card-header', function (){
		return $(this).closest('.card').find('.card-body').toggleClass('hidden');
	});
	
	$('body').on('click', '.bubble-items .bubble-item-enabled', function (){
		return enabled_bubble_item($(this));
	});
	
	$('.bubble-items .bubble-item-enabled').each(function (){
		return enabled_bubble_item($(this));
	});
	
	function enabled_bubble_item(container) {
		if (container.is(':checked')) {
			return container.closest('.bubble-item').addClass('active');
		} else { 
			return container.closest('.bubble-item').removeClass('active');
		}
	}
});