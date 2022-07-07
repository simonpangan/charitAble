@component('mail::message')
<h2>Good Day Benefactor,</h2>
<p>
    The {{ $program->charity->name }} had withdraw a total amount of 
    {{ $program->withdraw_request_amount }} 
    to their program {{ $program->name }}
</p> 

Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent