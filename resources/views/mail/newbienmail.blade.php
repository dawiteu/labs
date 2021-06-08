@component('mail::message')
# Bonjour

Vous êtes maintenant inscrit.e aux informations de la newsletter de labs-studio.com ! 

Bonjour ! 

Il s'agit d'une erreur? vous pouvez rester, mais vous pouvez aussi vous
@component('mail::button', ['url' => 'http://127.0.0.1:8000/newsletter/unsub/' ])
désinscrire
@endcomponent


@endcomponent
