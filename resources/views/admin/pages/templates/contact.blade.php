<div class="form-group ">
    {!!Form::label('title', 'Title', ['class' => "control-label"])!!}
    {!!Form::input('text', 'title', $page->title?:'',
        ['class' => "form-control ",  'required' => 'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('header_content_top', 'Header Content Top', ['class' => "control-label"])!!}
    {!!Form::textarea('header_content_top', $content['header_content_top']??'',
        ['class' => 'form-control summernote', 'required' => 'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('header_content_bottom', 'Header Content Bottom', ['class' => "control-label"])!!}
    {!!Form::textarea('header_content_bottom', $content['header_content_bottom']??'',
        ['class' => 'form-control summernote', 'required' => 'required'])!!}
</div>

<div class="form-group ">
    {!!Form::label('location', 'Location', ['class' => "control-label"])!!}
    {!!Form::input('text', 'location', $content['location']??'',
        ['class' => "form-control ",  'required' => 'required'])!!}
</div>

<div class="form-group ">
    {!!Form::label('contact_no', 'Contact Number', ['class' => "control-label"])!!}
    {!!Form::input('text', 'contact_no', $content['contact_no']??'',
        ['class' => "form-control ",  'required' => 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('email', "Enquiry Email", ['class' => "control-label"])!!}
    {!!Form::input('email','email', $content['email']??'',
        ['class' => 'form-control', 'required' => 'required'])!!}
</div>