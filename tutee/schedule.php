<?php
include('../connect.php');


// get all data from tbl_schedule


?>
<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Schedule Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="eventInfo">
                    <h4 id="eventTitle"></h4>
                    <p id="eventDescription"></p>
                    <p id="eventDateTime"></p>
                    <p id="eventMaxTutee"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: false,
            events: 'load.php',
            eventClick: function(event, jsEvent, view) {
                $('#eventTitle').html(event.title);
                $('#eventDescription').html(event.description);
                $('#eventDateTime').html(moment(event.start).format('MMMM Do YYYY, h:mm a') + ' - ' + moment(event.end).format('h:mm a'));
                $('#eventMaxTutee').html('Max Tutee: ' + event.max_tutee);
                $('#eventModal').modal();
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
