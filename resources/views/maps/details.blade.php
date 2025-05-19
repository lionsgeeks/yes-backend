<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @php
                $lowerType = strtolower($type);
            @endphp

            @switch($lowerType)
                @case('organization')
                    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md overflow-x-auto">
                        <table class="min-w-full border border-gray-200 table-auto text-sm">
                            <tbody>
                                <tr class="border-b border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom de l'organisation</th>
                                    <td class="p-4">{{ $item->name }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Année de création</th>
                                    <td class="p-4">{{ $item->creation_year }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Statut légal</th>
                                    <td class="p-4">{{ $item->legal_status }}</td>
                                </tr>
                                @if ($item->legal_status === 'Autre')
                                    <tr class="border-b border-gray-300">
                                        <th class="text-left p-4 bg-[#e0ecff9d] text-black">Autre statut légal</th>
                                        <td class="p-4">{{ $item->other_legal_status }}</td>
                                    </tr>
                                @endif
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email principal</th>
                                    <td class="p-4">{{ $item->main_email }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Téléphone</th>
                                    <td class="p-4">{{ $item->phone }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Adresse postale</th>
                                    <td class="p-4">{{ $item->postal_address }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Site web</th>
                                    <td class="p-4">
                                        <a href="{{ $item->website }}" class="text-blue-600 hover:underline" target="_blank"
                                            rel="noreferrer">
                                            {{ $item->website }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Pays</th>
                                    <td class="p-4">{{ $item->country }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Régions</th>
                                    <td class="p-4">{{ $item->regions }}</td>
                                </tr>
                                <tr class="border-b border-gray-300 align-top">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Réseaux sociaux</th>
                                    <td class="p-4">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>
                                                Facebook: <a href="{{ $item->facebook_url }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->facebook_url }}</a>
                                            </li>
                                            <li>
                                                Twitter: <a href="{{ $item->twitter_url }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->twitter_url }}</a>
                                            </li>
                                            <li>
                                                LinkedIn: <a href="{{ $item->linkedin_url }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->linkedin_url }}</a>
                                            </li>
                                            <li>
                                                Instagram: <a href="{{ $item->instagram_url }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->instagram_url }}</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom du contact</th>
                                    <td class="p-4">{{ $item->contact_name }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Fonction du contact</th>
                                    <td class="p-4">{{ $item->contact_function }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email du contact</th>
                                    <td class="p-4">{{ $item->contact_email }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Zones d'intervention</th>
                                    <td class="p-4">{{ $item->intervention_areas }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Groupes cibles</th>
                                    <td class="p-4">{{ $item->target_groups }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Bénéficiaires annuels</th>
                                    <td class="p-4">{{ $item->annual_beneficiaries }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Titre du programme</th>
                                    <td class="p-4">{{ $item->program_title }}</td>
                                </tr>
                                <tr class="border-b border-gray-300 align-top">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Description du programme</th>
                                    <td class="p-4">{{ $item->program_description }}</td>
                                </tr>
                                <tr class="border-b border-gray-300 align-top">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Approche méthodologique</th>
                                    <td class="p-4">{{ $item->methodological_approach }}</td>
                                </tr>
                                <tr class="border-b border-gray-300 align-top">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Résultats attendus</th>
                                    <td class="p-4">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>{{ $item->result1 }}</li>
                                            <li>{{ $item->result2 }}</li>
                                            <li>{{ $item->result3 }}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Partenaires techniques</th>
                                    <td class="p-4">{{ $item->technical_partners }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Partenaires financiers</th>
                                    <td class="p-4">{{ $item->financial_partners }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

                @case('bailleur')
                    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md overflow-x-auto">
                        <table class="min-w-full border border-gray-300 table-auto bg-white text-sm rounded-md">
                            <tbody>
                                <tr class="border-b border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Nom d'institution</th>
                                    <td class="p-4">{{ $item->nom }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Type d'institution</th>
                                    <td class="p-4">{{ $item->type_institution }}</td>
                                </tr>
                                @if ($item->type_institution === 'Autre')
                                    <tr class="border-b border-gray-300">
                                        <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Autre</th>
                                        <td class="p-4">{{ $item->type_institution_autre }}</td>
                                    </tr>
                                @endif
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Pays d'origine</th>
                                    <td class="p-4">{{ $item->pays_origine }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Couverture géographique</th>
                                    <td class="p-4">{{ $item->couverture_geographique }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Site web</th>
                                    <td class="p-4">
                                        <a href="{{ $item->site_web }}" class="text-blue-600" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $item->site_web }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Email</th>
                                    <td class="p-4">{{ $item->email_contact }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Téléphone</th>
                                    <td class="p-4">{{ $item->telephone }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Représentation en Afrique</th>
                                    <td class="p-4">{{ $item->representation_afrique }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3 align-top">Contact responsable
                                    </th>
                                    <td class="p-4">
                                        <p><strong>Nom:</strong> {{ $item->contact_responsable->nom ?? '' }}</p>
                                        <p><strong>Fonction:</strong> {{ $item->contact_responsable->fonction ?? '' }}</p>
                                        <p><strong>Email:</strong> {{ $item->contact_responsable->email ?? '' }}</p>
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3 align-top">Réseaux sociaux</th>
                                    <td class="p-4">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>
                                                Twitter: <a href="{{ $item->twitter_url2 }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->twitter_url2 }}</a>
                                            </li>
                                            <li>
                                                LinkedIn: <a href="{{ $item->linkedin_url2 }}"
                                                    class="text-blue-600 hover:underline" target="_blank"
                                                    rel="noreferrer">{{ $item->linkedin_url2 }}</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Priorités thématiques</th>
                                    <td class="p-4">{{ $item->priorites_thematiques }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Modalités de soutien</th>
                                    <td class="p-4">{{ $item->modalites_soutien }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Financement minimum</th>
                                    <td class="p-4">{{ $item->financement_min }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Financement maximum</th>
                                    <td class="p-4">{{ $item->financement_max }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Budget annuel</th>
                                    <td class="p-4">{{ $item->budget_annuel }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Critères d'éligibilité</th>
                                    <td class="p-4">{{ $item->criteres_eligibilite }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Projets phares</th>
                                    <td class="p-4">{{ $item->projets_phares }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Approche d'impact</th>
                                    <td class="p-4">{{ $item->approche_impact }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Partenaires actuels</th>
                                    <td class="p-4">{{ $item->partenaires_actuels }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Procédure de soumission</th>
                                    <td class="p-4">{{ $item->procedure_soumission }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

                @case('entreprise')
                    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md overflow-x-auto">
                        <table class="min-w-full border border-gray-300 rounded-md text-sm">
                            <tbody>
                                <tr class="border-b border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Nom de l'entreprise</th>
                                    <td class="p-4">{{ $item->nom }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Secteur</th>
                                    <td class="p-4">{{ $item->secteur }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Taille</th>
                                    <td class="p-4">{{ $item->taille }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Pays du siège</th>
                                    <td class="p-4">{{ $item->pays_siege }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Régions en Afrique</th>
                                    <td class="p-4">{{ $item->regions_afrique }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Site web</th>
                                    <td class="p-4">
                                        <a href="{{ $item->site_web }}" target="_blank" rel="noopener noreferrer"
                                            class="text-blue-600 underline">
                                            {{ $item->site_web }}
                                        </a>
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Email de contact</th>
                                    <td class="p-4">{{ $item->email_contact }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Téléphone</th>
                                    <td class="p-4">{{ $item->telephone_code }} {{ $item->telephone_number }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Nom du contact RSE</th>
                                    <td class="p-4">{{ $item->contact_rse->nom ?? '' }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Fonction du contact RSE</th>
                                    <td class="p-4">{{ $item->contact_rse->fonction ?? '' }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Email du contact RSE</th>
                                    <td class="p-4">{{ $item->contact_rse->email ?? '' }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Politique d'inclusion</th>
                                    <td class="p-4">{{ $item->politique_inclusion }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Programmes d'intégration</th>
                                    <td class="p-4">{{ $item->programmes_integration }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Postes/stages annuels</th>
                                    <td class="p-4">{{ $item->postes_stages_annuels }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Dispositifs de formation</th>
                                    <td class="p-4">{{ $item->dispositifs_formation }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Partenariats avec OSC</th>
                                    <td class="p-4">{{ $item->partenariats_osc }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Initiatives de mécénat</th>
                                    <td class="p-4">{{ $item->initiatives_mecenat }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Compétences pro bono</th>
                                    <td class="p-4">{{ $item->competences_pro_bono }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Profils recherchés</th>
                                    <td class="p-4">{{ $item->profils_recherches }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Régions de recrutement</th>
                                    <td class="p-4">{{ $item->regions_recrutement }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black w-1/3">Processus d'intégration</th>
                                    <td class="p-4">{{ $item->processus_integration }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

                @case('agence')
                    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md">
                        <table class="w-full border border-gray-300 table-auto text-left text-sm">
                            <tbody>
                                <tr class="border-b text-center border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom</th>
                                    <td class="p-4">{{ $item->nom }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Type d'organisation</th>
                                    <td class="p-4">{{ $item->type_organisation }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Pays représentés</th>
                                    <td class="p-4">{{ $item->pays_representes }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Couverture en Afrique</th>
                                    <td class="p-4">{{ $item->couverture_afrique }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Site web</th>
                                    <td class="p-4">
                                        <a href="{{ $item->site_web }}" class="text-blue-600" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $item->site_web }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email institutionnel</th>
                                    <td class="p-4">{{ $item->email_institutionnel }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Bureaux en Afrique</th>
                                    <td class="p-4">{{ $item->bureaux_afrique }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th colspan="2" class="p-4 bg-[#e0ecff9d] text-alpha font-semibold">Contact Jeunesse
                                    </th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom</th>
                                    <td class="p-4">{{ $item->contact_jeunesse->nom ?? '' }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Fonction</th>
                                    <td class="p-4">{{ $item->contact_jeunesse->fonction ?? '' }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email</th>
                                    <td class="p-4">{{ $item->contact_jeunesse->email ?? '' }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Priorités thématiques</th>
                                    <td class="p-4">{{ $item->priorites_thematiques }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Cadre stratégique</th>
                                    <td class="p-4">
                                        <a href="{{ $item->cadre_strategique }}" class="text-blue-600">Télécharger</a>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Budget</th>
                                    <td class="p-4">{{ $item->budget }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Période</th>
                                    <td class="p-4">{{ $item->annee_debut }} - {{ $item->annee_fin }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th colspan="2" class="p-2 bg-[#e0ecff9d] text-alpha font-semibold">Programmes Phares
                                    </th>
                                </tr>
                                @if (isset($item->programmes_phares) && is_array($item->programmes_phares))
                                    @foreach ($item->programmes_phares as $programme)
                                        <tr class="border-b border-gray-300">
                                            <th class="text-left p-4 bg-[#e0ecff9d] text-black">Titre</th>
                                            <td class="p-4">{{ $programme->titre }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-300">
                                            <th class="text-left p-4 bg-[#e0ecff9d] text-black">Objectifs</th>
                                            <td class="p-4">{{ $programme->objectifs }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-300">
                                            <th class="text-left p-4 bg-[#e0ecff9d] text-black">Pays d'intervention</th>
                                            <td class="p-4">{{ $programme->pays_intervention }}</td>
                                        </tr>
                                        <tr class="border-b border-alpha">
                                            <th class="text-left p-4 bg-[#e0ecff9d] text-black">Résultats</th>
                                            <td class="p-4">
                                                <ul class="list-disc ml-4">
                                                    @foreach (explode('.', $programme->resultats) as $res)
                                                        @if (trim($res) !== '')
                                                            <li>{{ trim($res) }}.</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Outils méthodologiques</th>
                                    <td class="p-4">
                                        <a href="{{ $item->outils_methodologiques }}" class="text-blue-600">Télécharger</a>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Opportunités de financement</th>
                                    <td class="p-4">{{ $item->opportunites_financement }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Type de partenaires recherchés</th>
                                    <td class="p-4">{{ $item->type_partenaires }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Domaines d'expertise</th>
                                    <td class="p-4">{{ $item->domaines_expertise }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

                @case('publique')
                    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md">
                        <table class="w-full border border-gray-300 text-sm table-auto text-left">
                            <tbody>
                                <tr class="border-b text-center border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom:</th>
                                    <td class="p-4">{{ $item->institution_name }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Type d'institution</th>
                                    <td class="p-4">{{ $item->institution_type }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Pays</th>
                                    <td class="p-4">{{ $item->country }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Site web</th>
                                    <td class="p-4">
                                        <a href="{{ $item->website }}" class="text-blue-600" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $item->website }}
                                        </a>
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email</th>
                                    <td class="p-4">{{ $item->email }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Téléphone</th>
                                    <td class="p-4">{{ $item->phone_code }} {{ $item->phone_number }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Adresse</th>
                                    <td class="p-4">{{ $item->address }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th colspan="2"
                                        class="border-t border-b border-alpha p-2 bg-[#e0ecff9d] text-alpha font-semibold">
                                        Contact
                                        Jeunesse</th>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom</th>
                                    <td class="p-4">{{ $item->youth_contact_name }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Poste</th>
                                    <td class="p-4">{{ $item->youth_contact_position }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email</th>
                                    <td class="p-4">{{ $item->youth_contact_email }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Cadre politique</th>
                                    <td class="p-4">{{ $item->policy_framework }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Priorités stratégiques</th>
                                    <td class="p-4">{{ $item->strategic_priorities }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Budget annuel</th>
                                    <td class="p-4">{{ $item->annual_budget }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Public cible</th>
                                    <td class="p-4">{{ $item->execution_partners }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Mécanismes de soutien</th>
                                    <td class="p-4">{{ $item->support_mechanisms }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom du Programme phare</th>
                                    <td class="p-4">{{ $item->flagship_program }}</td>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th colspan="2"
                                        class="border-t border-b border-alpha p-2 bg-[#e0ecff9d] text-alpha font-semibold">
                                        Résultats attendus</th>
                                </tr>

                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Résultats 1</th>
                                    <td class="p-4">{{ $item->expected_result_1 }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Résultats 2</th>
                                    <td class="p-4">{{ $item->expected_result_2 }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Résultats 3</th>
                                    <td class="p-4">{{ $item->expected_result_3 }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Assistance Technique</th>
                                    <td class="p-4">{{ $item->technical_assistance }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Bonnes pratiques Recherchées</th>
                                    <td class="p-4">{{ $item->best_practices }}</td>
                                </tr>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Opportunites de cooperation </th>
                                    <td class="p-4">{{ $item->cooperation_opportunities }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

                @case('academique')
                    <div class="max-w-7xl  mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
                        <table class="table-auto w-full border border-gray-300 text-sm">
                            <tbody>
                                <tr class="border-b border-gray-300">
                                    <th class="p-4 bg-alpha text-white w-1/4 border-r">Questions</th>
                                    <th class="p-4 bg-alpha text-white w-1/2">Réponse Type</th>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom d'institution</th>
                                    <td class="p-4">{{ $item->nom }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Type d'institution</th>
                                    <td class="p-4">{{ $item->type_institution }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Pays</th>
                                    <td class="p-4">{{ $item->pays }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Département</th>
                                    <td class="p-4">{{ $item->departement }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Site web</th>
                                    <td class="p-4">
                                        @if ($item->site_web)
                                            <a href="{{ $item->site_web }}" class="text-blue-600" target="_blank"
                                                rel="noopener noreferrer">
                                                {{ $item->site_web }}
                                            </a>
                                        @else
                                            Non renseigné
                                        @endif
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email</th>
                                    <td class="p-4">{{ $item->email }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Téléphone</th>
                                    <td class="p-4">{{ $item->telephone }}</td>
                                </tr>

                                <tr class="border-b border-alpha">
                                    <th colspan="2" class="text-left p-4 bg-[#e0ecff9d] text-black">Contact Chercheur</th>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Nom</th>
                                    <td class="p-4">{{ $item->contact_nom }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Fonction</th>
                                    <td class="p-4">{{ $item->contact_fonction }}</td>
                                </tr>
                                <tr class="border-b border-alpha">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Email</th>
                                    <td class="p-4">{{ $item->contact_email }}</td>
                                </tr>

                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Axes de recherche</th>
                                    <td class="p-4">{{ $item->axes_recherche }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Méthodologies</th>
                                    <td class="p-4">{{ $item->methodologies }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Zones géographiques</th>
                                    <td class="p-4">{{ $item->zones_geographiques }}</td>
                                </tr>

                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Programmes de formation</th>
                                    <td class="p-4">{{ $item->programmes_formation }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Public cible</th>
                                    <td class="p-4">{{ $item->public_cible }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Modalités</th>
                                    <td class="p-4">{{ $item->modalites }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Certifications</th>
                                    <td class="p-4">{{ $item->certifications }}</td>
                                </tr>

                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Partenaires de recherche</th>
                                    <td class="p-4">{{ $item->partenaires_recherche }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Expertise</th>
                                    <td class="p-4">{{ $item->expertise }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Conférences</th>
                                    <td class="p-4">{{ $item->conferences }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Ateliers</th>
                                    <td class="p-4">{{ $item->ateliers }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="text-left p-4 bg-[#e0ecff9d] text-black">Ressources disponibles</th>
                                    <td class="p-4">{{ $item->ressources_disponibles }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @break

            @endswitch
        </div>
    </div>
</x-app-layout>
