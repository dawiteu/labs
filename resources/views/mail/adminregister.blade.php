@component('mail::message')
# Bonjour 

Vous venez de créer votre compte. 

Vous pouvez vous connecter en utilisant ces données: 


Votre token unique pour vous connecter: {{ $login_token }}


@endcomponent
