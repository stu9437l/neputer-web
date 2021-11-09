<h1>Please click the link below to activate your account.</h1>
<br>
<a href="{{ route('shop.customer-account-verification',
['verification-token' => $user->verification_token]) }}">Click Here</a>