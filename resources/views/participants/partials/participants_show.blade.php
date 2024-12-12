<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Participants') }}
            </h2>
            <div class=" bg-red-500 py-2 px-3 text-white font-semibold rounded-sm">
                <form :action="{{ route('participants.destroy', 'participants.id') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete Participant</button>
                </form>
            </div>
        </div>
    </x-slot>
    <div class="py-12 lg:px-8 px-4">
        <div class="flex bg-white w-[100%] min-h-[72vh] rounded-lg ">
            <div class="w-full">
                <p class=" p-6 text-[25px]">{{ $participant->name }}</p>
                <p class=" p-6 text-[18px]">{{ $participant->organisation }}</p>
                <p class=" p-6 text-[18px]">{{ $participant->position }}</p>
                <p class=" p-6 text-[18px]">{{ $participant->phone }}</p>
                <p class=" p-6 text-[18px]">{{ $participant->mail }}</p>
                <p class=" p-6 text-[18px]">{{ $participant->country }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
