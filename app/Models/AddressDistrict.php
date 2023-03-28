<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDistrict extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "city_id"
    ];

    public function ward(){
        return $this->hasMany(AddressWard::class, "district_id", "id");
    }
}
