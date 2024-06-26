<!-- resources/views/admin/register.blade.php -->

<form method="POST" action="{{ route('admin.register') }}">
    @csrf

    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required autocomplete="new-password">

    <button type="submit">Register</button>

    @error('name')
        <span>{{ $message }}</span>
    @enderror
</form>
