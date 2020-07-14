@component('mail::message')

    Thank you for your message

    {{ $data['name'] }}
    {{ $data['email'] }}
    {{ $data['message'] }}

@endcomponent
