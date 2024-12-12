<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Definir la tabla asociada
    protected $table = 'orders';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'clientId', 
        'employeId', 
        'productId', 
        'quantity'
    ];

    /**
     * Definir la relación con la tabla de clientes
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId');
    }

    /**
     * Definir la relación con la tabla de empleados
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employeId');
    }

    /**
     * Definir la relación con la tabla de productos
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
