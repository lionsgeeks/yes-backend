<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>
    <div class="py-12 lg:px-8 px-4">
        <div class="flex bg-white overflow-hidden w-[100%] min-h-[72vh] rounded-lg ">
            <div x-data="{ participants: {{ json_encode($participants) }} }" class="w-full p-6">
                <table class="w-full ">
                    <thead class=" ">
                        <th>Logo</th>
                        <th class="">Name</th>
                        <th class="max-[430px]:hidden">Organisation</th>
                        <th class="max-[430px]:hidden">Country</th>
                        <th class="max-[430px]:hidden">Apply Date</th>
                        <th class="">More details</th>
                        <th class="">Invite to App</th>
                    </thead>
                    <tbody class="">
                        <template x-for="participant in participants" :key="participant.id">
                            <tr class="text-black text-center h-[3rem]">
                                <td class="flex items-center justify-center">
                                    <img x-show="participant.logo" :src="`{{ asset('storage') }}/${participant.logo}`"
                                        class="rounded-lg w-[3vw] aspect-square  object-cover" alt="">
                                </td>
                                <td class="w-[20%] text-nowrap max-[430px]:hidden"
                                    x-text="participant.name.length > 20 ? participant.name.slice(0, 20) + '...' : participant.name">
                                </td>

                                <td class="w-[20%] text-nowrap max-[430px]:hidden"
                                    x-text="participant.organisation.length > 20 ? participant.organisation.slice(0, 20) + '...' : participant.organisation">
                                </td>

                                <td class="lg:w-[20%] w-[calc(90%/2)] text-nowrap max-[430px]:hidden "
                                    x-text="participant.country"></td>
                                <td
                                    x-text="new Date(participant.created_at).toLocaleString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit' }).replace(',', '')">
                                </td>
                                <td class="lg:w-[20%] w-[30%] text-nowrap ">
                                    <form :action="'{{ route('participants.show', '') }}/' + participant.id"
                                        method="POST">
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
                                <td class='lg:w-[20%]'>
                                    <template x-if="participant.invitedToApp">
                                        <button
                                            class="bg-green-500 px-4 py-2 rounded-lg text-green-700 ">Invited</button>
                                    </template>
                                    <template x-if="!participant.invitedToApp">
                                        <form :action="'{{ route('participants.invite', '') }}/' + participant.id"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button x-on:click="inviteToApp(participant.id)"
                                                class="bg-alpha px-4 py-2 rounded-lg text-white ">Invite</button>
                                        </form>
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
