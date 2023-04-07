<?php

include('header.php');

?>

<div class="container" style="margin-top:30px">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">Grade List</div>
                <div class="col-md-3" align ="right">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
            }
        });
    });

</script>