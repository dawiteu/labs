@component('mail::message')
# Bonjour 

Votre compte viens d'être activé par un administrateur. 

Vous pouvez vous connecter en utilisant vos données.  



@component('mail::button', ['url' => 'http://127.0.0.1:8000/login/' . $mail->login_token])
Connectez-vous
@endcomponent


@endcomponent
