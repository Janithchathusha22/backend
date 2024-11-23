<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @livewireStyles
</head>
<body>
    <h1>Welcome to Laravel</h1>

    {{-- Embed the Livewire Posts Component --}}
    @livewire('posts') 

    @livewireScripts
</body>
</html>
