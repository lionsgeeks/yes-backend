<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulaire Details') }}
        </h2>
    </x-slot>

    <div x-data="{ tab: 'general' }" class="py-12 ">
        <div class="max-w-7xl mx-auto flex flex-col gap-5 sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-4xl font-semibold">{{ $form->name_organization }}</h1>

                <br>
                <div class="flex bg-gray-200 w-full justify-between gap-2 p-1 rounded-lg">
                    @foreach (['general', 'project', 'previous'] as $language)
                        <button @click="tab = '{{ $language }}'"
                            :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-transparent text-black': tab !== '{{ $language }}' }"
                            type="button" class="w-1/3 rounded-md font-medium p-1">
                            {{ $language }}
                        </button>
                    @endforeach
                </div>
                <br>
                <div x-show="tab === 'general'">

                    <button class="w-full text-2xl border rounded p-2 bg-alpha text-white">
                        Representative Information
                    </button>

                    <div class="flex items-center flex-col gap-3 w-full py-3">
                        <div class="flex items-center justify-around w-full">
                            <p>Name: {{ $form->name_representative }}</p>
                            <p>Position: {{ $form->position_representative }}</p>
                        </div>
                        <div class="flex items-center justify-around w-full">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <p>
                                    {{ $form->phone_representative }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                </svg>

                                <p>
                                    {{ $form->email_representative }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.72 3.99997H5.37C5.19793 3.99191 5.02595 4.01786 4.86392 4.07635C4.70189 4.13484 4.55299 4.22471 4.42573 4.34081C4.29848 4.45692 4.19537 4.59699 4.12232 4.75299C4.04927 4.909 4.0077 5.07788 4 5.24997V18.63C4.01008 18.9901 4.15766 19.3328 4.41243 19.5875C4.6672 19.8423 5.00984 19.9899 5.37 20H18.72C19.0701 19.9844 19.4002 19.8322 19.6395 19.5761C19.8788 19.32 20.0082 18.9804 20 18.63V5.24997C20.0029 5.08247 19.9715 4.91616 19.9078 4.76122C19.8441 4.60629 19.7494 4.466 19.6295 4.34895C19.5097 4.23191 19.3672 4.14059 19.2108 4.08058C19.0544 4.02057 18.8874 3.99314 18.72 3.99997ZM9 17.34H6.67V10.21H9V17.34ZM7.89 9.12997C7.72741 9.13564 7.5654 9.10762 7.41416 9.04768C7.26291 8.98774 7.12569 8.89717 7.01113 8.78166C6.89656 8.66615 6.80711 8.5282 6.74841 8.37647C6.6897 8.22474 6.66301 8.06251 6.67 7.89997C6.66281 7.73567 6.69004 7.57169 6.74995 7.41854C6.80986 7.26538 6.90112 7.12644 7.01787 7.01063C7.13463 6.89481 7.2743 6.80468 7.42793 6.74602C7.58157 6.68735 7.74577 6.66145 7.91 6.66997C8.07259 6.66431 8.2346 6.69232 8.38584 6.75226C8.53709 6.8122 8.67431 6.90277 8.78887 7.01828C8.90344 7.13379 8.99289 7.27174 9.05159 7.42347C9.1103 7.5752 9.13699 7.73743 9.13 7.89997C9.13719 8.06427 9.10996 8.22825 9.05005 8.3814C8.99014 8.53456 8.89888 8.6735 8.78213 8.78931C8.66537 8.90513 8.5257 8.99526 8.37207 9.05392C8.21843 9.11259 8.05423 9.13849 7.89 9.12997ZM17.34 17.34H15V13.44C15 12.51 14.67 11.87 13.84 11.87C13.5822 11.8722 13.3313 11.9541 13.1219 12.1045C12.9124 12.2549 12.7546 12.4664 12.67 12.71C12.605 12.8926 12.5778 13.0865 12.59 13.28V17.34H10.29V10.21H12.59V11.21C12.7945 10.8343 13.0988 10.5225 13.4694 10.3089C13.84 10.0954 14.2624 9.98848 14.69 9.99997C16.2 9.99997 17.34 11 17.34 13.13V17.34Z"
                                        fill="#000000" />
                                </svg>

                                <a href="{{ $form->linkedin_representative }}" target="_blank" class="text-blue-600">
                                    {{ $form->linkedin_representative }}
                                </a>
                            </div>

                        </div>
                    </div>
                    <br>
                    <button class="w-full text-2xl border rounded p-2 bg-alpha text-white">
                        Tenderer Information
                    </button>
                    <div class="flex items-center flex-col gap-3 w-full py-3">
                        <div class="flex items-center justify-around w-full">
                            <p>Name: {{ $form->name_tenderer }}</p>
                            <p>Position: {{ $form->position_tenderer }}</p>
                        </div>
                        <div class="flex items-center justify-around w-full">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <p>
                                    {{ $form->phone_tenderer }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                </svg>

                                <p>
                                    {{ $form->email_tenderer }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.72 3.99997H5.37C5.19793 3.99191 5.02595 4.01786 4.86392 4.07635C4.70189 4.13484 4.55299 4.22471 4.42573 4.34081C4.29848 4.45692 4.19537 4.59699 4.12232 4.75299C4.04927 4.909 4.0077 5.07788 4 5.24997V18.63C4.01008 18.9901 4.15766 19.3328 4.41243 19.5875C4.6672 19.8423 5.00984 19.9899 5.37 20H18.72C19.0701 19.9844 19.4002 19.8322 19.6395 19.5761C19.8788 19.32 20.0082 18.9804 20 18.63V5.24997C20.0029 5.08247 19.9715 4.91616 19.9078 4.76122C19.8441 4.60629 19.7494 4.466 19.6295 4.34895C19.5097 4.23191 19.3672 4.14059 19.2108 4.08058C19.0544 4.02057 18.8874 3.99314 18.72 3.99997ZM9 17.34H6.67V10.21H9V17.34ZM7.89 9.12997C7.72741 9.13564 7.5654 9.10762 7.41416 9.04768C7.26291 8.98774 7.12569 8.89717 7.01113 8.78166C6.89656 8.66615 6.80711 8.5282 6.74841 8.37647C6.6897 8.22474 6.66301 8.06251 6.67 7.89997C6.66281 7.73567 6.69004 7.57169 6.74995 7.41854C6.80986 7.26538 6.90112 7.12644 7.01787 7.01063C7.13463 6.89481 7.2743 6.80468 7.42793 6.74602C7.58157 6.68735 7.74577 6.66145 7.91 6.66997C8.07259 6.66431 8.2346 6.69232 8.38584 6.75226C8.53709 6.8122 8.67431 6.90277 8.78887 7.01828C8.90344 7.13379 8.99289 7.27174 9.05159 7.42347C9.1103 7.5752 9.13699 7.73743 9.13 7.89997C9.13719 8.06427 9.10996 8.22825 9.05005 8.3814C8.99014 8.53456 8.89888 8.6735 8.78213 8.78931C8.66537 8.90513 8.5257 8.99526 8.37207 9.05392C8.21843 9.11259 8.05423 9.13849 7.89 9.12997ZM17.34 17.34H15V13.44C15 12.51 14.67 11.87 13.84 11.87C13.5822 11.8722 13.3313 11.9541 13.1219 12.1045C12.9124 12.2549 12.7546 12.4664 12.67 12.71C12.605 12.8926 12.5778 13.0865 12.59 13.28V17.34H10.29V10.21H12.59V11.21C12.7945 10.8343 13.0988 10.5225 13.4694 10.3089C13.84 10.0954 14.2624 9.98848 14.69 9.99997C16.2 9.99997 17.34 11 17.34 13.13V17.34Z"
                                        fill="#000000" />
                                </svg>

                                <a href="{{ $form->linkedin_tenderer}}" target="_blank" class="text-blue-600">
                                    {{ $form->linkedin_tenderer}}
                                </a>
                            </div>

                        </div>
                    </div>
                    <br>

                    <button class="w-full text-2xl border rounded p-2 bg-alpha text-white">
                        Other Information
                    </button>

                    <div>
                        <p>Years of Existence: {{ $form->years_existence }}</p>
                        <p>Country of Registration: {{ $form->country_registration }}</p>
                        @php
                            $files = [
                                ['path' => $form->legal_statutes, 'title' => 'Legal Statutes'],
                                ['path' => $form->internal_regulations, 'title' => 'Internal Regulations'],
                                ['path' => $form->presentation, 'title' => 'Presentation'],
                            ];
                        @endphp

                        <div class="flex items-center justify-around">
                            @foreach ($files as $file)
                                <div class="flex gap-2 border items-center justify-center border-alpha p-2 rounded">
                                    <a class="text-alpha font-semibold" href="{{ asset('storage/' . $file['path']) }}"
                                        download="{{ $form->name_organization . '_' . $file['title'] }}">
                                        {{ $form->name_organization . ' ' . $file['title'] }}
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="#2e539d" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </div>
                            @endforeach
                        </div>


                        <p>Number of Empoyees: {{ $form->num_employees }}</p>
                        <p>Number of Volunteers: {{ $form->num_volunteers }}</p>
                        <p>Beneficiaries: {{ $form->beneficiaries }}</p>
                        <p>Country of Intervention: {{ $form->country_intervention }}</p>
                        <p>Area of Intervention: {{ $form->area_intervention }}</p>
                        <p class="capitalize">Sources of Funding:
                            {{ str_replace('-', ' ', implode(', ', explode(',', $form->sources_funding))) }}</p>
                        <p class="capitalize">Themes of Intervention:
                            {{ str_replace('-', ' ', implode(', ', explode(',', $form->themes_intervention))) }}</p>

                    </div>
                </div>

                <div x-show="tab === 'project'">

                    <div class="flex items-center justify-around">
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Approached Funders: </p>
                            <p class="font-semibold text-lg">{{ $form->approached_funders }}</p>
                        </div>
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Partners: </p>
                            <p class="font-semibold text-lg">{{ $form->partners }}</p>
                        </div>
                    </div>
                    <br>
                    @php
                        $files = [
                            ['path' => $form->project_description, 'title' => 'Project Description'],
                            ['path' => $form->funding_requirements, 'title' => 'Funding Requirements'],
                        ];
                    @endphp

                    <div class="flex items-center justify-around">
                        @foreach ($files as $file)
                            <div class="flex gap-2 border items-center justify-center border-alpha p-2 rounded">
                                <a class="text-alpha font-semibold" href="{{ asset('storage/' . $file['path']) }}"
                                    download="{{ $form->name_organization . '_' . $file['title'] }}">
                                    {{ $form->name_organization . ' ' . $file['title'] }}
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="#2e539d" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </div>
                        @endforeach
                    </div>


                </div>

                <div x-show="tab === 'previous'">
                    <div class="flex items-center justify-around">
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Example: </p>
                            <p class="font-semibold text-lg">{{ $form->neet_project_example }}</p>
                        </div>
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Reach: </p>
                            <p class="font-semibold text-lg">{{ $form->project_reach }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="flex items-center justify-around">
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Area: </p>
                            <p class="font-semibold text-lg">{{ $form->project_area }}</p>
                        </div>
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Impact: </p>
                            <p class="font-semibold text-lg">{{ $form->project_impact }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="flex items-center justify-around">
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Duration: </p>
                            <p class="font-semibold text-lg">{{ $form->project_duration }}</p>
                        </div>
                        <div class="flex items-cenr flex-col gap-2 w-full">
                            <p class="text-gray-700">Project Financing: </p>
                            <p class="font-semibold text-lg">{{ $form->project_financing }}</p>
                        </div>
                    </div>
                    <br>

                    @php
                        $files = [
                            ['path' => $form->project_evaluation, 'title' => 'Project Evaluation'],
                            ['path' => $form->other_projects, 'title' => 'Other Projects'],
                        ];
                    @endphp

                    <div class="flex items-center justify-around">
                        @foreach ($files as $file)
                            <div class="flex gap-2 border items-center justify-center border-alpha p-2 rounded">
                                <a class="text-alpha font-semibold" href="{{ asset('storage/' . $file['path']) }}"
                                    download="{{ $form->name_organization . '_' . $file['title'] }}">
                                    {{ $form->name_organization . ' ' . $file['title'] }}
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="#2e539d" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}

            <div class="bg-white overflow-hidden shadow-sm text-gray-900 sm:rounded-lg p-6">
                <table class="capitalize">
                    <tr class="bg-alpha text-white">
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
                        <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-alpha/10' : '' }}">
                            <td class="border p-3 border-alpha font-semibold">{{ $question }}</td>
                            <td class="border p-3 border-alpha">
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
                                            class="flex gap-2 border items-center justify-center border-alpha p-2 rounded">
                                            <a class="text-alpha font-semibold"
                                                href="{{ asset('storage/' . $form->$field) }}"
                                                download="{{ $form->name_organization . '_' . $field }}">
                                                {{ $form->name_organization . ' ' . $field }}
                                            </a>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2.5" stroke="#2e539d" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </div>
                                    @endif
                                @elseif ($field == 'themes_intervention' || $field == 'intervention_themes' || $field == 'sources_funding')
                                    <span>{{ str_replace('-', ' ', implode(', ', explode(',', $form->$field))) }}</span>
                                @else
                                    <span>{{ $form->$field }}</span>
                                    <span>{{ str_replace('_', ' ', $form->$field) }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
