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

<body class="bg-gradient-to-br from-alpha to-black" >
    <div class="fixed flex items-center justify-between lg:px-10 px-3 py-3 top-0 w-full">
        <a class="" href="">
            <x-application-logo color size="100" />
        </a>
        <div class="flex items-center gap-x-5">
            <a class="px-6 py-2 rounded-lg font-bold text-white bg-beta w-fit" target="_blank" href="https://youthempowermentsummit.africa/">Back to YES</a>
            @guest       
            <a class="px-6 py-2 lg:block hidden rounded-lg font-bold text-white bg-alpha w-fit" href="/login">Login</a>
            @endguest
        </div>
    </div>
    <div class="h-screen pt-[15vh] lg:flex-row-reverse lg:flex lg:items-center text-white lg:justify-center lg:gap-x-10 bg-gradient-to-br sbg-[#2e539d]">
        <img class="lg:w-1/2 w-full h- " src="{{ asset('assets/mockups.png') }}" alt="">


        <div class=" lg:w-1/2 lg:mt-0 mt-6 lg:h-full flex flex-col gap-y-6 lg:px-10 px-5 justify-center">
            <h1 class="lg:text-5xl text-3xl font-extrabold  lg:text-start text-center lg:uppercase"><span class="text-[#b09417]">YES</span> Office</h1>
            <h1 class="lg:text-xl text-lg">The powerful backend solution for seamless content management across your websites.</h1>
            <a class="px-8 py-3 rounded-lg w-full text-center font-bold text-white bg-alpha lg:w-fit border border-gray-200" href="/dashboard">Login to Dashboard</a>
        </div>
        
        <div class="fixed lg:flex hidden items-center justify-center px-10 py-3 bottom-0 w-full">
    
            <p class="font-bold">Yes-Africa , &copy; All right reserved</p>
        </div>
    </div>



</body>

</html>
