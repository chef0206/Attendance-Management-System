<?php

include('header.php');

?>

<div class="container" style="margin-top:30px">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">Grade List</div>
                <div class="col-md-3" align ="right">
                    <button type="button" id = "add_button" class = "btn btn-info btn-sm">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <span id="message_operation"></span>
                <table class="table table-stripped table-bordered" id="grade_table">
                    <thead>
                        <tr>
                            <th>Grade Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<!-- modal will pop open when click on add button -->
<div class="modal" id="formModal">
    <div class="modal-dialog">
        <form action="" method="post" id="grade_form">
            <div class="modal-content">

            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <!-- Modal Body -->
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="" class="col-md-4 text-right">Grade Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="grade_name" id="grade_name" class="form-control" />
                                <span id="error_grade_name" class="text_danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal Footer -->
                <div class="modal-footer">
                    <input type="hidden" name="grade_id" id="grade_id" />
                    <input type="hidden" name="action" id="action" value="Add" >
                    <input type="submit" value="Add" id="button_action" class="btn btn-success btn-sm" name="button_action">
                    <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        var dataTable = $('#grade_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "grade_action.php",
                type: "POST",
                data: {action: 'fetch'}
            },
            "columnDefs": [
                {
                    "targets": [0,1,2],
                    "orderable": false,
                },
            ],
        });

        $('#add_button').click(function(){
    
            $('#modal_title').text('Add Grade');
            $('#button_action').val('Add');
            $('#action').val('Add');
            $('#formModal').modal('show');
            clear_field();
        });
    
        function clear_field(){
            $('#grade_form')[0].reset();
            $('#error_grade_name').text('');
        }
    
        $('#grade_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: "grade_action.php",
                method: "POST",
                // Making the form data in url ecoded format
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: fucntion() { // Call back function before submitting the request
                    // Disabling submit option
                    $('#button_action').attr('disabled', 'disabled');
                    // Changing the text of button while sending request to server
                    $('#button_action').val('Validate...');
                },
            
                succes: function(data) { //When the POST method is successfull

                    $('#button_action').attr('disabled', false); //Enable the submit button
                    $('#button_action').val($('#action').val());

                    if(data.success) {
                        $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>'); //Display message on webpage
                        clear_field();
                        dataTable.ajax.reload(); // Refresh jQuery table data
                        $('#formModal').modal('hide');
                    }
                    if(data.error) {
                        if(data.error_grade_name != '') {
                            $('#error_grade_name').text(data.error_grade_name); // Displays validation message
                        }
                        else {
                            $('#error_grade_name').text('');
                        }
                    }
                } 
            });
        });
    });
</script>