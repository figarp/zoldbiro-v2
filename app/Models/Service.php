<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_id',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    // Kapcsolat az Image modellel
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}