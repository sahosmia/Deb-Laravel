<div>
    <ul>
        Email : {{ $email }}
        Id : {{ $id }}
    </ul>

    <a href="{{ route('passwordReset', [$email,$id]) }}">Reset Link</a>
</div>
