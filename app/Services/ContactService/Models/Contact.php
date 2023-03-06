<?php

namespace App\Services\ContactService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status_id',
        'category_id',
        'operator_id',
        'satisfaction_rate',
        'duration',
        'comment',
        'called_number'
    ];
    protected $casts = [
        'duration' => 'datetime: H:i',
    ];
}
