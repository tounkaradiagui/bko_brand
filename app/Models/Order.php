<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tracking_no',
        'nom',
        'prenom',
        'email',
        'telephone',
        'pincode',
        'adresse',
        'status_message',
        'payment_mode',
        'payment_id'
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(Order_Item::class, 'order_id', 'id');
    } 
}
