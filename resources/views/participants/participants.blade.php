<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>
    <div class="py-12 lg:px-8 px-4">
        <div  class="flex bg-white w-[100%] min-h-[72vh] rounded-lg ">
            <div x-data="{participants: {{ json_encode($participants) }}}" class="w-full p-6">
                <table class="w-full ">
                    <thead class=" ">
                        <th>Name</th>
                        <th>Organisation</th>
                        <th>Country</th>
                        <th>More details</th>
                    </thead>
                    <tbody class="">
                        <template x-for="participant in participants" :key="participant.id">
                            <tr class="text-black text-center h-[3rem]">
                                <td class="w-[20%] text-nowrap " x-text="participant.civility +'. '+ participant.name" ></td>
                                <td class="w-[20%] text-nowrap " x-text="participant.organisation" ></td>
                                <td class="w-[20%] text-nowrap " x-text="participant.country" ></td>
                                <td class="w-[20%] text-nowrap ">
                                    <form :action="'{{ route("participants.show","") }}/' + participant.id" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button class="text-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>