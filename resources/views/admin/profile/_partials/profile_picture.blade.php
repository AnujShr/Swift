<div class="modal fade in" id="profile-picture">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Profile Picture</h4>
            </div>
            {!! Form::open(['url'=>route('admin.profile.picture'), 'method' => 'post' ,'class' =>'form-horizontal', 'files' => true]) !!}

            <div class="modal-body">
                <label for="profile_picture" class="control-label">Profile Picture</label>
                <input name="profile_picture" id="profile_picture" type="file" class="form-control">
                <span class="error"></span>
            </div>

            <img src="" id="profile-img-tag" class="profile-preview" width="200px" />
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>