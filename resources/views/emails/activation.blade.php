 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
             <img class="" src="{{ url('/')}}/images/retiredsmokerslogo.png" style="width: 150px; height:150px;">

             <h1>Hello {{$user->first_name}},</h1>

<p>
	We have received a request to activate RetiredSmokers account associated with your email address.
</p>

<p>

Please click the following link to activate your account

{{-- <a href="{{ env('APP_URL')}}/retiredsmokers/public/activation/{{$user->email}}/{{$activationCode}}" title="">Activate Account</a> --}}

	

</p>

<p><a href="{{ env('APP_URL')}}/activation/{{$user->email}}/{{$activationCode}}" title="" style="background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: verdana;">Activate Account</a></p>

        </td>
    </tr>
</table>

