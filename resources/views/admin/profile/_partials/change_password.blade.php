<div class="modal fade in" id="change-password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <form id="passwordChange" class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <label for="password" class="control-label">New Password</label>
                    <input name="password" id="password" type="password" class="form-control">
                    <span class="error"></span>
                </div>
                <div class="modal-body">
                    <label for="password_confirmation" class="control-label">Confirm Password</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
                    <span class="error"></span>
                </div>
                <div class="modal-body">
                    <label for="old_password" class="control-label">Old Password</label>
                    <input name="old_password" id="old_password" type="password" class="form-control">
                    <span class="error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>