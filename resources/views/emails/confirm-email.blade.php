@component('mail::message')
    # One Last Step

    We just need you to confirm your email address to prove thay you're a human.
@component('mail::button', ['url' => url('/register/confirm?token='.$user->confirmation_token)])
        Confirm
@endcomponent
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent