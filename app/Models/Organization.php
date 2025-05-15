<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'creation_year',
        'legal_status',
        'other_legal_status',
        'country',
        'regions',
        'website',
        'social_facebook',
        'social_twitter',
        'social_linkedin',
        'social_instagram',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'main_email',
        'phone',
        'postal_address',
        'contact_name',
        'contact_function',
        'contact_email',
        'intervention_areas',
        'target_groups',
        'annual_beneficiaries',
        'program_title',
        'program_description',
        'methodological_approach',
        'result1',
        'result2',
        'result3',
        'technical_partners',
        'financial_partners',
         'lat',
    'lng',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function shows()
    {
        return $this->morphMany(shows::class, 'showable');
    }
    
}
