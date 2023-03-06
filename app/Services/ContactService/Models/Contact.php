<?php

namespace App\Services\ContactService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;
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

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);

    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function operator(): BelongsTo
    {
        return $this->belongsTo(Operator::class);
    }
//    protected $casts = [
//        'duration' => 'datetime: H:i',
//    ];
}
