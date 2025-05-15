<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'nom',
        'logo',
        'secteur',
        'taille',
        'pays_siege',
        'regions_afrique',
        'site_web',
        'twitter_url',
        'linkedin_url',
        'twitter',
        'linkedin',
        'email_contact',
        'telephone',
        'contact_rse',
        'politique_inclusion',
        'programmes_integration',
        'postes_stages_annuels',
        'dispositifs_formation',
        'partenariats_osc',
        'initiatives_mecenat',
        'competences_pro_bono',
        'profils_recherches',
        'regions_recrutement',
        'processus_integration',
         'lat',
    'lng',
        'user_id'
    ];

    protected $casts = [
        'contact_rse' => 'array',
        'competences_pro_bono' => 'array'

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
