@component('mail::message')
# Bonjour

Un administrateur vous a créer le compte sur Labs-Studio.com  

Pour pouvoir l'utiliser vous devez attendre l'activation (par un Admin ou webmaster). 
Entre temps, voici votre mot de passe: 

{{ $pass }}

Vous **devez** le changer dans les plus brefs délais.

{{-- @component('mail::button', ['url' => ''])
Définir un mot de passe
@endcomponent --}}


@endcomponent
