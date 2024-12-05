<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
    <div x-data='{id:null, messages:{{ $messages }}}' class="flex bg-white border-t">
        {{-- <h1>{{ $messages[0] }}</h1> --}}
        <div id="messagesColumn" class=" w-full sm:w-[35%] h-[90vh] overflow-y-auto border-r">
            @if ($messages->count() < 1)
                <h1 class="text-center py-4">There is no messages</h1>
            @endif
            {{-- <p>{{ $messages->count() }}</p> --}}
            @foreach ($messages as $key => $message)
                <div onclick="toggleHidden()" x-on:click='id = {{ $key }}'
                    class="p-4 {{ $message->mark_as_read ? '' : 'bg-blue-100 hover:bg-blue-50' }}  text--700 w-full hover:bg-gray-100 cursor-pointer">
                    <div class="flex justify-between text-lg font-medium">
                        <h1>{{ Str::limit($message->fullname, 15, '...') }}</h1>
                        <p>{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}</p>
                    </div>
                    <h5 class="font-medium text-gray-600">{{ $message->email }}</h5>
                    <p>{{ Str::limit($message->message, 20, '...') }}</p>
                </div>
            @endforeach
        </div>
        <template x-if="id !== null">
            <div class="p-6 hidden w-[65%] sm:flex flex-col gap-3">
                <div class="flex gap-3 justify-end items-center font-medium pb-3 w-full">
                    <form :action="'{{ route('message.markread', '') }}' + '/' + messages[id].id" method="POST">
                        @csrf
                        @method('PUT')
                        <template x-if='messages[id].mark_as_read == false'>
                            <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                Mark as read
                            </button>
                        </template>
                        <template x-if='messages[id].mark_as_read == true'>
                            <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                Mark as unread
                            </button>
                        </template>
                    </form>
                    <form :action="'{{ route('message.delete', '') }}' + '/' + messages[id].id" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-2 border-2 border-red-500 rounded">
                            Delete
                        </button>
                    </form>
                </div>
                <h1 x-text='messages[id].fullname' class="text-xl font-bold"></h1>
                <p x-text="new Date(messages[id].created_at).toLocaleDateString('en-GB')"></p>
                <p x-text='messages[id].email' class="font-medium text-lg"></p>
                <p x-text='messages[id].message'></p>
            </div>
        </template>
        <template x-if='id === null'>
            <div class="hidden sm:flex w-[65%] justify-center items-center">
                <p>Select a message to view its contents</p>
            </div>
        </template>
        <template x-if="id !== null">
            <div id="parentMessage" class="p-6 w-full h-screen overflow-y-scroll fixed top-0 bg-white sm:hidden flex flex-col gap-3">
                <div class="">
                    <svg onclick="toggleHidden()" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </div>
                <div class="flex gap-3 justify-between items-center font-medium pb-3 w-full">
                        <form :action="'{{ route('message.markread', '') }}' + '/' + messages[id].id" method="POST">
                            @csrf
                            @method('PUT')
                            <template x-if='messages[id].mark_as_read == false'>
                                <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                    Mark as read
                                </button>
                            </template>
                            <template x-if='messages[id].mark_as_read == true'>
                                <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                    Mark as unread
                                </button>
                            </template>
                        </form>
                        <form :action="'{{ route('message.delete', '') }}' + '/' + messages[id].id" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-2 border-2 border-red-500 rounded">
                                Delete
                            </button>
                        </form>
                </div>
                <h1 x-text='messages[id].fullname' class="text-xl font-bold"></h1>
                <p x-text="new Date(messages[id].created_at).toLocaleDateString('en-GB')"></p>
                <p x-text='messages[id].email' class="font-medium text-lg"></p>
                <p x-text='messages[id].message'></p>
            </div>
        </template>
    </div>
    <script>
        function toggleHidden(){
            
            if (parentMessage.classList.contains("hidden")) {
                parentMessage.classList.remove("hidden")   
            }else{
                parentMessage.classList.add("hidden")   
            }

        }
    </script>
</x-app-layout>
