<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDonation extends Model
{
    use HasFactory;

    protected $fillable = [

        'donor_name',
        'phone',
        'email',
        'food_type',
        'quantity',
        'address',
        'expiry_time',
        'status'

    ];
}