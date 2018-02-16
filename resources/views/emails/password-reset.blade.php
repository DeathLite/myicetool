
<p style="text-align: left;font-size:16px;">Bonjour {{ $first_name }},</p>

<p style="text-align: left;font-size:16px;">Vous avez récemment demander un changement de mot de passe, si ce n'est pas le cas, merci d'ignorer cet e-mail.</p>

<p style="text-align: left;font-size:16px;">Sinon cliquez sur le lien suivant pour <a target="_blank" href="{{ route('auth.reset', ['token' => $token]) }}">modifier votre mot de passe</a>.</p>


<p style="text-align: left;font-size:15px;">Cordialement,</p>

<p style="text-align: left;font-size:15px;">My icetool Support</p>
