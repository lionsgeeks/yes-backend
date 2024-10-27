<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto flex flex-col gap-5 sm:px-6 lg:px-8">
            <div class="flex gap-3">
                <div class="bg-white flex flex-col gap-10 p-4 w-[50%] rounded">
                    <div class="flex justify-between">
                        <h1 class='text-xl font-bold'>Total Articles</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold">{{ $articles->count() }}</h1>
                </div>
                <div class="bg-white flex flex-col gap-10 p-4 w-[50%] rounded">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-bold">Total Messages</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold">{{ $messages->count() }}</h1>
                </div>
            </div>
            <div class="flex gap-3 ">
                <div class="bg-white p-4 w-[50%] rounded flex flex-col gap-3">
                    <h1 class='text-xl font-bold'>Recent Articles</h1>
                    <div class="flex flex-col gap-3">
                        @foreach ($latestarticles as $article)
                            <div class="flex items-center gap-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                                <p>{{ $article->title }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="bg-white p-4 w-[50%] rounded flex flex-col gap-3">
                    <h1 class='text-xl font-bold'>Recent Messages</h1>
                    <div class="flex flex-col gap-3">
                        @foreach ($latestmessages as $message)
                            <div class="flex items-center gap-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                <p>{{ $message->message }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-white rounded p-4 flex flex-col gap-6">
                <h1 class="text-xl font-bold">Quick Actions</h1>
                <div class="flex gap-3">
                    <a href="/articles/create">
                        <button class="bg-black rounded-sm px-3 py-2 border text-white font-medium">Create New
                            Article</button>
                    </a>
                    
                    <a href="{{route('articles.index')}}"><button class="bg-black rounded-sm px-3 py-2 border text-white font-medium">Create New Article</button></a>
                    <button class="text-black rounded-sm px-3 py-2 bg-white border font-medium">Send Notinfications</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
