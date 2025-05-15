<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = [
        'nom',
        'logo',
        'type_organisation',
        'pays_representes',
        'couverture_afrique',
        'site_web',
        'email_institutionnel',
        'bureaux_afrique',
        'contact_jeunesse',
        'cadre_strategique',
        'priorites_thematiques',
        'budget',
        'annee_debut',
        'annee_fin',
        'programmes_phares',
        'outils_methodologiques',
        'opportunites_financement',
        'type_partenaires',
        'mecanismes_collaboration',
        'domaines_expertise',
         'lat',
    'lng',
        'user_id'
    ];

    protected $casts = [
        'programmes_phares' => 'array',
        'contact_jeunesse' => 'array'
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
