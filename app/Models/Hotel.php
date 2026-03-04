<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'location',
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
