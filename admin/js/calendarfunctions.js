function Calendar() {

	this.events;
	this.permissions;

	this.getAllEvents = function(callback){
		$.ajax({
			method: "GET",
			url: "calendar/getEvents",
		})
		.done(function(response) {
			callback(response);
		});	
	}

	this.getSingleEvent = function(callback){
		$.ajax({
			method: "GET",
			url: "calendar/getEvent",
		})
		.done(function(response) {
			callback(response);
		});
	}

	this.parsePhpEvents = function(){
		this.events = $('#calendar').data('events');
		this.permissions = $('#calendar').data('permissions');
	}

	this.launchCalendar = function(){
		var self = this;
		$('#calendar').fullCalendar({
			editable: this.permissions.indexOf("canedit") > -1 ? true : false,
			theme: true,
			themeSystem: 'bootstrap3',

			businessHours: true,

			weekends: true,
			firstDay: 1,

			header: {
			  left: 'prev,next today',
			  center: 'title',
			  right: 'month,agendaWeek,agendaDay'
			},

			events: this.events,

			eventClick:  function(event, jsEvent, view) {
				self.getSingleEvent(function(response){
					$('#calendarModal').html(response);
					$('#calendarModal').modal('show');
				});
		    }
		})
	}

}

window.onload = function(){
	var calendar = new Calendar();
	calendar.parsePhpEvents();
	calendar.launchCalendar();
}