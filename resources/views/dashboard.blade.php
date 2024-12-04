<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




    <div class="py-8 h-[92.5vh]  overflow-y-hidden">
        <div class="max-w-7xl mx-auto flex flex-col gap-x-5 gap-y-10 sm:px-6 lg:px-8">
            <div class="">
                <h1 class="capitalize text-[46px] font-bold">Good Day, {{ Auth::user()->name }}</h1>
                <p>We are collecting new emails, and recent articles for you</p>

            </div>

            <div class="w-full flex gap-x-10">
                <div class="flex flex-col gap-y-10">
                    <div class="w-full flex flex-col gap-y-3">
                        <div class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#b09417" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                            <div class="flex justify-between items-center w-full">
                                <h1 class="text-xl font-bold">Recent Messages</h1>


                                <a href="{{ route('message.index') }}" class="text-[#b09417] text-[18px] cursor-pointer underline">
                                    view all</a>

                            </div>
                        </div>
                        <div class="w-[55vw] bg-white shadow-md rounded-xl p-2 flex flex-col gap-y-2">
                            @foreach ($latestmessages as $key => $message)
                                <div x-on:click='id = {{ $key }}'
                                    class="flex items-center gap-x-4 p-2 border-b-[1.6px]">
                                    <p class="truncate border-r-[1.2px] pe-2 w-[80%]">{{ $message->message }}</p>
                                    <span
                                        class="w-[20%] text-[#6c757d]">{{ $message->created_at->format('F j, Y') }}</span>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="w-full h-[40vh] flex flex-col gap-y-4">
                        <div class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#b09417" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            <h1 class="text-xl font-bold">New Articles</h1>
                        </div>
                        <div class="flex flex-wrap gap-x-10 gap-y-4">
                            @foreach ($latestarticles as $article)
                                <div
                                    class="w-[26vw] h-[25vh] bg-white shadow-xl rounded-xl flex flex-col gap-y-2 border-2">
                                    <img src="{{ asset('storage/images/' . $article->image) }}" alt=""
                                        class="h-[60%] w-full object-cover rounded-ss-xl rounded-se-md">
                                    <h1
                                        class="text-md px-2  font-bold  h-[6vh] overflow-hidden whitespace-normal break-words">
                                        {{ $article->title->en }}</h1>

                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="w-[43%] h-[60vh] flex flex-col gap-y-10">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b09417"
                                class="bi bi-graph-up size-6" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07" />
                            </svg>
                            <h1 class="text-xl font-bold">Statistics</h1>
                        </div>
                        <div class="flex gap-x-2">

                            <div class="w-[50%] h-[10vh] bg-white rounded-md shadow-xl p-2 border-2">
                                <div class="flex justify-between ">
                                    <h1 class=' font-bold'>Total Articles</h1>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="#b09417" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold">{{ $articles->count() }}</h1>
                            </div>
                            <div class="w-[50%] h-[10vh] bg-white rounded-md shadow-xl p-2 border-2">
                                <div class="flex justify-between">
                                    <h1 class=' font-bold '>Total Messages</h1>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="#b09417" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold">{{ $messages->count() }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md p-4 flex flex-col gap-6 border-2">
                        <div class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b09417"
                                class="bi bi-lightning size-6" viewBox="0 0 16 16">
                                <path
                                    d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z" />
                            </svg>
                            <h1 class="text-xl font-bold">Quick Actions</h1>
                        </div>
                        <div class="flex gap-3">
                            <a href="/articles/create">
                                <button
                                    class="bg-[#2e539d] rounded-md hover:bg-transparent hover:text-[#2e539d] hover:rounded-none hover:border-[#2e539d] px-3 py-2 border flex items-center gap-x-2 text-white font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg><span>New Article</span>
                                </button>
                            </a>
                            <a href="/users">
                                <button
                                    class="text-[#152b5d] hover:text-black  hover:rounded-sm px-3 py-2 bg-white border flex gap-x-2 items-center font-medium border-[#e5cc8e] hover:border-gray-400 rounded-md hover-border-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    <span>Add Admin</span>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            {{-- <div class="flex gap-3">
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
                                <p>{{ $article->title->en }}</p>
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
                        <button class="bg-black rounded-sm px-3 py-2 border text-white font-medium">
                            Create New Article
                        </button>
                    </a>
                    <a href="/users">
                        <button class="text-black rounded-sm px-3 py-2 bg-white border font-medium">
                            Add Admin
                        </button>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
