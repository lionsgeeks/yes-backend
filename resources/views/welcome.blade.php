<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yes BackOffice</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="h-screen flex  items-center justify-center gap-x-10 bg-gradient-to-br sbg-[#2e539d]">
    <div class="fixed flex items-center justify-between px-10 py-3 top-0 w-full">
        <a class="invert" href="">
            <x-application-logo color size="100" />
        </a>
        <div class="">
            <a class="px-6 py-3 rounded-lg font-bold text-white bg-beta w-fit" target="_blank" href="https://youthempowermentsummit.africa/">Back to YES</a>
            @guest       
            <a class="px-6 py-3 rounded-lg font-bold text-white bg-alpha w-fit" href="/login">Login</a>
            @endguest
        </div>
    </div>

    <div class=" w-1/2 h-full flex flex-col gap-y-6 px-10 justify-center">
        <h1 class="text-5xl font-extrabold uppercase"><span class="text-[#b09417]">YES</span> Office</h1>
        <h1 class="text-xl">The powerful backend solution for seamless content management across your websites.</h1>
        <a class="px-8 py-3 rounded-lg font-bold text-white bg-alpha w-fit" href="/dashboard">Login to Dashboard</a>
    </div>
    <img class="w-1/2 " src="{{ asset('assets/mockups.png') }}" alt="">


    <div class="fixed flex items-center justify-center px-10 py-3 bottom-0 w-full">

        <p class="font-bold">Yes-Africa , &copy; All right reserved</p>
    </div>
</body>

</html>
