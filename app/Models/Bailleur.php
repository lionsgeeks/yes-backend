<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'logo_path',
        'type_institution',
        'pays_origine',
        'couverture_geographique',
        'site_web',
        'twitter_url2',
        'linkedin_url2',
        'twitter',
        'linkedin',
        'email_contact',
        'telephone',
        // 'representation_afrique',
        'contact_responsable',
        'priorites_thematiques',
        // 'modalites_soutien',
        // 'financement_min',
        // 'financement_max',
        // 'budget_annuel',
        // 'criteres_eligibilite',
        // 'projets_phares',
        // 'approche_impact',
        // 'partenaires_actuels',
        // 'procedure_soumission',
         'lat',
    'lng',
        'user_id'

    ];

    protected $casts = [
        'couverture_geographique' => 'array',
        'representation_afrique' => 'array',
        // 'modalites_soutien' => 'array',
        // 'projets_phares' => 'array',
        'reseaux_sociaux' => 'array',
        'contact_responsable' => 'array',
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
