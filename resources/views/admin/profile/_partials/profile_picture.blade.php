<div class="modal fade in" id="profile-picture">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
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
                    <div class="col-md-6 ">
                        <p style="text-align: center">Preview</p>
                        <img src="" id="profile-img-tag" onerror="this.style.display='none'" class="preview-section"
                             width="200px"/>
                    </div>
                </div>
                <div class="row">
                    <div class="gallery-section">
                        <p>Previous Pictures</p>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($user['oldPictures'] as $oldPicture)
                            @php
                                $i++;
                                $pictureName = $oldPicture->profile_picture;
                            @endphp
                            <input type="radio" name="oldPicture" value="{{$pictureName}}" id="pic-{{$i}}"
                                   class="input-hidden"/>
                            <label for="pic-{{$i}}">
                                <img src="{{URL::asset($oldPicture->getThumbnailPath($basePath,$pictureName,'thumb'))}}"/>
                            </label>
                        @endforeach
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>