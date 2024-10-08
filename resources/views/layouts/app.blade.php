<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

   
    
    @stack('head')
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900 ">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation Bar -->
        <header class="bg-white shadow ">
            <div class="container mx-auto py-6 px-4 ">
                <h1 class="text-3xl font-bold  ">
                    {{ config('app.name', 'Laravel') }}
                    
                </h1>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow container mx-auto py-6 px-10">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow py-4 text-center">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
            </div>
        </footer>
    </div> 

    
    

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
