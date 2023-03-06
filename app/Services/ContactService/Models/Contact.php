<?php

namespace App\Services\ContactService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id ,
 * @property int $customer_id ,
 * @property int status_id
 * @property int category_id ,
 * @property int operator_id ,
 * @property string satisfaction_rate ,
 * @property string duration ,
 * @property string comment ,
 * @property string called_number ,
 */
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
