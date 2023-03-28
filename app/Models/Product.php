<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'frequency',
        'packing',
        'effect',
        'registration_number',
        'price',
        'company_id',
    ];

    public function company(){
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
