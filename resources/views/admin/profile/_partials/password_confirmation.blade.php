<div class="modal fade in" id="password-confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Password</h4>
            </div>
            <form id="confirm-password" class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <label for="confirm_password" class="control-label">Password</label>
                    <input name="confirm_password" id="confirm_password" type="password" class="form-control">
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