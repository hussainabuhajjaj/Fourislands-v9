<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Subscription</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('newsletter.subscribe') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="{{ old('email') }}" />
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required value="{{ old('first_name') }}" />
        @error('first_name')
            <p>{{ $message }}</p>
        @enderror

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required value="{{ old('last_name') }}" />
        @error('last_name')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Subscribe</button>
    </form>
</body>
</html>
