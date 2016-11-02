
function draggable() {
	$.ajax({
	 type: "POST",
	 url: "ajax/draggable.php",
	 success: function(data){
		 $('#lista').html(data);
		 $('#external-events .fc-event').each(function() {

			 // store data so the calendar knows to render an event upon drop
			 $(this).data('event', {
				 title: $.trim($(this).text()), // use the element's text as the event title
				 stick: true // maintain when user navigates (see docs on the renderEvent method)
			 });

			 // make the event draggable using jQuery UI
			 $(this).draggable({
				 zIndex: 999,
				 revert: true,      // will cause the event to go back to its
				 revertDuration: 0  //  original position after the drag
			 });

		 });
	 }
 });
}
function save(){

			event = evenement;
	    id = document.forms.modal.id.value;
			title = document.forms.modal.ev.value;
			start = document.forms.modal.startdate.value;
			end = document.forms.modal.enddate.value;
			opis = document.forms.modal.opis.value;
			event.end = end;
	    $.ajax({
		url: 'process.php',
		data: 'type=change&title='+title+'&eventid='+id+'&startdate='+start+'&enddate='+end+'&opis='+opis,
		type: 'POST',
		dataType: 'json',
		success: function(response){
			if(response.status == 'success'){
	    				$('#calendar').fullCalendar('updateEvent',event);}
		},
		error: function(e){
			alert('Error processing your request: '+e.responseText);
		}
	});
}
