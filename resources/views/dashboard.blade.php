<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 md:py-8 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-6 md:mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Good Day, {{ Auth::user()->name }}
                </h1>
                <p class="text-sm md:text-base text-gray-600">We are collecting new emails, and recent articles for you</p>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- Stats & Actions (Shows first on mobile) -->
                <div class="space-y-4 md:space-y-6 order-1 lg:order-2">
                    <!-- Statistics -->
                    <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b09417" class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07" />
                            </svg>
                            <h2 class="text-lg md:text-xl font-bold">Statistics</h2>
                        </div>

                        <div class="grid grid-cols-2 gap-3 md:gap-4">
                            <div class="bg-gray-50 p-3 md:p-4 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-bold text-sm md:text-base">Total Articles</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b09417" class="w-5 h-5 md:w-6 md:h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                </div>
                                <p class="text-lg md:text-xl font-bold">{{ $articles->count() }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 md:px-3 md:py-4 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h2 class="font-bold text-sm md:text-base">Total Messages</h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="#b09417" class="w-5 h-5 md:w-6 md:h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                </div>
                                <p class="text-lg md:text-xl font-bold">{{ $messages->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b09417" class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 16 16">
                                <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z" />
                            </svg>
                            <h2 class="text-lg md:text-xl font-bold">Quick Actions</h2>
                        </div>

                        <div class="space-y-3">
                            <a href="/articles/create" class="block">
                                <button class="w-full bg-[#2e539d] hover:bg-[#2e539d]/90 text-white px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    <span class="text-sm md:text-base">New Article</span>
                                </button>
                            </a>
                            <a href="/users" class="block">
                                <button class="w-full border border-[#e5cc8e] hover:border-gray-400 text-[#152b5d] hover:text-black px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    <span class="text-sm md:text-base">Add Admin</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Messages and Articles Section -->
                <div class="lg:col-span-2 space-y-4 md:space-y-6 order-2 lg:order-1">
                    <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b09417" class="w-5 h-5 md:w-6 md:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                <h2 class="text-lg md:text-xl font-bold">Recent Messages</h2>
                            </div>
                            <a href="{{ route('message.index') }}" class="text-[#b09417] hover:underline text-sm md:text-base">view messages</a>
                        </div>

                        <div class="space-y-2">
                            @foreach ($latestmessages as $key => $message)
                                <div x-on:click='id = {{ $key }}' class="p-3 md:p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 md:gap-4">
                                        <p class="text-gray-700 text-sm md:text-base truncate flex-1">{{ $message->message }}</p>
                                        <span class="text-gray-500 text-xs md:text-sm whitespace-nowrap">{{ $message->created_at->format('F j, Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Articles Grid -->
                    <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b09417" class="w-5 h-5 md:w-6 md:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                                <h2 class="text-lg md:text-xl font-bold">New Articles</h2>
                            </div>
                            <a href="{{ route('articles.index') }}" class="text-[#b09417] hover:underline text-sm md:text-base">view articles</a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                            @foreach ($latestarticles as $article)
                                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                    <img src="{{ asset('storage/images/' . $article->image) }}" 
                                         alt="" 
                                         class="w-full h-36 md:h-48 object-cover">
                                    <div class="p-3 md:p-4">
                                        <h3 class="font-bold text-gray-900 text-sm md:text-base truncate">{{ $article->title->en }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>