window.onload = function(){
	$.fn.editable.defaults.mode = 'popup';
	$.fn.editable.defaults.ajaxOptions = {type: "POST"};

	/* Event to handle editable input changes */
	$('#adminTable').on('click','.admin-editable', function(evt){
		var type = $(event.target).data("type");

		if (type === "text") {
			editText(evt);
		} else if (type = "date") {
			editDate(event);
		}
	});

	/* Event to handle a delete request */
	$('#adminTable').on('click','.admin-delete', function(event){
		$.ajax({
			method: "POST",
			url: ".././admindeletedata",
			data: { 
				page: $(event.target).data("page"),
				pk: $(event.target).data("pk"),
				csrf_name: $('input[name=csrf_name]').val(),
				csrf_value: $('input[name=csrf_value]').val(),
			},
		})
		.done(function() {
			$(event.target).closest('tr').remove();
		});
	});

	/* Event to handle an update request */
	$('#adminTable').on('click', '.admin-update', function(event){
		$.ajax({
			method: "POST",
			url: ".././adminupdatedata",
			data: { 
				page: $(event.target).data("page"),
				pk: $(event.target).data("pk"),
				name: $(event.target).data("name"),
				value: $(event.target).data("newvalue"),
				csrf_name: $('input[name=csrf_name]').val(),
				csrf_value: $('input[name=csrf_value]').val(),
			},
		})
		.done(function(response) {
			$(event.target).closest('tr').after(response);
			$(event.target).closest('tr').remove();
		});
	});

	/* Change page */
	$('#adminTable').on('click','.pagination-page-change', function(event){
		$.ajax({
			method: "POST",
			url: ".././adminpaginatedata",
			data: { 
				page: $(event.target).data("page"),
				pagesize: $('#selected-page-size').data('value'),
				value: $(event.target).attr("value"),
				csrf_name: $('input[name=csrf_name]').val(),
				csrf_value: $('input[name=csrf_value]').val(),
			},
		})
		.done(function(response) {
			$(event.target).closest('#table_container').empty().html(response);
		});
	});

	/* Change page size */
	$('#adminTable').on('click','.pagination-page-size-change', function(event){
		$.ajax({
			method: "POST",
			url: ".././adminpaginatedata",
			data: { 
				page: $(event.target).data("page"),
				pagesize: $(event.target).attr("value"),
				value: $('#selected-page').data('value'),
				csrf_name: $('input[name=csrf_name]').val(),
				csrf_value: $('input[name=csrf_value]').val(),
			},
		})
		.done(function(response) {
			$(event.target).closest('#table_container').empty().html(response);
		});
	});

	$('.pagination-page-change').first().attr('value')


	/*Edit a text field */
	function editText(evt){
		$(evt.target).editable({
			params: function(params) {
		        params.page = $(evt.target).data("page");
		        params.csrf_name = $('input[name=csrf_name]').val();
				params.csrf_value = $('input[name=csrf_value]').val();
		        return params;
		    },
		});
	};

	/* Edit a date field */
	function editDate(evt){
		$(evt.target).editable({
			params: function(params) {
		        params.page = $(evt.target).data("page");
		        params.csrf_name = $('input[name=csrf_name]').val();
				params.csrf_value = $('input[name=csrf_value]').val();
		        return params;
		    },
		    format: 'yyyy-mm-dd',    
			viewformat: 'dd-mm-yyyy',  
			datepicker: {
				weekStart: 1
			},
		});
	}

}