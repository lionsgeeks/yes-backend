<div id="sidebar" class="w-[16vw]  h-screen bg-alpha flex flex-col py-5 justify-">
    <div class="flex flex-col w-full">
        <div class="px-[1.5rem]">
            <a href="">
                <x-application-logo color size="100" />
            </a>
        </div>

        <div id="nav-content" class='flex flex-col gap-[0.5rem] py-7 px-[0.5rem] relative'>
            <a href='{{ route('dashboard') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2  hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('dashboard') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
                Dashboard
            </a>
            <a href='{{ route('articles.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('articles.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>
                Articles
            </a>
            <a href='/messages'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('message.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
                Messages
            </a>
            <a href='{{ route('forms.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('forms.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 13.5H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                NGO
            </a>

            <a href='{{ route('participants.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('participants.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 13.5H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                Participants
            </a>
            <a href='{{ route('admins.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('admins.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                Users
            </a>
            <a href='/maps'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-[#f5e7c6] rounded-xl px-[1rem] {{ request()->routeIs('maps.index') ? 'text-alpha bg-[#f5e7c6]' : 'text-gray-100' }}'>
                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0 0v6M9.5 9A2.5 2.5 0 0 1 12 6.5" />
                </svg>
                Maps
            </a>
        </div>
    </div>
</div>
