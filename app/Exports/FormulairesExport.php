<?php

namespace App\Exports;

use App\Models\Formulaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormulairesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // modify the file links
        $fieldsToModify = [
            'legal_statutes',
            'presentation',
            'internal_regulations',
            'project_description',
            'funding_requirements',
            'project_evaluation',
            'other_projects'
        ];

        return Formulaire::all()->map(function ($formulaire) use ($fieldsToModify) {
            $formulaire->country_registration = ucfirst(str_replace('_', ' ', $formulaire->country_registration));
            $formulaire->country_intervention = ucfirst(str_replace('_', ' ', $formulaire->country_intervention));
            $formulaire->area_intervention = ucfirst($formulaire->area_intervention);
            $formulaire->sources_funding = str_replace('-', ' ', implode(', ', explode(',', $formulaire->sources_funding)));
            $formulaire->themes_intervention = str_replace('-', ' ', implode(', ', explode(',', $formulaire->themes_intervention)));
            $formulaire->intervention_themes = str_replace('-', ' ', implode(', ', explode(',', $formulaire->intervention_themes)));
            $formulaire->partners = str_replace('-', ' ', implode(', ', explode(',', $formulaire->partners)));


            foreach ($fieldsToModify as $field) {

                if (!empty($formulaire->{$field})) {
                    $formulaire->{$field} = 'https://management.youthempowermentsummit.africa/storage/' . $formulaire->{$field};
                }
            }

            return $formulaire;
        });
    }


    public function headings(): array
    {
        return [
            "id",
            "name of organization",
            "name of representative",
            "position of representative",
            "phone of representative",
            "email of representative",
            "LinkedIn of representative",
            "name of tenderer",
            "position of tenderer",
            "phone of tenderer",
            "email of tenderer",
            "LinkedIn of tenderer",
            "years of existence",
            "country of registration",
            "legal statutes",
            "presentation",
            "internal regulations",
            "number of employees",
            "number of volunteers",
            "beneficiaries",
            "country of intervention",
            "area of intervention",
            "project description",
            "funding requirements",
            "approached funders",
            "NEET project example",
            "project reach",
            "project impact",
            "project duration",
            "project area",
            "project evaluation",
            "other projects",
            "sources of funding",
            "themes of intervention",
            "intervention themes",
            "partners",
            "project financing",
            "created at",
            "updated at"
        ];
    }
}
