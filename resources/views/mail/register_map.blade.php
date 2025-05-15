<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="max-w-md mx-auto my-8 bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-8">
            <div class="text-center mb-6">
                <svg class="mx-auto h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h1 class="mt-4 text-2xl font-bold text-gray-900">Your Verification Code</h1>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg text-center mb-6">
                <p class="text-sm font-medium text-gray-500 mb-2">Here's your one-time password:</p>
                <div class="text-4xl font-extrabold text-blue-600 tracking-wider">{{ $code }}</div>
            </div>

            <div class="text-center text-sm">
                <p class="text-center text-sm text-gray-500">This code will expire in 10 minutes.</p>
                <p class="mt-1 text-red-500">If you didn't request this, please ignore this email.</p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 text-center text-xs text-gray-400">
                <p class="border-t border-gray-200 text-center text-xs text-gray-400">© {{ date('Y') }} Your Company Name. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
