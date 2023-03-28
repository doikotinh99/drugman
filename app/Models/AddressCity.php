<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCity extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];

    public function district(){
        return $this->hasMany(Address_district::class, "city_id", "id");
    }
}
