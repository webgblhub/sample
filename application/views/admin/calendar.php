
<?php /*?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script><?php */?>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>

<link href="<?php echo base_url('assets/admin/'); ?>bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" />
<!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/Ionicons/css/ionicons.min.css">
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/fullcalendar/dist/moment.min.js"></script>

<script src="<?php echo base_url('assets/admin/'); ?>bower_components/fullcalendar/dist/fullcalendar.js"></script>
<?php /*?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"><?php */?>
<?php /*?><link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css"><?php */?>
<script>
$(document).ready(function(){
		var month = moment().month();
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,agendaWeek,agendaDay'
            },
            defaultView: 'year',
			height: "auto",
            editable: true,
            selectable: true,
            allDaySlot: false,
			yearColumns: 3,
			firstDay:7,
			firstMonth: month,
            
            events: "<?php echo base_url() ?>supplier/calendar/load?view=1&switch="+<?php echo base64_decode($this->uri->segment(4)) ?>,
            
            eventClick:  function(event, jsEvent, view) {
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
				$('#modalLocation').html("Location : "+event.location);
				$('#modalDescription').html("Summary : "+event.description);
                $('#modalWhen').text("When : "+mywhen);
                $('#eventID').val(event.id);
                //$('#calendarModal').modal();
				
				var eventID = event.id;
			   $.ajax({
				   url: '<?php echo base_url() ?>supplier/calendar/delete',
				   data: 'action=delete&id='+eventID,
				   type: "POST",
				   success: function(json) {
				   
					   if(json == 1)
					   {
					   
							$("#msg").html('<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Event removed successfully</div>');
							$("#calendar").fullCalendar('removeEvents',eventID);
							$("#calendar").fullCalendar('refetchEvents');
							}
					   else
							return false;
					   
				   }
			   });
				
            },
          
            //header and other values
            select: function(start, end, jsEvent) {
			if(end-start!=86400000)
			{
			return false;
			}
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
			
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                //$('#createEventModal #startTime').val(start);
                //$('#createEventModal #endTime').val(end);
                //$('#createEventModal #when').text(mywhen);
                //$('#createEventModal').modal('toggle');
				
				var title="Blocked";			
				
				$.ajax({
               url: '<?php echo base_url() ?>supplier/calendar/addEvent?switch='+<?php echo base64_decode($this->uri->segment(4)) ?>,
               data: 'action=add&title='+title+'&start='+start+'&end='+end,
               type: "POST",
               success: function(json) {
			   	   
				   $("#msg").html('<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+json+'</div>');
				   $("#calendar").fullCalendar('refetchEvents');
//                   $("#calendar").fullCalendar('renderEvent',
//                   {
//                       id: json.id,
//                       title: title,
//                       start: startTime,
//                       end: endTime,
//                   },
//                   true);

               }
           });
				
           },
           eventDrop: function(event, delta){
               $.ajax({
                   url: '<?php echo base_url() ?>supplier/calendar/lists?switch='+<?php echo base64_decode($this->uri->segment(4)) ?>,
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
           eventResize: function(event) {
               $.ajax({
                   url: '<?php echo base_url() ?>supplier/calendar/lists?switch='+<?php echo base64_decode($this->uri->segment(4)) ?>,
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                       //alert(json);
                   }
               });
           }
        });
               
       $('#submitButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
		   
           doSubmit();
		   
					$('#createEventModal #title').val('');
					$('#createEventModal #startTime').val('');
					$('#createEventModal #endTime').val('');
					$('#createEventModal #location').val('');
					$('#createEventModal #description').val('');
		   
       });
       
       $('#deleteButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete();
       });
       
       function doDelete(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: '<?php echo base_url() ?>supplier/calendar/delete',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
			   
                   if(json == 1)
				   {
				   
				   		$("#msg").html('<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Event removed successfully</div>');
                        $("#calendar").fullCalendar('removeEvents',eventID);
						$("#calendar").fullCalendar('refetchEvents');
						}
                   else
                        return false;
                    
               }
           });
       }
	   
       function doSubmit(){
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
		   var location = $('#location').val();
		   var description = $('#description').val();
           
           $.ajax({
               url: '<?php echo base_url() ?>supplier/calendar/addEvent?switch='+<?php echo base64_decode($this->uri->segment(4)) ?>,
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime+'&location='+location+'&description='+description,
               type: "POST",
               success: function(json) {
			   	   
				   $("#msg").html('<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+json+'</div>');
				   calendar.fullCalendar('refetchEvents');
//                   $("#calendar").fullCalendar('renderEvent',
//                   {
//                       id: json.id,
//                       title: title,
//                       start: startTime,
//                       end: endTime,
//                   },
//                   true);
               }
           });
           
       }
    });
</script>
<section class="cont-sec-wrap">
          <div class="container page-cont-container">
            <div class="header-sec">
              <h5>Calendar </h5>
            </div>
          </div>
        </section>
        <section>
        <div class="container container-contents-wrap">
<div class="content-wrapper">
    
    <section class="content">
      
  	<div class="row">
          <div class="col-lg-12 col-xs-12" style="overflow:auto; height:500px;">
          <div id="msg"></div>
        <div class=" bg-white">
        
        <div class="inner" >
            <div class="row">
        	<div class="col-lg-12 col-xs-12">
            <div id="calendar"></div>
            </div>
            </div>
        </div>
        </div>
      </div>
      </div>
    </section>
  </div>
  
  <div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="inputPatient">Event:</label>
                <div class="field desc">
                    <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPatient">Location:</label>
                <div class="field desc">
                    <input class="form-control" id="location" name="location" placeholder="Location" type="text" value="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPatient">Summary:</label>
                <div class="field desc">
                	<textarea class="form-control" id="description" name="description" placeholder="Summary"></textarea>
                </div>
            </div>
            
            <input type="hidden" id="startTime"/>
            <input type="hidden" id="endTime"/>
       
            <div class="control-group">
                <label class="control-label" for="when">When:</label>
                <div class="controls controls-row" id="when" style="margin-top:5px;">
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
        
    </div>
    </div>

  </div>
</div>

<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Event Details</h4>
        </div>
        <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <h4 id="modalLocation" class="modal-location"></h4>
        <div id="modalDescription" class="modal-description"></div>
        <div id="modalWhen" style="margin-top:5px;"></div>
        </div>
        <input type="hidden" id="eventID"/>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
        </div>
    </div>
</div>
</div>
</div>
</section>
<link href="<?php echo base_url('assets/admin/'); ?>bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" />
