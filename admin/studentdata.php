<?php include('./includes/header.php'); ?>

<div>
    <table id="sd_tbl" class="table table-striped table-bordered center" style="width:50%">
        <thead>
            <tr>
                <th>ID #</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Id Number</th>
                <th>Address</th>
                <th>Section</th>
                <th>Facebook Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="sd_body_tbl"></tbody>
    </table>

    <!-- Edit Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold" id="editManageModalLabel">Edit Student Data</h5>
                </div>
                <form method="POST" id="updateStudentData">
                    <div class="modal-body mb-3" style="padding: 0px 50px 0px 50px;">
                        <div class="formmodal"> 
                            <input type="hidden" name="hiddenstudentid">
                        </div>
                        <div class="mt-3 formmodal">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" required="required">
                        </div>
                        <div class="mt-3 formmodal">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="section">Section</label>
                            <input type="text" class="form-control" name="section" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="fblink">Facebook Link</label>
                            <input type="url" class="form-control" name="fblink" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewStudentData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewStudentDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold">View Student Attendance</h5>
                    <button type="button" class="close text-dark" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body mb-3">
                    <table class="table table-striped table-bordered center w-100">
                        <thead>
                            <tr>
                                <th>Datenow</th>
                                <th>Status</th>
                                <th>Time IN</th>
                                <th>Time OUT</th>
                            </tr>
                        </thead>
                        <tbody id="vsd_body_tbl"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('./includes/footer.php'); ?>