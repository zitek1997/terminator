var currentMousePos = {
		x: -1,
		y: -1
};
var pno;var pnc;var wto;var wtc;var sro;var src;var czo;var czc;var pto;var ptc;var sbo;var sbc;

window.onload = function() {
        startTime();
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var m = checkTime(m);
    s = checkTime(s);
    document.getElementById('timer').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

$(document).ready(function(){
        $("#wait").hide();
        $("#wait_delete").hide();
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
        $("#options").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#cards").hide();
    $("#clients-toggle").click(function(){
        $("#clients-toggle").addClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#cards-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#clients").show();
        $("#terms").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#cards").hide();
        $("#options").hide();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#ctime-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").addClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#cards-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").show();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#cards").hide();
        $("#options").hide();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#terms-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").addClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#cards-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#terms").show();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#cards").hide();
        $("#options").hide();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#tokcircle-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").addClass( "chosen" );
        $("#cards-toggle").removeClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").show();
        $("#terms").hide();
        $("#cards").hide();
        $("#options").hide();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#cards-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#cards-toggle").addClass( "chosen" );
        $("#options-toggle").removeClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#cards").show();
        $("#options").hide();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#options-toggle").click(function(){
        $("#clients-toggle").removeClass( "chosen" );
        $("#terms-toggle").removeClass( "chosen" );
        $("#ctime-toggle").removeClass( "chosen" );
        $("#tokcircle-toggle").removeClass( "chosen" );
        $("#cards-toggle").removeClass( "chosen" );
        $("#options-toggle").addClass( "chosen" );
        $("#clients").hide();
        $("#ctime").hide();
        $("#tokcircle").hide();
        $("#terms").hide();
        $("#cards").hide();
        $("#options").show();
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
    });
    $("#menu-toggle").click(function(){
        if ($("#sidebar-toggle").hasClass("hid")) {
        $("#head-brand-toggle").show("slide", 550),
        $("#sidebar-toggle").show("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" ),
        $("#sidebar-toggle").removeClass( "hid" );
        }
        else{
        $("#head-brand-toggle").hide("slide", 550),
        $("#sidebar-toggle").hide("slide", 550),
        $("#main-toggle").toggleClass( "togglemain", 550, "linear" );
        $("#sidebar-toggle").addClass( "hid" );
        }
    });

		userDetail();
		popoverDetail();
		userAccess();
});

function getFreshEvents(){
	$('#calendar').fullCalendar( 'refetchEvents' );
}

function isElemOverDiv() {
			return false;
	}

function isClientOverDiv(){
	var wEl = jQuery('#wait');
	var ofs = wEl.offset();
	var x1 = ofs.left;
	var x2 = ofs.left + wEl.outerWidth(true);
	var y1 = ofs.top;
	var y2 = ofs.top + wEl.outerHeight(true);
	if (currentMousePos.x >= x1 && currentMousePos.x <= x2 && currentMousePos.y >= y1 && currentMousePos.y <= y2)
	{
		return true;
	}else{
		return false;
	}
}

function draggable() {
	$.ajax({
	 type: "POST",
	 url: "ajax/draggable.php",
	 success: function(data){
		 $('#lista').html(data);
		 $('.fc-event').each(function() {

			 // store data so the calendar knows to render an event upon drop
			 $(this).data('event', {
				 title: $.trim($(this).text()), // use the element's text as the event title
				 idc: $(this).attr("id"),
				 stick: true // maintain when user navigates (see docs on the renderEvent method)
			 });

			 // make the event draggable using jQuery UI
			 $(this).draggable({
                                start: function( ) {$("#wait").show("slide", 100);},
                                stop: function( ) {$("#wait").hide("slide", 1000);},
				 revert: true,      // will cause the event to go back to its
				 revertDuration: 0,  //  original position after the drag
         containment: "body"
			 });

		 });
		 var options = {
		   valueNames: [ 'name' ]
		 };

		 var userList = new List('clients', options);

	 }
 });
}

function waitplz() {
	$.ajax({
	 type: "POST",
	 url: "ajax/recivewaiting.php",
	 success: function(data){
		 $('#listaw').html(data);
		 $('.pending_customer').each(function() {

			 // store data so the calendar knows to render an event upon drop
			 $(this).data('event', {
				 title: $.trim($(this).text()), // use the element's text as the event title
				 idc: $(this).attr("id"),
				 stick: true // maintain when user navigates (see docs on the renderEvent method)
			 });

			 // make the event draggable using jQuery UI
			 $(this).draggable({
                               start: function() {$("#wait_delete").show("slide", 100);},
                               stop: function() {$("#wait_delete").hide("slide", 1000);},
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

function endwait(id){
	$.ajax({
		type: "POST",
		url: "ajax/endwait.php",
		data: "id="+id,
		success: function(data){
			 waitplz();
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
	});
}

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

function weDel(id){
	$(".popover").hide();
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

function logOut(){
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

function saveHours(){
	pno = document.forms.whours.pno.value;
	pnc = document.forms.whours.pnc.value;
	wto = document.forms.whours.wto.value;
	wtc = document.forms.whours.wtc.value;
	sro = document.forms.whours.sro.value;
	src = document.forms.whours.src.value;
	czo = document.forms.whours.czo.value;
	czc = document.forms.whours.czc.value;
	pto = document.forms.whours.pto.value;
	ptc = document.forms.whours.ptc.value;
	sbo = document.forms.whours.sbo.value;
	sbc = document.forms.whours.sbc.value;
	$.ajax({
		url: 'ajax/saveHours.php',
		data: "pno="+pno+"&pnc="+pnc+"&wto="+wto+"&wtc="+wtc+"&sro="+sro+"&src="+src+"&czo="+czo+"&czc="+czc+"&pto="+pto+"&ptc="+ptc+"&sbo="+sbo+"&sbc="+sbc,
		type: 'POST',
		success: function(data){
			$('#calendar').fullCalendar( 'destroy' );
			drawCallendar();
		}
	});
}

function setHours(){
	$('#modalWH').modal('show');
	$.ajax({
		url: 'ajax/setHours.php',
		type: 'POST',
		async: false,
		success: function(data){
			$("#workHours").html(data);
			$('#pno').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#pnc').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#wto').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#wtc').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#sro').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#src').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#czo').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#czc').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#pto').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#ptc').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#sbo').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
			$('#sbc').bootstrapMaterialDatePicker({ format: "HH:mm", lang : 'pl', date: false});
		}
	});
}

function reciveHours(){
	$.ajax({
		url: 'ajax/reciveHours.php',
		type: 'POST',
		async: false,
		success: function(h){
			hours = JSON.parse(h);
			pno = hours[0];
			pnc = hours[1];
			wto = hours[2];
			wtc = hours[3];
			sro = hours[4];
			src = hours[5];
			czo = hours[6];
			czc = hours[7];
			pto = hours[8];
			ptc = hours[9];
			sbo = hours[10];
			sbc = hours[11];
		}
	});
}

function gotofree(date){
	$('#calendar').fullCalendar('gotoDate',date);
	$('#calendar').fullCalendar('changeView','agendaDay');
}

function seefree(){
	$.ajax({
		url: 'ajax/freeterms.php',
		type: 'POST',
		success: function(data){
			$("#icanfly").html(data);
		}
	});
}

function newUser(){
	$('#modalNewUser').modal('show');
}

function userAccess(){
        $.ajax({
		url: 'ajax/userAccess.php',
		type: 'POST',
		success: function(data){
			$("#userAccess").html(data);
		}
	});
}

function setDefaults(){
	$('#defaults').modal('show');
	$.ajax({
		url: 'ajax/NOTdefaults.php',
		type: 'POST',
		success: function(data){
			$("#setDefaults").html(data);
		}
	});
}

function saveDefaults(){
	subject = document.getElementById("defTitle").value;
	message = document.getElementById("defMess").value;
	headers = document.getElementById("defHead").value;
	$.ajax({
		url: 'ajax/NOTdefUP.php',
		type: 'POST',
		data: "sub="+subject+"&mes="+message+"&head="+headers,
	});
}

function MaddClient(){
	document.getElementById("empForm").reset();
	$('#MaddClient').modal('show');
}

function MaddClientClose(){
	$('#MaddClient').modal('hide');
}

function seeTheHistory(){
	$.ajax({
		url: "ajax/seeTheHistory.php",
		type: "POST",
		async: false,
		success: function(data){
			$("#cardsb").html(data);
			// $('#sTH').modal('show');
			$("cardsOfHistoryBU").val($("#cardsOfHistory").val());
			var	options = {
				valueNames: [ 'clientname' ]
			};
			var	clientList = new List('cards', options);
		}
	});
}

function closeTheHistory(){
	// $('#sTH').modal('hide');
	$("#cardsb").html("Historia HERE");
}

function makeSomeMagic(tab){
	len = tab.length;
	table = document.getElementById("cardHistory").getElementsByTagName('tbody')[0];
	new_tbody = document.createElement('tbody');
	table.parentNode.replaceChild(new_tbody, table);
	table = document.getElementById("cardHistory").getElementsByTagName('tbody')[0];
	for(x=0;x<len;x++){
		newRow   = table.insertRow(table.rows.length);
		newCellS  = newRow.insertCell(0);
		newCellD  = newRow.insertCell(1);
		newDate  = document.createTextNode(tab[x]["opis"]);
		newService  = document.createTextNode(tab[x]["startdate"]);
		newCellD.appendChild(newDate);
		newCellS.appendChild(newService);
	}
}

function openDir(id){
	cards = document.getElementById('cardsOfHistoryBU').value;
	c = JSON.parse(cards);
	card = c[id];
	console.log(card);
	hist = card["history"];
	name = card["name"];
	mail = card["poczta"];
	phone = card["tel"];
	adres = card["adres"];
	makeSomeMagic(hist);
	document.getElementById("cardName").value = name;
	document.getElementById("cardEmail").value = mail;
	document.getElementById("cardTel").value = phone;
	document.getElementById("cardAdres").value = adres;
	$('#KKK').modal('show');
}
