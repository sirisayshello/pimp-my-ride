<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_description'
    ];

    public function features()
    {
        return $this->hasMany(Feature::class, 'car_id');
    }
}
