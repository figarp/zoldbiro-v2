<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'customer_first_name',
        'customer_last_name',
        'customer_phone',
        'customer_email',
        'comment',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
