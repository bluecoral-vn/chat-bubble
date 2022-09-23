jQuery(document).ready(function($) {	
	$('body').on('click', '.modal-callback-submit', function (){
		var _this = $(this),
			form = _this.closest('form'),			
			_currentName = _this.find('.txt').text();
		
		if (!form[0].checkValidity()) return false;
		if (_this.hasClass('bluecorel-btn-loading')) return false;
		
		_this.addClass('bluecorel-btn-loading').find('.txt').text('Loading...');
		
		setTimeout(function (argument) {
			_this.removeClass('bluecorel-btn-loading').find('.txt').text(_currentName);
			var data = cbb_form_data(form);	
			return cbb_contact(data);
		}, 1000);
		
	});
	
	$('body').on('click', '.tab-modal .modal-callback-submit-sub', function (){
		var _this = $(this),
			form = $(this).closest('form'),
			n = $(this).data('name'),
			_currentName = _this.find('.txt').text();
		
		if (!form[0].checkValidity()) return false;
		if (_this.hasClass('bluecorel-btn-loading')) return false;
		
		_this.data('lbl', _currentName);
		_this.addClass('bluecorel-btn-loading').find('.txt').text('Loading...');

		var data = cbb_form_data(form);
		
		//
		var formSubmit = $('.form-advanced-submit');
		formSubmit.find('input[name="ftype"]').val(n);
		
		if (data.fmail == '') {
			formSubmit.find('input[name="fmail"]').closest('.form-group').removeClass('hidden');
		} else {
			formSubmit.find('input[name="fmail"]').val(data.fmail);
			formSubmit.find('input[name="fmail"]').closest('.form-group').addClass('hidden');
		}
		
		if (data.fname == '') {
			formSubmit.find('input[name="fname"]').closest('.form-group').removeClass('hidden');
		} else {
			formSubmit.find('input[name="fname"]').val(data.fname);
			formSubmit.find('input[name="fname"]').closest('.form-group').addClass('hidden');
		}
		
		setTimeout(function (argument) {
			_this.removeClass('bluecorel-btn-loading').find('.txt').text(_this.data('lbl'));
			$('[data-name="modal-callback-advanced"]').removeClass('on');
			return $('[data-name="modal-callback-advanced-2"]').addClass('on');
		}, 1000);
		
	});
	
	$('body').on('click', '.modal-callback-submit-adv', function (){
		var _this = $(this),
			tempf = _this.closest('form'),
			_currentName = _this.find('.txt').text();;
		
		if (!tempf[0].checkValidity()) return false;
		if (_this.hasClass('bluecorel-btn-loading')) return false;
		
		_this.data('lbl', _currentName);
		_this.addClass('bluecorel-btn-loading').find('.txt').text('Loading...');
		var tempd = cbb_form_data(tempf);
		
		if ($('.tab-'+tempd.ftype).length) {
			var form = $('.tab-'+tempd.ftype).find('form');
			form.find('input[name="fmail"]').val(tempd.fmail);
			form.find('input[name="fname"]').val(tempd.fname);
			
			setTimeout(function (argument) {
				var data = cbb_form_data(form);			
				return cbb_contact(data);
			}, 1000);
		}		
	});
	
	function cbb_form_data(f) {
		return f.serializeArray().reduce(function(obj, item) {
			obj[item.name] = item.value;
			return obj;
		}, {});
	}
	
	function cbb_contact(d) {
		d.url = window.location.href;
		d.title = document.title;
		d.action = 'cbb_callback_action';
		
		return $.ajax({
			url: cbb.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: d,
			success: function(ret) {
				if (ret.success) {
					$('[data-bluecoral-chat-content]').removeClass('on');
					$('[data-name="modal-callback-end"]').addClass('on');
					
					$('[data-bluecoral-chat-content] form').each(function () {
						var f = $(this),
						b = f.find('[data-button]');
						f[0].reset();
						f.find('input[name="fmail"], input[name="fname"]').val('');
						b.removeClass('bluecorel-btn-loading').find('.txt').text(b.data('lbl'));
					});
				} else {
					return alert(ret.message);
				}
			},
		});
	}
});

if (jQuery('.bluecoral-a-tawkto').length && jQuery('.bluecoral-a-tawkto').data('id').length) {
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/'+jQuery('.bluecoral-a-tawkto').data('id');
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();

	Tawk_API.onLoad = function(){
		Tawk_API.hideWidget();
	};
	
	Tawk_API.onChatMinimized = function(){
		Tawk_API.hideWidget();
	};
	
	jQuery('body').on('click', '.bluecoral-a-tawkto', function() {
		Tawk_API.showWidget();
		Tawk_API.maximize();
	});
	
}
