@component('mail::message')
# Anuj

Thank You for reaching out to Us.
<br>
We will be contacting you soon for futher response.

The conent of your inquiry is as:
<br>
<div class="panel panel-default">
    <div class="panel-body">{{$message}}</div>
</div>


@component('mail::button', ['url' => 'study.loc/contact'])
Contact
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
