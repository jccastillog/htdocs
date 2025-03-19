<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //protected $primaryKey = 'service_id'; // Especifica el nombre de la clave primaria porque laravel siempre busca id por defecto

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
