<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voitures extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'name',
            'owner',
            'kilometrage',
            'year',
            'phone_number'
            ,'image'
            ,'quantity'
            ,'category'
            ,'prix'
    ];
}
