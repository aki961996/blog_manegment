@component('mail::message')

# Welcome to , {{ $user->name }}!

@component('mail::button', ['url' => url('verify/' . $user->remember_token)])
Verify your email
@endcomponent
<p>In case you have issues please contact our contact us.</p>

Happy reading and writing!
@component('mail::button', ['url' => url('/')])
Visit Our Blog
@endcomponent
Best regards,<br>
{{ config('app.name') }} Team


@endcomponent