<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'discount',
        'address_id'
    ];
    public function isAddress()
    {
        return $this->hasOne(Address::class, "id", "address_id");
    }
}
