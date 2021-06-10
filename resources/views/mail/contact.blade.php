@component('mail::message')
# Nouveau message du formulaire de contact

Voici un nouveau message de: [{{$mail->name}} ](mailto:{{$mail->name}}) {{$mail->name}} 
Sujet : {{$mail->subject}}
Message: 

{{ $mail->message}}

@component('mail::button', ['url' => 'mailto:' . $mail->email])
Répondre
@endcomponent



@endcomponent
