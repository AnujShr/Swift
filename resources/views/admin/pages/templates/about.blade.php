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
    {!!Form::label('history', 'History', ['class' => "control-label"])!!}
    {!!Form::textarea('history', $content['history']??'',
       ['class' => 'form-control summernote', 'required' => 'required'])!!}
</div>

<div class="form-group ">
    {!!Form::label('mission', 'Mission & Vision', ['class' => "control-label"])!!}
    {!!Form::textarea('mission', $content['mission']??'',
      ['class' => 'form-control summernote', 'required' => 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('meet', "Meet Our Staffl", ['class' => "control-label"])!!}
    {!!Form::input('email','meet', $content['meet']??'',
        ['class' => 'form-control', 'required' => 'required'])!!}
</div>