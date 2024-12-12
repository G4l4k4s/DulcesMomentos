<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientId',
        'productId',
        'numberOfPurchases',
        'status',
    ];

    /**
     * Relación con el cliente
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId');
    }

    /**
     * Relación con el producto
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
