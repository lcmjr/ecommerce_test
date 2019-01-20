<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'email',
        'zip_code',
        'state',
        'city',
        'district',
        'address'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function totalValueItems()
    {
        $itens = $this->orderItems();
        return $itens->sum('total_price');
    }
}
