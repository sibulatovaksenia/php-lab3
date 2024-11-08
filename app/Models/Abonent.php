<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonent extends Model
{
    use HasFactory;

    // Визначте, які атрибути можуть бути масово заповнені
    protected $fillable = [
        'phone_number',
        'home_address',
        'owner',
        'total_call_duration',
        'balance'
    ];
}
