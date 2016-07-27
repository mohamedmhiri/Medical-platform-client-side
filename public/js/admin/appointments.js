$(document).ready(function() {
  var url = document.getElementById('url');
  url = url.textContent;
  var cDate = new Date();

  // Calendar initialization
  $('#calendar').fullCalendar({
    editable: false,
    header: {
      left: 'prev,next today',
      center: 'Appointments',
      right: 'month, agendaWeek, agendaDay'
    },
    defaultDate: cDate,
    defaultView: 'agendaWeek',
    // API call returns a json feed
    events: {
      url: url+'/api/get-all-appointments',

      error: function(data) {
                    
        $('#error').html('Could not find any appointments');
      }

    },
    
    // Function to handle a day click event
    dayClick: function(date, jsEvent, view) {
      //$(this).css('background-color', 'red');
    },
    
    // Function to handle an event click event
    eventClick: function(calEvent, jsEvent, view) {
      var detailView = $('#appointment-details');
      $.get(url+"/api/get-appointment-info/"+calEvent.id, 
        function(data) {
          var id = calEvent.id;
          var url1 = document.getElementById('url').textContent+"/api/delete-appointment/" + id ;
          var a = " <p> <a href="+ url1 ;
          var start = moment(calEvent.start).format('YYYY-MM-DD [at] h:mm a');
          var end = moment(calEvent.end).format('YYYY-MM-DD [at] h:mm a');
          var start1 = moment(calEvent.start).format();
          var end1 = moment(calEvent.end).format();
          var p =a + ' id="bouton" onclick="clickHandler(&quot;'+start1+'&quot;,&quot;'+end1+'&quot;);" class="btn btn-danger">Delete Appointment</a></p>' ;
          var details = '<h3>'+calEvent.title+'</h3>' +
            '<p><b>Begins</b>: '+start+'</p>' +
            '<p><b>Ends</b>: '+end+'</p>' +p;




          detailView.empty();
          detailView.append(details);



        });

    },

  });

});



 function clickHandler(start,end){ // declare a function that updates the state
      var title = confirm('Do you want to set this time interval available?');
      var eventData;
      var url = document.getElementById('url');
      url = url.textContent;
      var token = $('meta[name="csrf-token"]').attr('content');
 if (title) {
      eventData = {
          _token: token,
          start,
          end,
        };

      $.ajax({
          type: "POST",
          url:   url +'/api/set-availability',
          data: eventData,
          success: function(data) {
           
            $('#calendar').fullCalendar('refetchEvents');
          },

          dataType: "json",
        });
    }
  }
