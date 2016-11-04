
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
				 idc: $(this).attr("id"),
				 stick: true // maintain when user navigates (see docs on the renderEvent method)
			 });

			 // make the event draggable using jQuery UI
			 $(this).draggable({
				 zIndex: 999,
				 revert: true,      // will cause the event to go back to its
				 revertDuration: 0  //  original position after the drag
			 });

		 });
		 var options = {
		   valueNames: [ 'name' ]
		 };

		 var userList = new List('clients', options);

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

function cEdit(id){
	$.ajax({
url: 'ajax/cEdit.php',
data: 'id='+id,
type: 'POST',
dataType: 'json',
success: function(r){

// user = JSON.parse(r);
user = r;
document.forms.modalClient.id.value=user.id;
document.forms.modalClient.imie.value=user.imie;
document.forms.modalClient.nazwisko.value=user.nazwisko;
document.forms.modalClient.tel.value=user.tel;
document.forms.modalClient.email.value=user.email;
document.forms.modalClient.adres.value=user.adres;
$('#modalClient').modal('show');

}
});}

function cSave(){
	id=document.forms.modalClient.id.value;
	im=document.forms.modalClient.imie.value;
	na=document.forms.modalClient.nazwisko.value;
	te=document.forms.modalClient.tel.value;
	em=document.forms.modalClient.email.value;
	ad=document.forms.modalClient.adres.value;
	$.ajax({
url: 'ajax/cSave.php',
data: 'id='+id+'&imie='+im+'&nazwisko='+na+'&tel='+te+'&email='+em+'&adres='+ad,
type: 'POST',
dataType: 'json',
success: function(){}});
draggable();
// $('#modalClient').modal('hide');
	document.forms.modalClient.id.value="";
	document.forms.modalClient.imie.value="";
	document.forms.modalClient.nazwisko.value="";
	document.forms.modalClient.tel.value="";
	document.forms.modalClient.email.value="";
	document.forms.modalClient.adres.value="";
	// setTimeout(draggable(), 3000);
$('#calendar').fullCalendar( 'refetchEvents' );
}

function cDel(){
	id=document.forms.modalClient.id.value;
	$.ajax({
url: 'ajax/cDel.php',
data: 'id='+id+'&idc='+id,
type: 'POST',
dataType: 'json',
success: function(){}});
draggable();
// $('#modalClient').modal('hide');
	cliid=""
	document.forms.modalClient.id.value="";
	document.forms.modalClient.imie.value="";
	document.forms.modalClient.nazwisko.value="";
	document.forms.modalClient.tel.value="";
	document.forms.modalClient.email.value="";
	document.forms.modalClient.adres.value="";
	// setTimeout(draggable(), 3000);
	$.ajax({
		url: 'process.php',
				type: 'POST', // Send post data
				data: 'type=fetch',
				async: false,
				success: function(s){
					freshevents = s;
				}
	});
	$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	$('#calendar').fullCalendar( 'refetchEvents' );
	}
