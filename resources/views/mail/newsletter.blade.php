@component('mail::message')
# Bonjour

Un nouveau article a été publier sur le blog de Labs-studio.com 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/blog/'])
Voir le blog
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
