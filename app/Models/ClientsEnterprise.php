<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientsEnterprise extends Model
{
    protected $table = 'tb_clients_enterprises';

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'correo_electronico',
        'direccion',
        'fecha_nacimiento',
    ];

    // Relación con el modelo de la empresa
    public function enterprise()
    {
        return $this->belongsTo(CheckEnterprise::class, 'enterprise_id');
    }
}
