<h1>Hello {{$user->first_name}}</h1>

<p>

Please click the following link to activate your account

{{-- <a href="{{ env('APP_URL')}}/retiredsmokers/public/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a> --}}

<a href="{{ env('APP_URL')}}/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a>

</p>