@component('mail::message')


Conakry le : {{date('Y-m-d')}}


Mr {{$nom}} Suite à votre demande de modification de mot de passe, nous vous
prions de <a href="{{ route('passwordconfirmation.get',$token) }}">clicquer ici</a> pour modifier votre mot de passe

Nous vous remercions de la confiance que vous nous accordez.

Cordialement.
@endcomponent
