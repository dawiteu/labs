@component('mail::message')
# Bienvenu

Bonjour. Ceci est le mail d'inscription. 
Vous devez activer votre compte: 

@component('mail::button', ['url' => ''])
Activer votre compte 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
