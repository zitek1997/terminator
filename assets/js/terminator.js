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
	$('#calendar').fullCalendar( 'removeEvents' );
	$('#calendar').fullCalendar( 'refetchEvents' );
	// console.log("refetchEvents");
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
                                start: function(e, ui) {$("#wait").show("slide", 100),$(this).fadeTo( "slow" , 0.3), $(ui.helper).addClass("fc-event"); },
                                stop: function( ) {$("#wait").hide("slide", 1000),$(this).fadeTo( "slow" , 1);},
				 revert: true,      // will cause the event to go back to its
				 revertDuration: 600,  //  original position after the drag
                                 helper: 'clone',
                                containment: "body",
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
                               start: function(e, ui) {$("#wait_delete").show("slide", 100);$(this).fadeTo( "slow" , 0.3), $(ui.helper).addClass("pending_customer");},
                               stop: function() {$("#wait_delete").hide("slide", 1000);$(this).fadeTo( "slow" , 1);},
				 revert: true,      // will cause the event to go back to its
				 revertDuration: 600,  //  original position after the drag
                                 helper: 'clone',
                                containment: "body",
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
			if (event.idc != "customEv"){
				if (opis == "new"){
					opis = document.forms.modal.neName.value;
				}
				if(document.getElementById("someSwitchOptionSuccess").checked){
					noti = 1;
				}else{
					noti = 0;
				}
				if(document.getElementById("checkbox3").checked){
					sms = 1;
				}else{
					sms = 0;
				}
				if(document.getElementById("checkbox4").checked){
					email = 1;
				}else{
					email = 0;
				}
			}else{
				noti = 0;
				sms = 0;
				email = 0;
			}
			// event.title = title;
			// // event.start = start;
			// // event.end =  end;
			// event.opis = opis;
	    $.ajax({
		url: 'process.php',
		data: 'type=change&title='+title+'&eventid='+id+'&startdate='+start+'&enddate='+end+'&opis='+opis+'&noti='+noti+'&sms='+sms+'&email='+email,
		type: 'POST',
		success: function(s){
			console.log(s);
			r = JSON.parse(s);
			event.title = r.title;
			event.start = r.start;
			event.end = r.end;
			event.opis = r.opis;
			event.noti = r.noti;
			event.allDay = false;
			console.log(event);
		},
		error: function(e){
			alert('Error processing your request: '+e.responseText);
		}
	});

		getFreshEvents();
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
	id=document.getElementById('cardId').value;
	im=document.getElementById('cardFName').value;
	na=document.getElementById('cardLName').value;
	te=document.getElementById('cardTel').value;
	em=document.getElementById('cardEmail').value;
	ad=document.getElementById('cardAdres').value;
	$.ajax({
		url: 'ajax/cSave.php',
		data: 'id='+id+'&imie='+im+'&nazwisko='+na+'&tel='+te+'&email='+em+'&adres='+ad,
		type: 'POST',
		dataType: 'json',
		// success: function(){}
	});
	draggable();
	seeTheHistory();
	openDir(id);
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
	id=document.getElementById('cardId').value;
	$.ajax({
		url: 'ajax/cDel.php',
		data: 'id='+id+'&idc='+id,
		type: 'POST',
		dataType: 'json',
		// success: function(){}
	});
	getFreshEvents();
	cliid=""
	seeTheHistory();
	draggable();
	$('#KKK').modal('hide');
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
	$('#enddate').bootstrapMaterialDatePicker({ weekStart :  1, currentDate: endo, format: "YYYY-MM-DD HH:mm:ss", lang : 'pl'}).on('change', function(e, date)
	{
		s=$('#startdate').val();
		e=$('#enddate').val();
		if(s>e){
			end = moment(e);
			end = end - 30*60000;
			end = new Date(end);
			year = end.getFullYear();
			month = end.getMonth();
			month++;
			if(month < 10){
				month = "0"+month;
			}
			day = end.getDate();
			hour = end.getHours();
			minute = end.getMinutes();
			val = year+"-"+month+"-"+day+" "+hour+":"+minute+":00";
			$('#startdate').val(val);
		}
	});

	$('#startdate').bootstrapMaterialDatePicker({ weekStart : 1, currentDate: starto, format: "YYYY-MM-DD HH:mm:ss", lang : 'pl'}).on('change', function(e, date)
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
	$.ajax({
		url: 'ajax/newusercontent.php',
		type: 'POST',
		success: function(data){
			$("#newusercontent").html(data);
			$('#modalNewUser').modal('show');
		}
	});
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

function addTerm(){
  document.getElementById("termForm").reset();
	$.ajax({
		url: 'ajax/addTermcontent.php',
		type: 'POST',
		success: function(data){
			$("#term_access").html(data);
			$('#addTerm').modal('show');
		}
	});
}

function termaddClose(){
	$('#addTerm').modal('hide');
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
			$("#cardsOfHistoryBU").val($("#cardsOfHistory").val());
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
	lname = card["lname"];
	fname = card['fname'];
	mail = card["poczta"];
	phone = card["tel"];
	adres = card["adres"];
	document.getElementById('editMode').checked = false;
	editMode();
	makeSomeMagic(hist);
	document.getElementById('cardId').value = id;
	document.getElementById("cardName").value = name;
	document.getElementById("cardLName").value = lname;
	document.getElementById("cardFName").value = fname;
	if(mail == null){
		document.getElementById("cardEmail").placeholder = "Nie podano";
	}else{
		document.getElementById("cardEmail").value = mail;
	}
	if(phone == null){
		document.getElementById("cardTel").placeholder = "Nie podano";
	}else{
		document.getElementById("cardTel").value = phone;
	}
	if(adres == null){
		document.getElementById("cardAdres").placeholder = "Nie podano";
	}else{
		document.getElementById("cardAdres").value = adres;
	}
	$('#KKK').modal('show');
}

function SoH(){
	if(document.getElementById("someSwitchOptionSuccess").checked){
		document.getElementById("se").style.display = 'block';
	}else{
		document.getElementById("se").style.display = 'none';
	}
}

function editMode(){
 if(document.getElementById('editMode').checked){
	 document.getElementById('cardId').disabled = false;
	 document.getElementById("cardFName").disabled = false;
	 document.getElementById("cardLName").disabled = false;
	 document.getElementById("cardEmail").disabled = false;
	 document.getElementById("cardTel").disabled = false;
	 document.getElementById("cardAdres").disabled = false;
	 document.getElementById('KASUJ').type = "button";
	 document.getElementById('ZAPISZ').type = "button";
	 document.getElementById('historyTable').style.display = "none";
	 document.getElementById('editSuabo').style.display = "none";
	 document.getElementById('editMocno').style.display = "block";
 }else{
	 document.getElementById('cardId').disabled = true;
	 document.getElementById("cardName").disabled = true;
	 document.getElementById("cardEmail").disabled = true;
	 document.getElementById("cardTel").disabled = true;
	 document.getElementById("cardAdres").disabled = true;
	 document.getElementById('KASUJ').type = "hidden";
	 document.getElementById('ZAPISZ').type = "hidden";
	 document.getElementById('historyTable').style.display = "block";
	 document.getElementById('editSuabo').style.display = "block";
	 document.getElementById('editMocno').style.display = "none";
 }
}
