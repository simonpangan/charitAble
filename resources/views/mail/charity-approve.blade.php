@component('mail::message')
<h2>Good Day {{ $charity->name }},</h2>
<p>
    We are pleased to inform you that your organization has been verified. 
    You can now create programs and received donations.
</p> 
Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent