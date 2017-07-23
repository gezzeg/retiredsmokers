 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <img src="{{ url('/')}}/images/logo-retiredsmokers-badge.png" style="width: 100px; height:100px;">

        </td>
    </tr>
</table>

<h1>Hello {{$user->first_name}}</h1>

<p>
	We have received a request to activate RetiredSmokers account associated with your email address.
</p>

<p>

Please click the following link to activate your account

{{-- <a href="{{ env('APP_URL')}}/retiredsmokers/public/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a> --}}

<a href="{{ env('APP_URL')}}/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a>

</p>