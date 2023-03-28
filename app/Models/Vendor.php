<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address_id',
    ];

    public function isAddress()
    {
        return $this->hasOne(Address::class, "id", "address_id");
    }

    public function isGender(){
        return $this->hasOne(Gender::class, 'id', 'gender');
    }
}
