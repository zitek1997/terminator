var currentMousePos = {
		x: -1,
		y: -1
};
$(document).ready(function(){
        $("#popover-av").clickover({
        global_close: true,
        html : true,
        container: '.nav',
        content: function() {
          return $("#popover-av-content").html();
        }
    });
        $("#clients-toggle").addClass( "chosen" );
        $("#clients").show();
        $("#terms").hide();
        $("#notify").hide();
        $("#options").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
    $("#clients-toggle").click(function(){
        $("#clients-toggle").addClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#notify-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#clients").show();
        $("#terms").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#notify").hide();
        $("#options").hide();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#ctime-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").addClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#notify-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").show();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#notify").hide();
        $("#options").hide();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#terms-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").addClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#notify-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#terms").show();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#notify").hide();
        $("#options").hide();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#tokcircle-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").addClass( "chosen" );
        $("#notify-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").show();
        $("#terms").hide();
        $("#notify").hide();
        $("#options").hide();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#notify-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#notify-toggle").addClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#notify").show();
        $("#options").hide();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#options-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#notify-toggle").removeClass( "chosen" );
        $("#options-toggle").addClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#notify").hide();
        $("#options").show();
        if ($("#lista").hasClass("hidden")) {
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").removeClass( "hidden" );
        $("#main-toggle").removeClass( "togglemain", 550, "easeOutSine" );
        }
    });
    $("#menu-toggle").click(function(){
        $("#head-brand-toggle").animate({width: 'toggle'});
        $("#sidebar-toggle").animate({width: 'toggle'});
        $("#lista").toggleClass( "hidden" );
        $("#main-toggle").toggleClass( "togglemain", 550, "easeOutSine" );
    });
});
function getFreshEvents(){
	$('#calendar').fullCalendar('removeEvents');
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
	// alert("getFreshEvents");
}

function isElemOverDiv() {
			// var trashEl = jQuery('#trash');
			//
			// // var ofs = trashEl.offset();
			//
			// var x1 = ofs.left;
			// // var x2 = ofs.left + trashEl.outerWidth(true);
			// var y1 = ofs.top;
			// // var y2 = ofs.top + trashEl.outerHeight(true);
			//
			// if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
			// 		currentMousePos.y >= y1 && currentMousePos.y <= y2) {
			//
			// 		return true;
			// }
			return false;
	}


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
				 revertDuration: 0,  //  original position after the drag
			 });

		 });
		 var options = {
		   valueNames: [ 'name' ]
		 };

		 var userList = new List('clients', options);

	 }
 });
}
function termlist() {
	$.ajax({
	 type: "POST",
	 url: "ajax/termlist.php",
	 success: function(data){
		 $('#termlist').html(data);
	 }
 });
}
function userDetail() {
	$.ajax({
	 type: "POST",
	 url: "ajax/user-detail.php",
	 success: function(data){
		 $('#user-detail').html(data);
	 }
 });
}
function popoverDetail() {
	$.ajax({
	 type: "POST",
	 url: "ajax/popover-detail.php",
	 success: function(data){
		 $('#popover-detail').html(data);
	 }
 });
}
function pickTerm(id){
    	$.ajax({
	 type: "POST",
         url: "ajax/pickterm.php",
         data: 'id='+id,
         dataType: 'json',
	 success: function(){
                    getFreshEvents();
	 }
 });
}
function save(){

			event = evenement;
	    id = document.forms.modal.id.value;
			title = document.forms.modal.ev.value;
			start = document.forms.modal.startdate.value;
			end = document.forms.modal.enddate.value;
			opis = document.forms.modal.cSvc.value;
			event.title = title;
			event.start = start;
			event.end = end;
			event.opis = opis;
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
// success: function(){}
});
draggable();
// $('#modalClient').modal('hide');
	document.forms.modalClient.id.value="";
	document.forms.modalClient.imie.value="";
	document.forms.modalClient.nazwisko.value="";
	document.forms.modalClient.tel.value="";
	document.forms.modalClient.email.value="";
	document.forms.modalClient.adres.value="";
	// setTimeout(draggable(), 3000);
// $('#calendar').fullCalendar( 'refetchEvents' );
}

function weDel(id)
{
	$("#popover-event-content").hide();
	$.ajax({
		url: 'process.php',
		data: 'type=remove&eventid='+id,
		type: 'POST',
		dataType: 'json',
		success: function(response){
			console.log(response);
			if(response.status == 'success'){
				getFreshEvents();
			}
		},
		error: function(e){
			alert('Error processing your request: '+e.responseText);
		}
	});
}

function cDel(){
	id=document.forms.modalClient.id.value;
	$.ajax({
url: 'ajax/cDel.php',
data: 'id='+id+'&idc='+id,
type: 'POST',
dataType: 'json',
// success: function(){}
});



getFreshEvents();
	cliid=""
	document.forms.modalClient.id.value="";
	document.forms.modalClient.imie.value="";
	document.forms.modalClient.nazwisko.value="";
	document.forms.modalClient.tel.value="";
	document.forms.modalClient.email.value="";
	document.forms.modalClient.adres.value="";
draggable();

	}



function logOut()
{
	$.ajax({
		url: 'ajax/logout.php',
		success: function(data){
			window.location.replace("http://projekt.itcave.pl");
		}
	});
}

function pickDate(){
	starto = document.forms.modal.startdate.value;
	endo = document.forms.modal.enddate.value;

	$('#enddate').bootstrapMaterialDatePicker({ weekStart :  1, currentDate: endo, format: "YYYY-MM-DD HH:mm", lang : 'pl'});

	$('#startdate').bootstrapMaterialDatePicker({ weekStart : 1, currentDate: starto, format: "YYYY-MM-DD HH:mm", lang : 'pl'}).on('change', function(e, date)
	{
		$('#enddate').bootstrapMaterialDatePicker('setMinDate', date);
	});
}

function pickService(id){
	$('#modalService').modal('show');
	$.ajax({
		url: 'ajax/eventService.php',
		data: 'id='+id,
		type: 'POST',
		success: function(data){
			$("#eventService").html(data);

		}
	});
}

function chservice(id){
	name = document.forms.eSvc.cSvc.value;
	opis = document.forms.eSvc.sDesc.value;
	opt = "ch";
	$.ajax({
		url: 'ajax/c-Service.php',
		data: 'name='+name+'&opis='+opis+'&opt='+opt+'&id='+id,
		type: 'POST',
	});
}

function crservice(id, e = 0){
	if(id!="e"){
		if(e==0)
		{
			name = document.forms.eSvc.nName.value;
			opis = document.forms.eSvc.nDesc.value;
		}else{
			name = document.forms.modal.nName.value;
			opis = document.forms.modal.nDesc.value;
		}
		opt = "cr";
		$.ajax({
			url: 'ajax/c-Service.php',
			data: 'name='+name+'&opis='+opis+'&opt='+opt+'&id='+id,
			type: 'POST',
		});
	}
}
