<!-- File: resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <!-- Blade Directive for Condition -->
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}</p>
    @else
        <p>Please log in.</p>
    @endif
    <!-- Blade Directive for Loop -->
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
    <!-- Blade Directive for Including Another View -->
    @include('partials.footer')
    <!-- Blade Directive for Form Handling -->
    <form action="/submit" method="POST">
        @csrf <!-- Blade directive to include CSRF token -->
        @method('PUT') <!-- Blade directive to change method to PUT -->
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
