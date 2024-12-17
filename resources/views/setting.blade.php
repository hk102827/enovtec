<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
    <h1>Update Dashboard Settings new changing</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <label for="sidebar_color">Sidebar Color:</label>
        <input type="color" name="sidebar_color" value="{{ old('sidebar_color', $settings['sidebar_color'] ?? '') }}">

        <label for="text_color">Text Color:</label>
        <input type="color" name="text_color" value="{{ old('text_color', $settings['text_color'] ?? '') }}">

        <label for="logo_color">Logo Color for user:</label>
        <input type="color" name="logo_color" value="{{ old('logo_color', $settings['logo_color'] ?? '') }}">

        <button type="submit">Save</button>
    </form>
</body>
</html>
