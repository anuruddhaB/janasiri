<?php
require 'base/header.php';
?>
<div class="card col-12">
    <h4 class="card-header">Bank Information</h4>
    <div class="card-body">
        <form>
            <div class="row">            
                <div class="form-group col-4">
                    <label>Bank Name</label>
                    <input id="bank-name" type="text"  class="form-control ">
                </div>
                <div class="form-group col-4">
                    <label>Account No</label>
                    <input id="bank-acc" type="text" class="form-control ">
                </div>
            </div>
            <div class="line-w">
                <div class="form-group float-right" id="buttons">
                    <a  class="btn btn-danger text-light" id="btn-bank-clear">Clear</a>
                    <a  class="btn btn-primary text-light" id="btn-bank-save">Save Here</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card col-12">
    <h4 class="card-header">Create New Job Position </h4>
    <div class="card-body">
        <form>
            <div class="row">            
                <div class="form-group col-4">
                    <label>Job Role</label>
                    <input id="job-name" type="text"  class="form-control ">
                </div>
                <div class="form-group col-4">
                    <label>Bank Name</label>
                    <input id="job-salary" type="text"  class="form-control ">
                </div>
            </div>
            <div class="line-w">
                <div class="form-group float-right" id="buttons">
                    <a  class="btn btn-danger text-light" id="btn-job-clear">Clear</a>
                    <a  class="btn btn-primary text-light" id="btn-job-save">Save Here</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require 'base/footer.php';
?> 
<script>
    //Bank
    $(document).ready(function() {
        $(document).on("click", "#btn-bank-save", function() {
            var bankName = $('#bank-name').val();
            var bankAcc = $('#bank-acc').val();
            $.ajax({
                url: "class/class_basic_configs.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    bankName:bankName,
                    bankAcc:bankAcc,
                    path: 'bankRegistration'
                },
                success: function(data) {
                   location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    //Job Role
    $(document).ready(function() {
        $(document).on("click", "#btn-job-save", function() {
            var jobName = $('#job-name').val();
            var jobSal = $('#job-salary').val();
            $.ajax({
                url: "class/class_basic_configs.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    jobName:jobName,
                    jobSal:jobSal,
                    path: 'jobRoleRegistration'
                },
                success: function(data) {
                   location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>