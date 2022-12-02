<?php include('./includes/header.php'); ?>

<div>
    <table class="table table-striped table-bordered center" style="width:50%">
        <thead>
            <tr>
                <th>ID #</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>Telephone</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="ud_body_tbl"></tbody>
    </table>

    <!-- Edit Modal -->
    <div class="modal fade" id="get_Userdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="get_UserdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold" id="get_UserdataLabel">Edit User Data</h5>
                </div>
                <form method="POST" id="updateUserData">
                    <div class="modal-body mb-3" style="padding: 0px 50px 0px 50px;">
                        <div class="formmodal"> 
                            <input type="hidden" name="hiddenuserid">
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
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="telephone">Telephone</label>
                            <input type="text" class="form-control" name="telephone" required="required">
                        </div>
                        <div class="formmodal">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" name="gender" required="required">
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

</div>

<?php include('./includes/footer.php'); ?>