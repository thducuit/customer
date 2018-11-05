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
		$('#supplier_id').val($('.supplier_id').val());
		$('.filter-form input').on('change', function() {
			$('.filter-form').submit();
		});

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('.btn-delete, .btn-refresh').click(function(e) {
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

		$('#chart_bg_color').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(rgb);
				$(el).ColorPickerHide();
			}
		});

		$('#chart_bd_color').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(rgb);
				$(el).ColorPickerHide();
			}
		});

		$('.form-mail #template_id').on('change', function() {
			var template_id = $(this).val();
			if(template_id && parseInt(template_id) !== 0) {
				$.ajax({
					url: '/template/get',
					method: 'get',
					data: {
						id: template_id
					},
					success: function(res) {
						if(res.success && res.template) {
							$('.form-mail #title').val(res.template.title);	
							$('.form-mail #editor').val(res.template.content);	
							CKEDITOR.instances['editor'].setData(res.template.content);
						}else {
							alert(res.message);
						}
					}
				});
			}else {
				$('.form-mail #title').val('');	
				$('.form-mail #editor').val('');	
				CKEDITOR.instances['editor'].setData('');
			}
		});

		$('#log-table').DataTable();
		$('#template-table').DataTable();
		$('#task-table').DataTable();
		$('#sup-table').DataTable();
		$('#cat-table').DataTable();
		$('#cus-table').DataTable({
			"columns": [
				{ "orderable": false },
				{ "orderable": false },
				null,
				{ type: 'date-uk', targets: 1 },
				{ type: 'date-uk', targets: 2 },
				null,
				null,
				{ type: 'numeric-comma', targets: 5 },
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false }
			]
		});
		
	});
})(jQuery);