<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publique extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_name',
        'institution_type',
        'country',
        'website',
        'logo_path',
        'email',
        'phone_code',
        'phone_number',
        'address',
        'youth_contact_name',
        'youth_contact_position',
        'youth_contact_email',
        'policy_framework',
        'strategic_priorities',
        'annual_budget',
        'flagship_program',
        'target_audience',
        'support_mechanisms',
        'expected_result_1',
        'expected_result_2',
        'expected_result_3',
        'execution_partners',
        'coordination_mechanism',
        'involved_actors',
        'monitoring_approach',
        'technical_assistance',
        'best_practices',
        'cooperation_opportunities',
         'lat',
    'lng',
    ];

    public function shows()
    {
        return $this->morphMany(shows::class, 'showable');
    }
    
}
