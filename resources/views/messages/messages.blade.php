<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
    <div x-data='{id:null, messages:{{ $messages }}}' class="flex bg-white border-t">
        {{-- <h1>{{ $messages[0] }}</h1> --}}
        <div id="messagesColumn" class="w-[35%] h-[90vh] overflow-y-auto border-r">
            @if ($messages->count() < 1)
                <h1 class="text-center py-4">There is no messages</h1>
            @endif
            {{-- <p>{{ $messages->count() }}</p> --}}
            @foreach ($messages as $key => $message)
                <div x-on:click='id = {{ $key }}'
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
            <div class="p-6 w-[65%] flex flex-col gap-3">
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
            <div class="flex w-[65%] justify-center items-center">
                <p>Select a message to view its contents</p>
            </div>
        </template>
    </div>
</x-app-layout>
