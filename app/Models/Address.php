<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        "city",
        "district",
        "ward",
        "detail"
    ];

    public function isCity(){
        return $this->hasOne(AddressCity::class, "id", "city");
    }
    
    public function isDistrict(){
        return $this->hasOne(AddressDistrict::class, "id", "district");
    }

    public function isWards(){
        return $this->hasOne(AddressWard::class, "id", "ward");
    }
}
