<x-mail::message>
    Hi, {{$user->username}}

    We received a request to access your account
    Your reset password code is: {{$token}}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>