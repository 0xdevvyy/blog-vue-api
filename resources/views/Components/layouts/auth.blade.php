<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Blog')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background duration-300 font-sans antialiased overflow-hidden">
    <div class="flex h-screen w-full relative">
        <x-sidebar />
        
        <main class="flex-1 flex flex-col h-full overflow-hidden">
            

            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto overflow-x-hidden p-6">
                
                {{ $slot }}
            </div>

        </main>
    </div>  
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    {{-- <script src="resources/js/app.js" ></script> --}}
</body>
</html>