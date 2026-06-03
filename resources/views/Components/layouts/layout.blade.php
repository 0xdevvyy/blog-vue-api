<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Blog') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <main class="flex-1">
            <div class="mx-auto max-w-7xl px-6 py-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>