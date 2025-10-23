<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    @if(!request()->routeIs('login'))
        <body class="bg-[#101828] h-full w-full">
    @else
        <body class="bg-[#101828] min-h-screen flex items-center justify-center p-4">
    @endif


    @if(!request()->routeIs('login'))
        @include('components.navbar')
    @endif

     @if(!request()->routeIs('login'))
    <main class="bg-[#101828] p-7 w-full h-full">
        @yield('content')
    </main>
    @else
        <main class="bg-[#101828] w-full h-full">
        @yield('content')
    </main>
    @endif

    @if(!request()->routeIs('login'))
        @include('components.footer')
    @endif
</body>
</html>