@component('mail::message')


Conakry le : {{date('Y-m-d')}}


Mr {{$nom}} Suite à votre inscription effectuée sur notre site nous vous
prions de <a href="{{ route('passwordconfirmation.get',$token) }}">clicquer ici</a> pour continuer l'inscription

Nous vous remercions de la confiance que vous nous accordez.

Cordialement.
@endcomponent
