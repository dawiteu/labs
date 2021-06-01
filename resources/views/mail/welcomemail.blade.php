@component('mail::message')
# Bonjour

Un administrateur vous a créer le compte sur Labs-Studio.com  

Pour pouvoir l'utiliser vous devez attendre l'activation (par un Admin ou webmaster). 
Entre temps, voici votre mot de passe: 

{{ $pass }}

Vous recevrez une notification quand votre compte sera activé. 
Le mail comprendra votre lien unique de connection. 


Vous **devez** changer le mot de passe dans les plus brefs délais.

{{-- @component('mail::button', ['url' => ''])
Définir un mot de passe
@endcomponent --}}


@endcomponent
