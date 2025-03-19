<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiService extends Model
{
    protected $fillable = [
        'name',
        'description',
        'coordenadas',
        'images',
        'status',
        'provider_id',
        'service_type_id',
    ];

    protected $casts = [
        'coordenadas' => 'array',
        'images' => 'array',
    ];

    //protected $primaryKey = 'service_id'; // Especifica el nombre de la clave primaria porque laravel siempre busca id por defecto

}
