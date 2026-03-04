<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Hotel
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $description
 * @property string $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Room[] $rooms
 */
class Hotel extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'img',
        'description',
        'location',
    ];

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
