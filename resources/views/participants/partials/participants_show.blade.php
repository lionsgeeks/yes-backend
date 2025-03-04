<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-end lg:justify-between">
            <h2 class="font-semibold text-xl lg:block hidden text-gray-800 leading-tight">
                {{ $participant->name }}
            </h2>
            <div
                class=" bg-red-500 lg:py-2 py-1 lg:px-3 px-2 lg:text-[16px] text-[12px] text-white font-semibold rounded-md">
                <form :action="{{ route('participants.destroy', 'participants.id') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete Participant</button>
                </form>
            </div>
        </div>
    </x-slot>
    <div class="py-12 lg:px-8 px-4">

        <div class="w-full overflow-x-auto">
            <table class="capitalize w-full md:table block">
                <tr class="bg-alpha text-white md:table-row hidden">
                    <th class="border border-white p-3 w-[35vw]">Field</th>
                    <th class="border border-white p-3">Response</th>
                </tr>
                @php
                    $fields = [
                        'Name ' => 'name',
                        'Email ' => 'mail',
                        'Organization' => 'organisation',
                        'Civility' => 'civility',
                        'Position' => 'position',
                        'Category' => 'category',
                        'Phone' => 'phone',
                        'Country' => 'country',
                        'Logo' => 'logo',
                        'Apply Date' => 'created_at',
                    ];
                @endphp
                @foreach ($fields as $question => $field)
                    <tr
                        class="{{ $loop->iteration % 2 == 0 ? 'bg-alpha/10' : '' }} md:w-full w-[88vw] block md:table-row mb-4 md:mb-0 rounded-lg md:rounded-none border border-alpha/20 md:border-0 overflow-hidden">
                        <td class="border-alpha p-3 md:table-cell block md:border before:content-[attr(data-title)] before:font-bold before:block md:before:hidden before:mb-1 md:before:mb-0"
                            data-title="{{ $question }}">
                            <span class="hidden md:inline font-semibold">{{ $question }}</span>
                        </td>
                        <td class="border-alpha p-3 md:table-cell block md:border font-medium md:font-normal">
                            @if ($field == 'logo')
                                <img src="{{ asset('storage/' . $participant->$field) }}"
                                    class="w-[5vw] aspect-square  object-cover" alt="">
                            @elseif ($field == 'created_at')
                                {{ \Carbon\Carbon::parse($participant->$field)->format('j,M, Y') }}
                            @else
                                {{ $participant->$field }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</x-app-layout>
