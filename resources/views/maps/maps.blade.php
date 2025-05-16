<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Maps') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl mb-6">

                <div class="p-4">
                    <div class="flex justify-between items-center">

                        <div class="flex flex-wrap gap-2">
                            <button onclick="filterCards('all')"
                                class="filter-btn active px-4 py-2 bg-alpha text-white rounded-full hover:bg-alpha/90 transition-all shadow-sm">
                                Tous
                            </button>
                            <button onclick="filterCards('organization')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Organisations
                            </button>
                            <button onclick="filterCards('bailleur')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Bailleurs
                            </button>
                            <button onclick="filterCards('agence')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Agences
                            </button>
                            <button onclick="filterCards('entreprise')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Entreprises
                            </button>
                            <button onclick="filterCards('publique')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Institutions Publiques
                            </button>
                            <button onclick="filterCards('academique')"
                                class="filter-btn px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 transition-all border border-gray-200 shadow-sm">
                                Institutions Académiques
                            </button>

                        </div>
                        <div class="relative">
                            <input type="text" id="search-input" placeholder="Rechercher..."
                                class="pl-9 w-32 border border-gray-300 rounded-lg focus:ring-alpha focus:border-alpha">
                            <div class="absolute left-3 top-2">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="grid grid-cols-2 gap-6" id="cards-container">
                @foreach ($osc as $item)
                    <div
                        class="card organization-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Organisation
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                            class="w-full h-full object-cover">

                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">{{ $item->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">Fondée en {{ $item->creation_year }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Statut:</strong>
                                            {{ $item->legal_status }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>contact_email: </strong>
                                            {{ $item->contact_email }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-alpha"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                        </svg>
                                        <span class="line-clamp-1"><strong>Phone:</strong>
                                            {{ Str::startsWith($item->phone, '+') ? $item->phone : '+212 ' . ltrim($item->phone, '0') }}
                                        </span>


                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M177.8 63.2l10 17.4c2.8 4.8 4.2 10.3 4.2 15.9l0 41.4c0 3.9 1.6 7.7 4.3 10.4c6.2 6.2 16.5 5.7 22-1.2l13.6-17c4.7-5.9 12.9-7.7 19.6-4.3l15.2 7.6c3.4 1.7 7.2 2.6 11 2.6c6.5 0 12.8-2.6 17.4-7.2l3.9-3.9c2.9-2.9 7.3-3.6 11-1.8l29.2 14.6c7.8 3.9 12.6 11.8 12.6 20.5c0 10.5-7.1 19.6-17.3 22.2l-35.4 8.8c-7.4 1.8-15.1 1.5-22.4-.9l-32-10.7c-3.3-1.1-6.7-1.7-10.2-1.7c-7 0-13.8 2.3-19.4 6.5L176 212c-10.1 7.6-16 19.4-16 32l0 28c0 26.5 21.5 48 48 48l32 0c8.8 0 16 7.2 16 16l0 48c0 17.7 14.3 32 32 32c10.1 0 19.6-4.7 25.6-12.8l25.6-34.1c8.3-11.1 12.8-24.6 12.8-38.4l0-12.1c0-3.9 2.6-7.3 6.4-8.2l5.3-1.3c11.9-3 20.3-13.7 20.3-26c0-7.1-2.8-13.9-7.8-18.9l-33.5-33.5c-3.7-3.7-3.7-9.7 0-13.4c5.7-5.7 14.1-7.7 21.8-5.1l14.1 4.7c12.3 4.1 25.7-1.5 31.5-13c3.5-7 11.2-10.8 18.9-9.2l27.4 5.5C432 112.4 351.5 48 256 48c-27.7 0-54 5.4-78.2 15.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                                        </svg>
                                        <span class="line-clamp-1"><strong>Country:</strong>
                                            {{ is_array($item->country) ? implode(', ', $item->country) : str_replace(['[', ']', '"'], '', $item->country) }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 320 512">
                                            <path
                                                d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480l0-162.9c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9L192 480c0 17.7-14.3 32-32 32s-32-14.3-32-32z" />
                                        </svg>
                                        <span class="line-clamp-1"><strong>postal_address: </strong>
                                            {{ $item->postal_address }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->website }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->website }}</a></span>
                                    </div>

                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Organization', {{ $item->id }})"
                                        class=" text-white text-sm">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('organizations', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('details.show', ['type' => 'organization', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="submission-modal"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-medium text-gray-900">Approuver l'élément</h3>
                                <button onclick="closeSubmissionModal()"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <form id="submission-form" method="POST"
                                action="{{ route('admin.approve', $item->id) }}">
                                @csrf
                                <input type="hidden" id="model_type" name="model_type">
                                <input type="hidden" id="model_id" name="model_id">

                                <div id="model-info" class="mb-6 p-4 bg-gray-50 rounded-lg">
                                    <p class="text-sm text-gray-600">Chargement des informations...</p>
                                </div>

                                <div class="flex justify-end space-x-3">
                                    <button type="button" onclick="closeSubmissionModal()"
                                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-all">
                                        Annuler
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-beta text-white rounded-lg hover:bg-beta/90 transition-all flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                        <span>Approuver</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

                @foreach ($bailleur as $item)
                    <div
                        class="card bailleur-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Bailleur
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo_path) }}"
                                            alt="{{ $item->nom }}" class="w-full h-full object-cover">
                                    </div>


                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                            {{ $item->nom }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->pays_origine }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Type:</strong>
                                            {{ $item->type_institution }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Email:</strong>
                                            {{ $item->email_contact }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>telephone:</strong>
                                            {{ $item->telephone }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->site_web }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->site_web }}</a></span>
                                    </div>

                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Bailleur', {{ $item->id }})"
                                        class=" text-white text-sm">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('bailleurs', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('details.show', ['type' => 'bailleur', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($agence as $item)
                    <div
                        class="card agence-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Agence
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nom }}"
                                            class="w-full h-full object-cover">
                                    </div>

                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                            {{ $item->nom }}</h3>
                                        <p class="text-sm text-gray-500">Pays representes :
                                            {{ $item->pays_representes }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Type:</strong>
                                            {{ $item->type_organisation }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Email:</strong>
                                            {{ $item->email_institutionnel }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->site_web }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->site_web }}</a></span>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Agence', {{ $item->id }})"
                                        class="text-sm rounded-lg">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('agences', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    
                                    <a href="{{ route('details.show', ['type' => 'agence', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($entreprise as $item)
                    <div
                        class="card entreprise-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Entreprise
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nom }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                            {{ $item->nom }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->secteur }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Taille:</strong>
                                            {{ $item->taille }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Pays siege:</strong>
                                            {{ $item->pays_siege }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>telephone :</strong>
                                            {{ $item->telephone }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Email:</strong>
                                            {{ $item->email_contact }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->site_web }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->site_web }}</a></span>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Entreprise', {{ $item->id }})"
                                        class="text-sm rounded-lg">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('entreprises', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    
                                    <a href="{{ route('details.show', ['type' => 'entreprise', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($publique as $item)
                    <div
                        class="card publique-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Institution Publique
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo_path) }}" alt=""
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                            {{ $item->institution_name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->institution_type }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Address:</strong>
                                            {{ $item->address }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Telephone:</strong>
                                            {{ $item->phone_code }}{{ $item->phone_number }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Email:</strong>
                                            {{ $item->email }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->website }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->website }}</a></span>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Publique', {{ $item->id }})"
                                        class="text-sm rounded-lg">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('publiques', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    
                                    <a href="{{ route('details.show', ['type' => 'publique', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($academique as $item)
                    <div
                        class="card academique-card bg-white overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 rounded-xl border border-gray-100">
                        <div class="relative">
                            <div
                                class="absolute top-2 right-2 bg-beta text-white px-2 py-1 rounded-full font-medium text-sm">
                                Institution Académique
                            </div>
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden mr-4 border border-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->logo_path) }}"
                                            alt="{{ $item->nom }}" class="w-full h-full object-cover">
                                    </div>

                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                            {{ $item->nom }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->type_institution }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3 mt-4 border-t border-gray-100 pt-4">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Departement:</strong>
                                            {{ $item->departement }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Pays:</strong>
                                            {{ $item->pays }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Telephone:</strong>
                                            {{ $item->telephone }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Email:</strong>
                                            {{ $item->email }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                        <span class="line-clamp-1"><strong>Site web:</strong> <a
                                                href="{{ $item->site_web }}" class="text-alpha hover:underline"
                                                target="_blank">{{ $item->site_web }}</a></span>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button onclick="openSubmissionModal('Academique', {{ $item->id }})"
                                        class="text-sm rounded-lg ">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete('academiques', {{ $item->id }})"
                                        class="delete-btn flex items-center px-3 py-1 text-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    
                                    <a href="{{ route('details.show', ['type' => 'academique', 'id' => $item->id]) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


    <script>
        function filterCards(type) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-alpha', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
            event.currentTarget.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            event.currentTarget.classList.add('bg-alpha', 'text-white');

            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                if (type === 'all') {
                    card.classList.remove('hidden');
                } else {
                    if (card.classList.contains(type + '-card')) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                }
            });
        }

        document.getElementById('search-input').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                if (cardText.includes(searchTerm)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });

        const modelMap = {
            'organization': 'App\\Models\\Organization',
            'bailleur': 'App\\Models\\Bailleur',
            'agence': 'App\\Models\\Agence',
            'entreprise': 'App\\Models\\Entreprise',
            'publique': 'App\\Models\\Publique',
            'academique': 'App\\Models\\Academique'
        };

        function openSubmissionModal(modelType, modelId) {
            if (!modelMap[modelType.toLowerCase()]) {
                console.error('Type de modèle non reconnu:', modelType);
                return;
            }

            document.getElementById('model_type').value = modelMap[modelType.toLowerCase()];
            document.getElementById('model_id').value = modelId;

            const modelInfo = document.getElementById('model-info');
            modelInfo.innerHTML = `
                <div class="space-y-3">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-beta/20 flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-beta" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Confirmation requise</p>
                            <p class="text-sm text-gray-600">Approbation de l'élément sélectionné</p>
                        </div>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-gray-200">
                        <div class="grid grid-cols-2 gap-2 text-sm">
                            <div>
                                <p class="text-gray-500">Type</p>
                                <p class="font-medium text-gray-900">${modelType}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">ID</p>
                                <p class="font-medium text-gray-900">${modelId}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            const modal = document.getElementById('submission-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeSubmissionModal() {
            const modal = document.getElementById('submission-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        function confirmDelete(modelType, id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
                const routes = {
                    'organizations': '/organizations',
                    'bailleurs': '/bailleurs',
                    'agences': '/agences',
                    'entreprises': '/entreprises',
                    'publiques': '/publiques',
                    'academiques': '/academiques'
                };

                fetch(`${routes[modelType]}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${localStorage.getItem('token')}`
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            response.json().then(data => {
                                alert(`Erreur: ${data.message}`);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Une erreur est survenue');
                    });
            }
        }
    </script>
</x-app-layout>
