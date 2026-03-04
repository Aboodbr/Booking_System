<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'hotel_id',
        'name',
        'img',
        'num_person',
        'size',
        'view',
        'num_bed',
        'price',
    ];

    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }
}
