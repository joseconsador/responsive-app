@component('mail::message')

<ul>
    <li>Email: {{ $email }}</li>
    <li>First name: {{ $first_name }}</li>
    <li>Last name: {{ $last_name }}</li>
    <li>Phone: {{ $phone }}</li>
    <li>Subject: {{ $subject }}</li>
    <li>Message: {{ $message }}</li>
</ul>

@endcomponent