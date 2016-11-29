
var evenement;
var events = new Array();
function drawCallendar(){
	reciveHours();

	$.ajax({
		url: 'process.php',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
        	json_events = s;
        }
	});



		jQuery(document).on("mousemove", function (event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

		/* initialize the external events
		-----------------------------------------------------------------*/
draggable();



		/* initialize the calendar
		-----------------------------------------------------------------*/


		$('#calendar').fullCalendar({
                        height: 700,
                        fixedWeekCount: false,
                        eventLimit: true, // for all non-agenda views
                         views: {
                            agenda: {
                            eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
                            }
                        },
                        locale: 'pl',
			events: JSON.parse(json_events),
			//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
			utc: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			editable: true,
			droppable: true,
			slotDuration: '00:10:00',
			// minTime: '08:00:00',
			// maxTime: '18:00:00',
			scrollTime: '08:00:00',
			navLinks: true,
			hiddenDays: [7],
			businessHours: [ // specify an array instead
    		{
        	dow: [ 1 ],
        	start: pno,
        	end: pnc
    		},
				{
        	dow: [ 2 ],
        	start: wto,
        	end: wtc
    		},
				{
			  	dow: [ 3 ],
			  	start: sro,
			  	end: src
				},
				{
			  	dow: [ 4 ],
			  	start: czo,
			  	end: czc
				},
				{
			  	dow: [ 5 ],
			  	start: pto,
			  	end: ptc
				},
				{
			  	dow: [ 6 ],
					start: sbo,
			  	end: sbc
				},
			],
			eventReceive: function(event){
				var title = event.title;
				var start = event.start.format("YYYY-MM-DD HH:mm");
				var idc = event.idc;
				console.log(event);
				$.ajax({
		    		url: 'process.php',
		    		data: 'type=new&title='+title+'&startdate='+start+'&idc='+idc,
		    		type: 'POST',
		    		dataType: 'json',
						async: false,
		    		success: function(response){
		    			event.id = response.eventid;
							event.end = response.enddate;
						},
		    		error: function(e){
		    			console.log(e.responseText);
		    		}
		    	});
				$('#calendar').fullCalendar('updateEvent',event);
				console.log(event);
				id=event.id;
				pickService(id);
				getFreshEvents();
			},
			eventDrop: function(event, delta, revertFunc) {
		        var title = event.title;
		        var start = event.start.format("YYYY-MM-DD HH:mm");
		        var end = (event.end == null) ? start : event.end.format("YYYY-MM-DD HH:mm");
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')
						revertFunc();
					},
					error: function(e){
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
//		    eventClick: function(event, jsEvent, view) {
//		    	console.log(event.id);
//							$('#modal').modal('show');
//							evenement = event;
//							document.forms.modal.id.value=event.id;
//							document.forms.modal.ev.value=event.title;
//							document.forms.modal.startdate.value=event.start.format("YYYY-MM-DD HH:mm:SS");
//							document.forms.modal.enddate.value=event.end.format("YYYY-MM-DD HH:mm:SS");
//							document.forms.modal.opis.value=event.opis;
//			},
			eventResize: function(event, delta, revertFunc) {
				console.log(event);
				var title = event.title;
				var end = event.end.format("YYYY-MM-DD HH:mm");
				var start = event.start.format("YYYY-MM-DD HH:mm");
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')
						revertFunc();
					},
					error: function(e){
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
				navLinkDayClick: function(date, jsEvent) {

			$('#calendar').fullCalendar('gotoDate',date);
      $('#calendar').fullCalendar('changeView','agendaDay');

			},
			eventDragStop: function (event, jsEvent, ui, view) {
			    if (isElemOverDiv()) {
			    	var con = confirm('Are you sure to delete this event permanently?');
			    	if(con == true) {
						$.ajax({
				    		url: 'process.php',
				    		data: 'type=remove&eventid='+event.id,
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
				}

				},
        eventAfterRender: function(event, element) {
					id = event.id;
					events[id] = event;
					title = event.title;
					start = event.start.format("HH:mm");
					desc = event.opis;
					if(event.end != null){
						end = event.end.format("HH:mm");
					}else{
						end = "??:??";
					}
//                                         console.log(element);
          element.clickover({
            global_close: true,
            placement: 'top',
            html : true,
            container: 'body',
            tip_id: 'close',
            class: 'event',
            onShown: function(){
                $('.popover').css('display','table');
            },
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
            content: '<div id="popover-event-content"><div class="popover-event-content-in"><p class="popover-text-title">'+title+'</p><p class="popover-text-time">'+start+' ••••• '+end+'</p><p class="popover-text-desc">'+desc+'</p><div class="popover-button event left" id="editEvent" onclick="editEventNew('+event.id+')"><p class="popover_p">Edycja</p></div><div class="popover-button event right" onclick="weDel('+event.id+')"><p class="popover_p">Usuń</p></div></div></div>'
					});
				}
      });
}
	$(document).ready(function() {
		drawCallendar();
		waitplz();
		$('#wait').droppable({
                        containment: "body",
			accept: ".dp-client",
			tolerance: "touch",
                        over: function() {$("#wait").addClass( "over" );},
                        out: function() {$("#wait").removeClass( "over" );},
			drop: function(event, ui){
					idc = ui.draggable[0].id;
					$.ajax({
							url: 'ajax/wait.php',
							data: 'id='+idc,
							type: 'POST',
							success: function(response){
								waitplz();
							}
						});
					}
			});

	});

		    function editEvent(ev) {
					$("#popover-event-content").hide();
            event = events[ev];
		    	// console.log(event);
							$('#modal').modal('show');
							evenement = event;
							document.forms.modal.id.value=event.id;
							document.forms.modal.ev.value=event.title;
							document.forms.modal.startdate.value=event.start.format("YYYY-MM-DD HH:mm");
							document.forms.modal.enddate.value=event.end.format("YYYY-MM-DD HH:mm");
							document.forms.modal.opis.value=event.opis;
							pickDate();
			}

			function editEventNew(ev) {
					$(".popover").hide();
					$('#modal').modal('show');
					event = events[ev];
					evenement = event;
					$.ajax({
						url: 'ajax/eventChange.php',
						data: 'id='+ev,
						type: 'POST',
						success: function(data){
							$("#eventChange").html(data);
							pickDate();
						}
					});
			}
