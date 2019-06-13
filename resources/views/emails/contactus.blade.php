@component('mail::message')
# Service Client

## {{ $subject }}

{{ $message }}

Cordialement,<br>
{{ $name }}
@endcomponent
