@component('mail::message')
<h2>Good Day {{ $details->charity->name }},</h2>
<p>
    You have received an interest from your program 
    "{{ $details->name }}" from 
    {{ $user->benefactor->first_name . ' ' .$user->benefactor->last_name}}.
</p> 

<p><b>Message: </b>{{ $inputs['message'] }}</p>

<p>
    You can email {{ (($user->benefactor->gender) == 'Male') ? 'him' : 'her' }}  
    via email : <b>{{ ($inputs['email'] == null) ? $user->email : $inputs['email']}}</b>
</p> 

Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent