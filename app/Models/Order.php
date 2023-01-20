<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'phone',
        'pincode',
        'adresse',
        'status_message',
        'payment_mode',
        'payment_id'
    ];
}
