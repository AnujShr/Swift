<div class="modal  fade in" id="profile-picture">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Profile Picture</h4>
            </div>
            {!! Form::open(['url'=>route('admin.profile.picture'), 'id'=>'profile_pic_form','method' => 'post' ,'class' =>'form-horizontal', 'files' => true]) !!}
            <div class="modal-body">
                <div class="row upload-section">
                    <div class="col-md-6">
                        <label for="profile_picture" class="control-label">Profile Picture</label>
                        <input name="profile_picture" id="profile_picture" type="file" class="form-control">
                        <span class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <p style="text-align: center">Preview</p>
                        <img src="" id="profile-img-tag" onerror="this.style.display='none'" class="preview-section"
                             width="200px"/>
                    </div>
                </div>

                <div class="gallery-section" id="gallery-section">
                    <p>Previous Pictures</p>

                    @foreach ($user['oldPictures'] as $oldPicture)
                        @php
                            $checked = false;
                            $pictureName = $oldPicture->profile_picture;
                            $currentPicture = $user->profile_picture;
                            if($currentPicture == $pictureName){
                                $checked = true;
                            }
                        @endphp

                        <input type="radio" name="oldPicture" value="{{$pictureName}}" id="pic-{{$pictureName}}"
                               class="input-hidden" @if($checked) checked @endif>
                        <label for="pic-{{$pictureName}}">
                            <img class="{{$pictureName}}"
                                 src="{{URL::asset($oldPicture->getThumbnailPath($basePath,$pictureName,'thumb'))}}"/>

                        </label>
                    @endforeach
                </div>


                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="removeBtn">Delete Selected</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>