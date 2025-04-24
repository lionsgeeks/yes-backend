<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maps') }}
        </h2>
    </x-slot>
    <div>
        <div class="flex items-center justify-end gap-5 mx-5 my-3">
            <div>
                <button onclick="openModal('category-modal')"
                    class="w-full border border-[#e5cc8e] hover:border-gray-400 text-[#152b5d] hover:text-black p-2 rounded-lg flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                    <span class="text-sm md:text-base">Add Category</span>
                </button>

                <!-- Modal Category -->
                <div id="category-modal"
                    class="modal hidden fixed inset-0 bg-black/50 bg-opacity-50 z-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg w-96 relative">
                        <span class="absolute top-2 right-2 text-2xl cursor-pointer"
                            onclick="closeModal('category-modal')">&times;</span>
                        <h2 class="text-xl font-semibold mb-4 text-[#b09417]">Add Category</h2>
                        <form method="POST" action="/category/store">
                            @csrf
                            <input type="hidden" name="type" value="category">
                            <input type="text" name="name" placeholder="Enter category name" required
                                class="mt-2 p-2 w-full border border-gray-300 rounded-lg" />
                            <button type="submit"
                                class="mt-4 bg-[#b09417] text-white px-4 py-2 rounded-lg">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>

                <button onclick="openModal('type-modal')" type="button"
                    class="w-full border border-[#e5cc8e] hover:border-gray-400 text-[#152b5d] hover:text-black p-2 rounded-lg flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                    <span class="text-sm md:text-base">Add Type</span>
                </button>

                <!-- Modal Type -->
                <div id="type-modal"
                    class="modal hidden fixed inset-0 bg-black/50 bg-opacity-50 z-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg w-96 relative">
                        <span class="absolute top-2 right-2 text-2xl cursor-pointer"
                            onclick="closeModal('type-modal')">&times;</span>
                        <h2 class="text-xl font-semibold mb-4 text-[#b09417]">Add Type</h2>
                        <form method="POST" action="/type/store">
                            @csrf
                            <input type="hidden" name="type" value="type">
                            <input type="text" name="name" placeholder="Enter type name" required
                                class="mt-2 p-2 w-full border border-gray-300 rounded-lg" />
                            <button type="submit"
                                class="mt-4 bg-[#b09417] text-white px-4 py-2 rounded-lg">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <button onclick="openModal('option-modal')"
                    class="w-full border border-[#e5cc8e] hover:border-gray-400 text-[#152b5d] hover:text-black p-2 rounded-lg flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                    <span class="text-sm md:text-base">Add Option</span>
                </button>
                </a>

                <!-- Modal Option -->
                <div id="option-modal"
                    class="modal hidden fixed inset-0 bg-black/50 bg-opacity-50 z-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg w-96 relative">
                        <span class="absolute top-2 right-2 text-2xl cursor-pointer"
                            onclick="closeModal('option-modal')">&times;</span>
                        <h2 class="text-xl font-semibold mb-4 text-[#b09417]">Add Option</h2>
                        <form method="POST" action="/option/store">
                            @csrf
                            <input type="hidden" name="type" value="option">
                            <input type="text" name="name" placeholder="Enter option name" required
                                class="mt-2 p-2 w-full border border-gray-300 rounded-lg" />
                            <button type="submit"
                                class="mt-4 bg-[#b09417] text-white px-4 py-2 rounded-lg">Submit</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($maps as $map)
                <div class="flex justify-between bg-white shadow-lg rounded-xl p-4 w-full pt-5 mx-2 my-3">
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

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                            </svg>
                            {{ $map->category }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                            </svg>
                            {{ $map->type }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            {{ $map->option }}
                        </div>

                    </div>

                    <div class="flex flex-col ">

                        <button onclick="openModal2({{ $map->id }})" type="submit"
                            class="p-1 hover:bg-gray-100 rounded-full">
                            <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        </form>

                        <button onclick="openDeleteModal({{ $map->id }})"
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
                                    <button onclick="closeDeleteModal({{ $map->id }})"
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

                        <div id="modal2{{ $map->id }}"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                                <h2 class="text-xl font-semibold mb-4">Confirmation</h2>
                                <p class="mb-6">Es-tu sûr de vouloir approve cette propriété ?</p>
                                <div class="flex justify-end space-x-3">
                                    <button onclick="closeModal2({{ $map->id }})"
                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                                    <form action="{{ route('maps.approve', $map->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                                            Approve
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <button onclick="openEditModal({{ $map->id }})" type="button" 
                            class="p-1 hover:bg-gray-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                    stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                        </button>

                        <div id="edit-modal-{{ $map->id }}" 
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-xl">
                                <h2 class="text-xl font-semibold mb-4">Edit Map</h2>
                                <form method="POST" action="{{ route('maps.update', $map->id) }}" 
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" value="{{ $map->name }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Description</label>
                                            <input type="text" name="description" value="{{ $map->description }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">URL</label>
                                            <input type="url" name="url" value="{{ $map->url }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" value="{{ $map->email }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Logo</label>
                                            <input type="file" name="logo" 
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            @if($map->logo)
                                                <div class="mt-2">
                                                    <span class="text-xs text-gray-500">Current logo:</span>
                                                    <img src="{{ asset($map->logo) }}" 
                                                        class="w-20 h-20 object-cover rounded-lg">
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Category</label>
                                            <input type="text" name="category" value="{{ $map->category }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button" onclick="closeEditModal({{ $map->id }})" 
                                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                            Cancel
                                        </button>
                                        <button type="submit" 
                                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                            Update Map
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function openEditModal(id) {
            document.getElementById(`edit-modal-${id}`).classList.remove('hidden');
        }
    
        function closeEditModal(id) {
            document.getElementById(`edit-modal-${id}`).classList.add('hidden');
        }
    
        function openDeleteModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }
    
        function closeDeleteModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    
        function openModal2(id) {
            document.getElementById(`modal2${id}`).classList.remove('hidden');
        }
    
        function closeModal2(id) {
            document.getElementById(`modal2${id}`).classList.add('hidden');
        }
    
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }
    
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
