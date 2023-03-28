<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'order_success'
    ];

    public function isVendor(){
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

    public function detail(){
        return $this->hasMany(OrderDetail::class);
    }
}
