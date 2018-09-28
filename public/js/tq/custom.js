(function($) {
	'use strict';

	$(document).ready(function() {

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy'
		});

		$('#cc_input').tagsInput();
		$('.email_tag').tagsInput();

		//btn extra time action
		$('.btn-extra').click(function(e) {
			e.preventDefault();
			var _this = $(this);
			var ID = _this.data('id');
			var name = _this.data('name');
			$('#extra_id').val(ID);
			$('#extra_name_customer').html(name);
			$('.panel-bottom-bar').hide();
			$('.panel-bottom-bar').removeClass('hide');
			$('.panel-extra').show();
			$('.bottom-bar').addClass('active');
		});

		//btn send-mail action
		$('.btn-send-mail').click(function(e) {
			e.preventDefault();
			var _this = $(this);
			var ID = _this.data('id');
			var name = _this.data('name');
			$('#mail_id').val(ID);
			$('#mail_name_customer').html(name);
			$('.panel-bottom-bar').hide();
			$('.panel-bottom-bar').removeClass('hide');
			$('.panel-send-mail').show();
			$('.bottom-bar').addClass('active');
		});

		//btn close action
		$('.btn-close-bottom-bar').click(function(e) {
			e.preventDefault();
			$('.bottom-bar').removeClass('active');
		});

		$('#status').val($('.status').val());
		$('#category_id').val($('.category_id').val());
		$('.filter-form input').on('change', function() {
			$('.filter-form').submit();
		});

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('.btn-delete').click(function(e) {
			e.preventDefault();
			var _this = $(this);
			if(confirm('Do u want to continue?')) {
				$.ajax({
					url: _this.data('action'),
					method: 'post',
					data: {
						id: _this.data('id')
					},
					success: function(res) {
						if(res.success) {
							location.reload();
						}
					}
				});
			}else {
				return false;
			}
		});

		$('.sort').on('change', function() {
			$('.frm-sort').submit();
		});

		$('.chart_bg_color').ColorPicker({
			'color': 'RGB'
		});

		$('.chart_bd_color').ColorPicker({
			'color': 'RGB'
		});
		
	});
})(jQuery);