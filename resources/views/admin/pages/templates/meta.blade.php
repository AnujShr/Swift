<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Meta</h5>
    </div>
    <div class="panel-body">
        <div class="form-group ">
            {!!Form::label('meta_title', 'Title', ['class' => "control-label"])!!}
            {!!Form::input('meta_title', 'meta_title', $meta['title']?:'',
                ['class' => "form-control ",  'required' => 'required'])!!}
        </div>

        <div class="form-group ">
            {!!Form::label('meta_description', 'Description', ['class' => "control-label"])!!}
            {!!Form::textarea('meta_description', $meta['description']?:'',
                     ['class' => 'form-control summernote', 'required' => 'required'])!!}

        </div>

        <div class="form-group ">
            {!!Form::label('meta_keywords', 'Keywords', ['class' => "control-label"])!!}
            {!!Form::input('meta_keywords', 'meta_keywords', $meta['keywords']?:'',
                ['class' => "form-control ",  'required' => 'required'])!!}
        </div>
    </div>
</div>