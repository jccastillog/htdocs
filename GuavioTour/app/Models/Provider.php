<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_legal_id',
        'legal_id',
        'name',
        'email',
        'phone',
        'address',
        'social_media',
        'status',
        'score',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    //protected $primaryKey = 'provider_id'; // Especifica el nombre de la clave primaria porque laravel siempre busca id por defecto

    public function services()
    {
        return $this->hasMany(Service::class, 'provider_id', 'provider_id');
    }
}
