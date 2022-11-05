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
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'phone',
        'city',
        'status',
        'total_price'
    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
