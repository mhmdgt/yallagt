<?php

namespace App\Models;

use App\Models\CarBrandModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CarBrand extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function models()
    {
        return $this->hasMany(CarBrandModel::class);
    }





} // END CLASS
