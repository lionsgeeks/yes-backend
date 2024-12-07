<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submitted Form Requests') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        forms: {{ json_encode($forms) }},
        searchQuery: '',
        {{-- search function: return true if any of the conditions are met --}}
        matchesSearch(form) {
            const query = this.searchQuery.toLowerCase();
            return form.name_organization.toLowerCase().includes(query) ||
                form.name_representative.toLowerCase().includes(query) ||
                form.email_representative.toLowerCase().includes(query) ||
                form.country_registration.toLowerCase().includes(query);
        },

    }">
        <div class="max-w-7xl mx-auto hidden flex-col gap-5 sm:px-6 lg:px-8 md:flex">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-1/3 flex items-center bg-gray-100 rounded-lg pl-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        {{-- change the variable to whatever is in the input --}}
                        <input x-model="searchQuery" placeholder="Organization, Name, Email or Country" type="search" name="search"
                            id="search"
                            class="border-none bg-transparent w-full outline-none focus:border-none focus:ring-0 focus:outline-none text-sm">

                    </div>

                    <form action="{{ route('form.export') }}" method="post">
                        @csrf
                        <button class="bg-black text-white px-4 py-1 rounded">
                            Export Excel
                        </button>
                    </form>
                </div>
                <table class="w-full text-center capitalize">
                    <thead>
                        <th>Organization</th>
                        <th>Representative</th>
                        <th>Country</th>
                        <th>More Details</th>
                        <th>Delete Form</th>
                    </thead>
                    <tbody>

                        <template x-for="form in forms" :key="form.id">
                            <tr class="h-[7vh]" x-show="matchesSearch(form)">
                                <td>
                                    <span x-text="form.name_organization"></span>
                                </td>
                                <td>
                                    <span x-text="form.name_representative"></span>
                                </td>
                                <td>
                                    <span x-text="form.country_registration.replace('_', ' ')"></span>
                                </td>
                                <td>
                                    <form :action="'{{ route('forms.show', '') }}/' + form.id" method="POST">
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
                                <td>
                                    <form :action="'{{ route('forms.destroy', '') }}/' + form.id" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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

            {{-- Mobile View --}}
            <div class="md:hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-4 flex justify-end">
                    <form action="{{route('form.export')}}" method="post">
                        @csrf
                        <button class="bg-black text-white px-4 py-2 rounded text-sm">
                            Export Excel
                        </button>
                    </form>
                </div>
                <div class="space-y-4">
                    @foreach ($forms as $form)
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <div class="space-y-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $form->name_organization }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            {{ $form->name_representative }}
                                        </p>
                                        <p class="text-sm text-gray-500 capitalize">
                                            {{ str_replace('_',' ', $form->country_registration) }}
                                        </p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <form action="{{ route('forms.show', $form) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button class="text-green-500 p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('forms.destroy', $form) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
</x-app-layout>
