<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maps') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($maps as $map)
                <div class="flex justify-between bg-white shadow-lg rounded-xl p-4 w-full py-6 m-5">
                    <div class="flex-1">
                        <img src="{{ asset($map->logo) }}" alt="{{ $map->name }}"
                            class="w-24 h-24 object-cover rounded-lg mb-4">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                            <strong>Nom :</strong> {{ $map->name }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                            <strong>Description :</strong> {{ $map->description }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>
                            <strong>Personnes :</strong> {{ $map->people_working }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <svg class="w-5 h-5 text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 12c0 4.9706-4.0294 9-9 9m9-9c0-4.97056-4.0294-9-9-9m9 9h-5m-4 9c-4.97056 0-9-4.0294-9-9m9 9v-5m-9-4c0-4.97056 4.02944-9 9-9m-9 9h5m4-9v5M8 3.93552V8m0 0v4m0-4H3.93552M8 8h4m-4 4v4m0-4h4m-4 4v4.0645M8 16H3.93552M8 16h4m0-8v4m0-4h4m-4 4v4m0-4h4m0-12.06448V8m0 0v4m0-4h4.0645M16 12v4m0 0v4.0645M16 16h4.0645" />
                            </svg>
                            <a href="{{ $map->url }}" target="_blank"
                                class="text-blue-600 underline">{{ $map->url }}</a>
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                            </svg>
                            {{ $map->email }}
                        </div>
                    </div>

                        <div class="flex flex-col ">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="p-1 hover:bg-gray-100 rounded-full">
                                    <svg class="w-6 h-6 text-green-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            </form>

                            <button onclick="openModal({{ $map->id }})"
                                class="p-1 hover:bg-gray-100 rounded-full">
                                <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </button>
                            <div id="modal-{{ $map->id }}"
                                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                                    <h2 class="text-xl font-semibold mb-4">Confirmer la suppression</h2>
                                    <p class="mb-6">Es-tu sûr de vouloir supprimer cette propriété ?</p>
                                    <div class="flex justify-end space-x-3">
                                        <button onclick="closeModal({{ $map->id }})"
                                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                                        <form action="{{ route('maps.destroy', $map->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }
    </script>
</x-app-layout>
