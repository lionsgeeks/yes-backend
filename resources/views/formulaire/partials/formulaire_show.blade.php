<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulaire Details') }}
        </h2>
    </x-slot>

    <div x-data="{ tab: 'general' }" class="py-12 ">
        <div class="max-w-7xl mx-auto flex flex-col gap-5 sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm text-gray-900 sm:rounded-lg p-6">
                <div class="w-full overflow-x-auto">
                    <table class="capitalize w-full md:table block">
                        <tr class="bg-alpha text-white md:table-row hidden">
                            <th class="border border-white p-3 w-[35vw]">Questions</th>
                            <th class="border border-white p-3">Response type</th>
                        </tr>
                        @php
                            $fields = [
                                'Name of organization' => 'name_organization',
                                'Full name of legal representative' => 'name_representative',
                                'Position of legal representative' => 'position_representative',
                                'Telephone number of legal representative' => 'phone_representative',
                                'Email address of legal representative' => 'email_representative',
                                'Link to legal representative\'s LinkedIn profile' => 'linkedin_representative',
                                'Last name and first name of tenderer (if other than legal representative)' =>
                                    'name_tenderer',
                                'Tenderer\'s position' => 'position_tenderer',
                                'Tenderer\'s telephone number' => 'phone_tenderer',
                                'Tenderer\'s email address' => 'email_tenderer',
                                'Link to tenderer\'s LinkedIn profile' => 'linkedin_tenderer',
                                'Years of existence' => 'years_existence',
                                'Country (of legal registration of association)' => 'country_registration',
                                'Presentation of the association and its activities (note to include organization chart)' =>
                                    'presentation',
                                'Legal statutes' => 'legal_statutes',
                                'Internal regulations' => 'internal_regulations',
                                'Number of employees' => 'num_employees',
                                'Number of volunteers' => 'num_volunteers',
                                'Beneficiaries of your programs' => 'beneficiaries',
                                'Country of intervention' => 'country_intervention',
                                'Area of intervention' => 'area_intervention',
                                'Sources of funding' => 'sources_funding',
                                'Themes of intervention' => 'themes_intervention',
                                'Project description (include target, activities and impact)' => 'project_description',
                                'Intervention themes' => 'intervention_themes',
                                'Funding requirements (budget)' => 'funding_requirements',
                                'Have you already approached funders for this project?' => 'approached_funders',
                                'Do you have partners for this project?' => 'partners',
                                'Describe an example of a N.E.E.T. youth project you\'ve carried out.' =>
                                    'neet_project_example',
                                'How many people did this project reach?' => 'project_reach',
                                'What was the direct impact on the beneficiaries of this project?' => 'project_impact',
                                'How long did the project last?' => 'project_duration',
                                'What was the project\'s area of intervention?' => 'project_area',
                                'How did you finance this project?' => 'project_financing',
                                'Project evaluation report (if applicable)' => 'project_evaluation',
                                'Would you like to share other projects targeting young people?' => 'other_projects',
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
                                    @if ($field == 'approached_funders' || $field == 'partners')
                                        {{ $form->$field == 'no-funders' || $form->$field == 'no-partners' ? 'NONE' : $form->$field }}
                                    @elseif ($field == 'linkedin_representative' || $field == 'linkedin_tenderer')
                                        <a href="{{ $form->$field }}" target="_blank" class="text-blue-600">
                                            {{ $form->$field }}
                                        </a>
                                    @elseif (in_array($field, [
                                            'presentation',
                                            'legal_statutes',
                                            'internal_regulations',
                                            'project_description',
                                            'funding_requirements',
                                            'project_evaluation',
                                            'other_projects',
                                        ]))
                                        @if ($form->$field)
                                            <div
                                                class="flex gap-2 items-center border border-alpha p-2 rounded justify-start md:justify-center">
                                                <a class="text-alpha font-semibold"
                                                    href="{{ asset('storage/' . $form->$field) }}"
                                                    download="{{ $form->name_organization . '_' . $field }}">
                                                    {{ $form->name_organization . ' ' . $field }}
                                                </a>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2.5" stroke="#2e539d"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </div>
                                        @endif
                                    @elseif ($field == 'themes_intervention' || $field == 'intervention_themes' || $field == 'sources_funding')
                                        <span>{{ str_replace('-', ' ', implode(', ', explode(',', $form->$field))) }}
                                        </span>
                                    @else
                                        <span>{{ str_replace('-', ' ', str_replace('_', ' ', $form->$field)) }} </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
