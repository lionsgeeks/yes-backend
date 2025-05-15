<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academique extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'logo_path',
        'type_institution',
        'pays',
        'site_web',
        'departement',
        'email',
        'telephone',
        'contact_nom',
        'contact_fonction',
        'contact_email',
        'axes_recherche',
        'methodologies',
        'zones_geographiques',
        'programmes_formation',
        'public_cible',
        'modalites',
        'certifications',
        'partenaires_recherche',
        'ressources_disponibles',
        'expertise',
        'opportunites_collaboration',
        'conferences',
        'ateliers',
        'publications',
         'lat',
    'lng',
    ];

    protected $casts = [
        'zones_geographiques' => 'array',
        'public_cible' => 'array',
        'modalites' => 'array',
        'ressources_disponibles' => 'array',
        'publications' => 'array'
    ];

    public function shows()
    {
        return $this->morphMany(shows::class, 'showable');
    }
}
