@component('mail::message')
# Bonjour

Un administrateur vous a créer le compte sur Labs-Studio.com  

Pour pouvoir l'utiliser vous devez attendre l'activation (par un Admin ou webmaster). 
Entre temps, vous pouvez déjà 

{{ $pass }}


@component('mail::button', ['url' => ''])
Définir un mot de passe
@endcomponent


@endcomponent
