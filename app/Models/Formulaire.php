<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    protected $fillable = [
        'name_organization',
        'name_representative',
        'position_representative',
        'phone_representative',
        'email_representative',
        'linkedin_representative',
        'name_tenderer',
        'position_tenderer',
        'phone_tenderer',
        'email_tenderer',
        'linkedin_tenderer',
        'years_existence',
        'country_registration',
        'legal_statutes',
        'presentation',
        'internal_regulations',
        'num_employees',
        'num_volunteers',
        'beneficiaries',
        'country_intervention',
        'area_intervention',
        'project_description',
        'funding_requirements',
        'approached_funders',
        'neet_project_example',
        'project_reach',
        'project_impact',
        'project_duration',
        'project_area',
        'project_evaluation',
        'other_projects',
        'sources_funding',
        'themes_intervention',
        'intervention_themes',
        'partners',
        'project_financing',
        'is_invited',
        'is_invited_app'
    ];
}
