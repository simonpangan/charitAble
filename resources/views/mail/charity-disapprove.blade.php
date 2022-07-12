@component('mail::message')
<h2>Good Day {{ $charity->name }},</h2>
<p>
    We are sorry to inform you that your organization has been declined for verification. 
</p> 
    
<p><b>Reason: </b>{{ $message }}</p>

<p>
    If you have any questions feel free to ask.
</p> 

Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent