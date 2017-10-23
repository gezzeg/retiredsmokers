 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <img src="{{ url('/')}}/images/logo-retiredsmokers-badge.png" style="width: 100px; height:100px;">

        </td>
    </tr>
</table>

<h1>Hello Admin</h1>

<p>
	A new account have been registered and activated.
</p>

<p>

Below is the account details:



{{-- <a href="{{ env('APP_URL')}}/retiredsmokers/public/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a> --}}

	{{-- <a href="{{ env('APP_URL')}}/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a> --}}

</p>

<ul>
	<li>Email: {{$user->email}}</li>
	<li>First Name: {{$user->first_name}}</li>
	<li>Last Name: {{$user->last_name}}</li>

</ul>